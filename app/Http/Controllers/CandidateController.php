<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render("Candidates",[
            "candidates" => User::get()
        ]);
    }
}
