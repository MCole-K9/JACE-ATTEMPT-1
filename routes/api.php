<?php

use App\Http\Controllers\InfractionController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Infractions API endpoints. Reminder to self: Put the plaintext API token in the Bearer Auth part
Route::apiResource('/infractions', InfractionController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/logs/download', function(Request $request){
    $file = fopen('exported_logs.csv', 'w');
    
    // need to figure out how to make this not just plop a file directly into the directory
    // probably just make a gitignore'd folder and then make all exports there (when i wake up)
    $activities = Activity::all();

    $logsCollection = $activities->map(function ($activity){
        return ['id' => $activity->id,
                'name' => $activity->log_name,
                'description' => $activity->description,
                'subject' => $activity->subject_id,
                'causer' => $activity->causer_id,
                'timestamp' => $activity->created_at];
    });


    foreach($logsCollection as $record){
        fputcsv($file, $record);
    };

    fclose($file);

    return response()->download('exported_logs.csv','exported_logs.csv', ['Content-Type: text/csv']);
});