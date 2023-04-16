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

        $fpdf = new Fpdf('L', 'mm', 'A4');
        $fpdf->SetAuthor('Joe Mama');
        $fpdf->SetCreator('Job Ace');

        $fpdf->AddPage();
        $fpdf->Header(); // need to design a header for this
        
        $fpdf->SetFont('Times', '', 12); // it's 'Times' according to the docs
        $fpdf->Text(0,0,'test');
        $fpdf->Cell(50, 40, 'test'); 
        $fpdf->Output('F', 'report.pdf');
    
        return response()->download('report.pdf', 'test.pdf', ['Content-Type' => 'application/pdf']);
    
        // Get all infractions in a collection
        // (Possibly) turn them into an array
    
    }
}
