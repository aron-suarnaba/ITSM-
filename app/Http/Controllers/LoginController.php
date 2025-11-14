<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($validatedData, $remember)) {
            $request->session()->regenerate();

            return redirect(route('home'));
        }

        // Debugging: Log failed login attempt
        \Log::error('Login failed for email: ' . $validatedData['email']);

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
