<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
        if (auth()->user()) {
            $user = User::where('username', auth()->user()->username)->first();
            return view('profile', compact('user'));
        } else {
            return redirect()->route('login')->with('loginError', 'Tolong login terlebih dahulu');
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'nullable'
        ]);

        if (User::where('username', $request->username)->exists() && $request->username != auth()->user()->username) {
            $loginError = 'Username sudah ada';
            return redirect()->route('profile')->with(['updateError' => $loginError]);
        } else if ($request->username != auth()->user()->username || $request->filled('password')) {
            $user = User::where('username', auth()->user()->username)->first();
            $user->username = $request->username;

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect()->route('profile')->with('updateSuccess', 'Profile berhasil diupdate');
        } else {
            return redirect()->route('profile');
        }
    }
}