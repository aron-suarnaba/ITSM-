<?php

namespace App\Http\Controllers;

use Auth;
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


    public function showLoginForm(){
        if(Auth::check()){
            return redirect('/home');
        }

        return view('authentication.login');
    }

    public function login(Request $request){
        $credentials = ([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }


        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')]
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
