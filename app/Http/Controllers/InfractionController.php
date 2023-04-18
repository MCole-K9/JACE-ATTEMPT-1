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
        $infraction = Infraction::create([
            'reason' => $input, 
            'issuer_id' => $user->getAuthIdentifier(), 
            'receiver_id' => 4]);

        if ($infraction){
            activity('infraction')->
            performedOn($infraction)->
            causedBy($user)->
            log('Infraction Created for');

            return response('Added Infraction', 201);
        }
        else {
            return response('Add Infraction: Not Authorized', 403);
        }

    }

    public function update(Request $request){
        $user = auth()->user();


    }

    public function edit(){
        // this is a function that brings up an edit page or an edit dialogue box
        // ... which i'm not sure i want in the first place
    }

    public function destroy(Request $request){
        $user = auth()->user();
        $record = $request->getContent();

        $target = Infraction::find($record);
        $target->delete();
    }

    public static function getAllFormattedInfractions(){
        $infractions = Infraction::all();

        foreach ($infractions as $infraction){
            $infraction->issuer()->get();
            $infraction->receiver()->get();
        }

        return ['infractions' => $infractions->map(function ($infraction){
            return ['id' => $infraction->id,
                    'issuerId' => $infraction->issuer_id,
                    'issuerName' => $infraction->issuer->first_name . ' ' . $infraction->issuer->last_name,
                    'receiverId' => $infraction->receiver_id,
                    'receiverName' => $infraction->receiver->first_name . ' ' . $infraction->receiver->last_name,
                    'reason' => $infraction->reason,
                    'timestamp' => $infraction->created_at];
        })];
    }
}
