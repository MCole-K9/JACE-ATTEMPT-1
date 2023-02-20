<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if ($request->isMethod('GET')) {

            return Inertia::render('Auth/Login');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->route("home"); // redirect to dashboard after login
        }


    }

    public function register(Request $request)
    {

        if ($request->isMethod('GET')) {

            return Inertia::render('Auth/Register');
        }

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', ], // 'confirmed'
            'role_id' => ['required', 'integer', 'min:2', 'max:3'],
        ]);

        User::create([
            'first_name' => $request->input('first_name') ,
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => (int)$request->input('role_id'),
        ]);


        return redirect()->route("login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("home");
    }
}
