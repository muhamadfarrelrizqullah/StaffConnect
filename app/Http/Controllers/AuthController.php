<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    // Register View
    public function register()
    {
        return view('auth.register');
    }

    // Logout User
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // Login User Auth
    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'Active') {
                return response()->json(['success' => true, 'redirect' => route('admin-dashboard')]);
            } else {
                Auth::logout();
                return response()->json(['success' => false, 'message' => 'Account is not active']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid email or password']);
        }
    }

    // Register User Data
    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
            'confirmPassword' => 'required|string|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['redirect' => route('login')]);
    }
}
