<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\MovieSeats;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function checkout(Request $request)
    {

        //validate
        $request->validate([
            'buyer_name' => 'required',
            'buyer_email' => 'required|email',
            'buyer_age' => 'required|numeric',
            'buyer_phone' => 'required|numeric',
            'selected_seats' => 'required',
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        $movies = Movies::where('id', request()->id)->first();

        $selectedSeats = $request->input('selected_seats');
        $total = $movies->ticket_price * count($selectedSeats);
        $status = true;

        // Check if user age is above or equal to age_rating and the user has enough balance
        if ($request->input('buyer_age') < $movies->age_rating) {
            return redirect()->route('movies')->with('error', 'Umur tidak cukup !');
        } elseif ($user->balance < $total) {
            $status = false;
        }

        foreach ($selectedSeats as $seatId) {
            MovieSeats::where('movie_id', $movies->id)->where('seat_id', $seatId)->update([
                'is_booked' => true,
                'booked_by' => auth()->user()->id,
                'booked_at' => now(),
            ]);
        }

        // Create transaction
        $transaction = Transaction::create([
            'movie_id' => $movies->id,
            'user_id' => auth()->user()->id,
            'buyer_name' => $request->input('buyer_name'),
            'buyer_email' => $request->input('buyer_email'),
            'buyer_age' => $request->input('buyer_age'),
            'buyer_phone' => $request->input('buyer_phone'),
            'total_price' => $total,
            'total_seat' => count($selectedSeats),
            'seats' => implode(',', $selectedSeats),
            'status' => $status,
        ]);
        $transaction->save();

        if ($status) {
            $user->balance -= $total;
            $user->save();
            return redirect()->route('history.detail', ['name' => $user->username, 'id' => $transaction->id])->with('success', 'Seats booked successfully!');
        } else {
            return redirect()->route('history.detail', ['name' => $user->username, 'id' => $transaction->id])->with('error', 'Saldo tidak cukup ! Silahkan top up terlebih dahulu.');
        }
    }

    public function showHistory()
    {
        //check if user is logged in
        if (!auth()->user()) {
            return redirect()->route('login')->with('loginError', 'Silahkan login terlebih dahulu');
        } elseif (auth()->user()->username != request()->name) {
            return redirect()->route('movies');
        }

        $transactions = Transaction::where('user_id', auth()->user()->id)->get();
        $movies = Movies::all();


        return view('history', compact('transactions', 'movies'));
    }

    public function historyDetail()
    {
        if (!auth()->user()) {
            return redirect()->route('login')->with('loginError', 'Silahkan login terlebih dahulu');
        } elseif (auth()->user()->username != request()->name) {
            return redirect()->route('movies');
        }

        $transactions = Transaction::where('id', request()->id)->first();
        if (!$transactions) {
            return redirect()->route('history', ['name' => auth()->user()->username]);
        }
        $movies = Movies::where('id', $transactions->movie_id)->first();
        $user = User::where('id', $transactions->user_id)->first();

        return view('payment', compact('transactions', 'movies', 'user'));
    }

    public function payTransaction()
    {
        $transactions = Transaction::where('id', request()->id)->first();
        if (!$transactions) {
            return redirect()->route('history');
        }
        $user = User::where('id', auth()->user()->id)->first();

        $user->balance -= $transactions->total_price;
        $transactions->status = true;
        $transactions->save();
        $user->save();

        return redirect()->route('history.detail', ['name' => $user->username, 'id' => $transactions->id])->with('success', 'Pembayaran berhasil !');
    }

    public function cancelTransaction()
    {
        $transactions = Transaction::where('id', request()->id)->first();
        if (!$transactions) {
            return redirect()->route('history', ['name' => auth()->user()->username]);
        }
        $user = User::where('id', auth()->user()->id)->first();
        $selectedSeats = explode(',', $transactions->seats);
        foreach ($selectedSeats as $seatId) {
            MovieSeats::where('movie_id', $transactions->movie_id)->where('seat_id', $seatId)->update([
                'is_booked' => false,
                'booked_by' => null,
                'booked_at' => null,
            ]);
        }
        if ($transactions->status == true) {
            $user->balance += $transactions->total_price;
        }

        $transactions->delete();
        $user->save();

        return redirect()->route('history', ['name' => auth()->user()->username])->with('success', 'Transaksi berhasil dibatalkan !');
    }
}