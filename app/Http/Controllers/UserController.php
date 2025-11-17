<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        if(auth()->user()->privilege !== 'Superadmin' && auth()->user()->privilege !== 'Manager'){
            abort(403, 'Unauthorized Access! ');
        }

        $users = User::orderBy('last_name')
                    ->orderBy('employee_id')
                    ->paginate(12);


        return view('users.index', compact('users'));
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], $remember)) {
            $request->session()->regenerate();

            // Redirect to the home route
            return redirect()->route('home');
        }

        // Log failed attempt and return back with error and old input
        \Log::warning('Login failed for email: ' . $validatedData['email']);

        return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput($request->except('password'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
