<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\Infraction;
use Codedge\Fpdf\Fpdf\Fpdf;

class AdminController extends Controller
{
    function getActivityLogs (Request $request){
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
    }

    function getInfractionReport (Request $request){
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
        
    
    
    }
}
