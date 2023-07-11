<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function topUp(Request $request)
    {
        $request->validate([
            'balance' => 'required'
        ]);

        $user = auth()->user();
        $user->balance += $request->balance;
        $user->save();

        return redirect()->route('profile')->with('updateSuccess', 'Top up berhasil');
    }

    public function withDrawal(Request $request)
    {
        $request->validate([
            'balance' => 'required'
        ]);

        $user = auth()->user();
        $user->balance -= $request->balance;
        $user->save();

        return redirect()->route('profile')->with('updateSuccess', 'Withdrawal berhasil');
    }
}