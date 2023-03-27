<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::check() && Auth::user()->role_id == 3){
            //render jobs for org rep

            return Inertia::render("Job/ManageJobs", [
                 "jobs" => Auth::user()->orgRep->jobs
            ]);

        }

        //render home route with all jobs
        return Inertia::render("Jobs");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("Job/CreateJob");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedField =  $request->validate([
            "title" =>["required"],
            "description" => ["required"],
            // "location" => ["required"],
            "salary" =>["required"],
            "requirements" => ["required"],
            "is_visible" => ["required"],
            "type" => ["required"],
            "open_date" => ["required", "date", "after_or_equal:today"],
            "close_date" => ["required", "date", "after_or_equal:open_date"],
        ]);

        $job = Auth::user()->orgRep->jobs()->create($validatedField);


        $job->organization()->associate(Auth::user()->orgRep->organization);

        $job->save();

        return redirect()->route("jobs.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render("Job/CreateJob", [
            "job" => Job::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedField =  $request->validate([
            "title" =>["required"],
            "description" => ["required"],
            // "location" => ["required"],
            "salary" =>["required"],
            "requirements" => ["required"],
            "is_visible" => ["required"],
            "type" => ["required"],
            "open_date" => ["required", "date", "after_or_equal:today"],
            "close_date" => ["required", "date", "after_or_equal:open_date"],
        ]);

        $job = Job::find($id);

        $job->update($validatedField);


        return redirect()->route("jobs.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
