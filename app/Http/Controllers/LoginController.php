<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended(route('movies'));
        } else {
            // Authentication failed
            return redirect()->route('login')->with('loginError', 'Invalid username or password');
        }
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (User::where('username', $request->username)->exists()) {
            $loginError = 'username already exists';
            return redirect()->route('register')->with(['loginError' => $loginError]);
        }

        $user = User::create([
            'username' => $request->username,
            'password' => $request->password
        ]);
        $user->save();

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();

        return redirect()->route('movies');
    }
}