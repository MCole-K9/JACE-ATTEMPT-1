<?php

use App\Http\Controllers\InfractionController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use App\Models\Infraction;
use Codedge\Fpdf\Fpdf\Fpdf;

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

Route::middleware('auth:sanctum')->post('/infractions/report', function (Request $request){
    $option = $request->getContent();

    // bare-minimum test works, at least.
    $fpdf = new Fpdf('L', 'mm', 'A4');
    $fpdf->Output('F', 'report.pdf');

    return response()->download('report.pdf', 'test.pdf', ['Content-Type' => 'application/pdf']);

    // Get all infractions in a collection
    // (Possibly) turn them into an array
    // create a new pdf file
    // create page
    // write to it
    // send that shit over
    // close the file?
    
    // the problem is here, somehow
    


});

Route::middleware('auth:sanctum')->get('/csrf', function (){
    $user = auth()->user();

    if ($user){
        return response(csrf_token(), 200, ['Content-Type' => 'text/plain']);
    }
    else {
        return response('', 401);
    }
});