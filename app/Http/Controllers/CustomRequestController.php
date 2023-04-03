<?php

namespace App\Http\Controllers;

use App\Models\CustomRequest;
use Illuminate\Http\Request;

class CustomRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedFields =  $request->validate([
            "type" => "required",
            "info" => "required",
            "status" => "required",
            "user_id" => "required"
        ]);

        CustomRequest::create($validatedFields);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomRequest  $customRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CustomRequest $customRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomRequest  $customRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomRequest $customRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomRequest  $customRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomRequest $customRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomRequest  $customRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomRequest $customRequest)
    {
        //
    }
}
