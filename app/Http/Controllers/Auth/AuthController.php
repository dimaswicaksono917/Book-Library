<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }
    public function register(Request $request)
    {
        return view('frontend.auth.register');
    }
    public function postlogin(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'inactive') {
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is not active, please contact admin !');
            }

            // $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('/');
            }
        }
        return back()->with('error', 'Login failed');
    }

    public function postregister(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:16',
            'password' => 'required',
            'phone' => 'required|unique:users',
            'address' => 'required|max:255',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        return redirect('register')->with('success', 'Register Success, Wait admin for approval');;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
