<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

        $validatedFields = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255"],
            "phone" => ["required", "string", "max:255", "regex:/^([0-9\s\-\+\(\)]*)$/"],
            "website" => ["required", "string", "max:255", "url"],
            "street_address" => ["required", "string", "max:255"],
            "city" => ["required", "string", "max:255"],
            "state" => ["required", "string", "max:255"],
            "zip" => ["required", "string", "max:255"],
        ]);

        //mass assignment
        //Auth::user()->orgRep->organization()->create($validatedFields, ["name" => Str::title($validatedFields["name"]), "email" => Str::lower($validatedFields["email"])] );

        //not liking this, needs to go in a transaction or something
        $org = Organization::create($validatedFields, ["name" => Str::title($validatedFields["name"]), "email" => Str::lower($validatedFields["email"])] );
        Auth::user()->orgRep->organization()->associate($org);
        Auth::user()->orgRep->save();


        return redirect()->route('organization');



    }



    public function update(Request $request, $id)
    {
    }


    // public function destroy($id)
    // {
    //     //
    // }
}
