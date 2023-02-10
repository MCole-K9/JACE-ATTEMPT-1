<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    public function register(Request $request)
    {

        if ($request->isMethod('GET')) {

            return Inertia::render('Auth/Register');
        }


        echo "POST";
        // $request->validate([
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        // $user = User::create([
        //     'name' => $request->input('firstName'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        // ]);

        // $token = $user->createToken('auth_token')->plainTextToken;

        // $cookie = cookie('jwt', $token, 60 * 24); // 1 day

        return redirect()->route("login");
    }
}
