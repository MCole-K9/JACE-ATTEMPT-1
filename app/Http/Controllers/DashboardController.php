<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == 1){ // don't want to hard code this

            return Inertia::render('Dashboard/AdminDashboard');

        }
        else if(Auth::user()->role_id == 2){

            return Inertia::render('Dashboard/CandidateDashboard');

        }
        else if(Auth::user()->role_id == 3){

            return Inertia::render('Dashboard/OrgRepDashboard');
        }


    }
}
