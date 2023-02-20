<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{

    public function index()
    {
        return Inertia::render('Organization', [
            "organization" => Auth::user()->orgRep->organization ?? null,
        ]);
    }




    public function store(Request $request)
    {
        //
    }



    public function update(Request $request, $id)
    {

    }


    // public function destroy($id)
    // {
    //     //
    // }
}
