<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render("Profile");
    }
    public function updateAvatar(Request $request)
    {
        // //log the avatar url in the console
        // dd($request->avatar_url);
        $validatedFields = $request->validate([
            'avatar_url' => 'nullable|url',
        ]);
        User::where('id', Auth::user()->id)->update($validatedFields);
        // $user = User::find(Auth::user()->id);
        // $user->avatar_url = $request->avatar_url;
        // $user->save();
        return redirect()->route('profile');
    }
}