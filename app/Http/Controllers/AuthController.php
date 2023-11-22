<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->intended('/dashboard');
        }

        // Jika autentikasi gagal
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

