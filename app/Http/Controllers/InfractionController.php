<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infraction;

class InfractionController extends Controller
{
    public function index(){
        $infractions = Infraction::all();


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
        $user = auth()->user();


        // need to rewrite this to send and work with the type of object that generated the infraction
        $input = $request->input('reason');
        $infraction = Infraction::create(['reason' => $input]);

        if ($infraction){
            activity('infraction')->
            performedOn($infraction)->
            causedBy($user)->
            log('Infraction Created for');

            return response('Added Infraction', 201);
        }
        else {
            return response('idk what to write yet', 403);
        }

    }

    public function update(Request $request){
        $user = auth()->user();


    }

    public function edit(){
        // this is a function that brings up an edit page or an edit dialogue box
        // ... which i'm not sure i want in the first place
    }

    public function destroy(){
        $user = auth()->user();

        // need to get the id from the url

        

    }


    /* To do:
    * - Everything: Authenticate for Admin
    * - Create Infractions Page (Authenticate for Admin)
    * - Add foreign key relationships with other entities (also, make *some* of the other necessary entities)
    * - integrate model with activity logger
    * - uhhh...
    */
}
