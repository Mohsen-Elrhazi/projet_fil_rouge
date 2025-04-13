<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    
    public function registerForm()
    {
        return view('auth.register');
    }
    
    public function loginForm()
    {
        return view('auth.login');
    }

    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
    
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect("/login")->with('success', 'User created successfully. Please login.');
    }

    public function login(LoginRequest $request)
    {

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect("/")->with('success', 'Login successful.');      }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }



}