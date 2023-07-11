<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\MovieSeats;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class MoviesData extends Controller
{
    public function show()
    {
        $movies = Movies::all();
        return view('movies', compact('movies'));
    }

    public function showDetail()
    {
        $movies = Movies::where('id', request()->id)->first();
        if (!$movies) {
            return redirect()->route('movies');
        }
        return view('moviesDetail', compact('movies'));
    }

    public function bookTicket()
    {
        $movies = Movies::where('id', request()->id)->first();
        if (!$movies) {
            return redirect()->route('movies');
        }

        if (!auth()->user()) {
            return redirect()->route('login')->with('loginError', 'Silahkan login terlebih dahulu');
        }

        $user = User::where('id', auth()->user()->id)->first();
        $seats = MovieSeats::where('movie_id', request()->id)->get();

        return view('bookTicket', compact('movies', 'seats', 'user'));
    }

}