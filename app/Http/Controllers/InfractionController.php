<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infraction;

class InfractionController extends Controller
{
    public function index(){
        $infractions = Infraction::get();

        if ($infractions){
            return response($infractions, 200);
        }
        else {
            return response('Not Found', 404);
        }
        // return collection of Infraction
    }

    public function show($id){
        
        if (Infraction::where('id', '=', $id)->exists()){
            return response(Infraction::where('id', '=', $id)->first(), 200);
        }
        else{
            return response('Not Found', 404);
        }
    }

    public function create(){
        // this is a function that directs to a page or component for creating infractions
        
 
    }

    public function store(Request $request){
        // this is an api route
        
        // for activitylogger, this needs to authenticate and authorize (can it pass in the API key, or something?)
        // Also, can i use the API key to find the user ID?
    }

    public function update(Request $request){
        // this is an api route
    }

    public function edit(){
        // this is a function that brings up an edit page or an edit dialogue box
        // ... which i'm not sure i want in the first place
    }

    public function destroy(){
        // this is an api route
    }


    /* To do:
    * - Everything: Authenticate for Admin
    * - Create Infractions Page (Authenticate for Admin)
    * - Add foreign key relationships with other entities (also, make *some* of the other necessary entities)
    * - integrate model with activity logger
    * - uhhh...
    */
}
