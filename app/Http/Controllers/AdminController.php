<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\Infraction;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Custom\InfractionPdf;

class AdminController extends Controller
{
    function getActivityLogs (Request $request){
        // fine i guess i'll just make the folder myself
        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '\activitylogs')){
            mkdir($_SERVER['DOCUMENT_ROOT'] . '\activitylogs');
        }

        // i am very annoyed that the string concatenation operator is '.'
        // i am also very annoyed that fopen will not just create the folder that it needs
        // i am ALSO very annoyed that this is configured to put server root in /public. but okay.
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . '\activitylogs\exported_logs.csv', 'w');
        
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
    
        return response()->download($_SERVER['DOCUMENT_ROOT'] . '\activitylogs\exported_logs.csv','exported_logs.csv', ['Content-Type: text/csv']);
    }

    function getInfractionReport (Request $request){
        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '\infractionreports')){
            mkdir($_SERVER['DOCUMENT_ROOT'] . '\infractionreports');
        }
        
        $option = $request->getContent();

        $fpdf = new InfractionPdf('L', 'mm', 'A4');
        $fpdf->month = $option;
        $fpdf->SetAuthor('Joe Mama');
        $fpdf->SetCreator('Job Ace');

        $fpdf->AddPage();
        
        $fpdf->SetFont('Times', '', 12); // it's 'Times' according to the docs
        $fpdf->Cell(50, 40, 'test'); 
        $fpdf->Output('F', $_SERVER['DOCUMENT_ROOT'] . '\infractionreports\report.pdf');
    
        return response()->download($_SERVER['DOCUMENT_ROOT'] . '\infractionreports\report.pdf', 'test.pdf', ['Content-Type' => 'application/pdf']);
    
        // Get all infractions in a collection
        // (Possibly) turn them into an array
    
    }
}
