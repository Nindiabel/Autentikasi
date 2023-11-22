<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request): RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'User name/Email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('bukus');
        }

        return back()->withErrors([
            'User name/Email' => 'The provided credentials do not match our records.',
        ]) ->withInput($request->only('User name/Email'));
    }
}
