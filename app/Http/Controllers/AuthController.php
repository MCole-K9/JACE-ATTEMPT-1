<?php

namespace App\Http\Controllers;

use App\Models\OrgRep;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
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

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route("home"); // redirect to dashboard after login
        }
    }

    public function register(Request $request)
    {

        if ($request->isMethod('GET')) {

            return Inertia::render('Auth/Register');
        }

        $validatedFelids =  $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6',], // 'confirmed'
            'role_id' => ['required', 'integer', 'min:2', 'max:3'],
            'org' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'first_name' => $validatedFelids['first_name'],
            'last_name' => $validatedFelids['last_name'],
            'email' => $validatedFelids['email'],
            'password' => Hash::make($request->input('password')),
            'role_id' => (int) $validatedFelids['role_id'],
        ]);

        $user->role_id == 2
            ?
            // associate candidate with user
            :
            // ---------------------------

                $this->createOrgRep($user->id, $validatedFelids['org']);
            // ---------------------------
            ;




        return redirect()->route("login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("home");
    }

    public function createOrgRep($user_id, $orgCode) {

        $orgRep = OrgRep::create(["user_id" => $user_id]);

        if($orgCode != null) {

            $org = Organization::where('code', $orgCode)->first();
            $orgRep->organization()->associate($org);
            $orgRep->org_role_id = 2;
            $orgRep->save();
        }
    }
}
