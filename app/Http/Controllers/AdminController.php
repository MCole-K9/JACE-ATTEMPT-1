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
        
        $activities = Activity::all();
        foreach ($activities as $activity){
            $activity->causer()->get();
        }
    
        $logsCollection = $activities->map(function ($activity){
            return ['id' => $activity->id,
                    'name' => $activity->log_name,
                    'description' => $activity->description,
                    'subject' => $activity->subject_id,
                    'causer' => $activity->causer_id,
                    'causerName' => $activity->causer->first_name . ' ' . $activity->causer->last_name,
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
        $year = strval(getdate()['year']);
        $filename = 'infraction_report-'.$option.'-'.$year.'.pdf';
        $infractionsRecords = InfractionController::getAllFormattedInfractions()['infractions'];

        $fpdf = new InfractionPdf('L', 'mm', 'A4');
        $fpdf->month = $option;
        $fpdf->SetAuthor('Joe Mama');
        $fpdf->SetCreator('Job Ace');

        $fpdf->AddPage();
        $fpdf->createTableHeaders();

        $header_widths = $fpdf->getColumnWidths();

        $fpdf->SetFont('Times', '', 12);
        foreach($infractionsRecords as $record){

            for($i = 0; $i < 5; $i++){
                $field = '';

                switch ($i){
                    case 0:
                        $field = $record['id'];
                        break;
                    case 1:
                        $field = $record['issuerName'].' ('.$record['issuerId'].')' ;
                        break;
                    case 2:
                        $field = $record['receiverName'].' ('.$record['receiverId'].')';
                        break;
                    case 3:
                        $field = $record['reason'];
                        break;
                    case 4:
                        $field = $record['timestamp'];
                        break;
                    default:
                        // this shouldn't be possible
                        break;
                }

                $fpdf->Cell($header_widths[$i], 10, $field, 0, 0, 'C');
            }
            $fpdf->Ln();
        }

        $fpdf->Output('F', $_SERVER['DOCUMENT_ROOT'] . '\infractionreports\\'.$filename);
    
        return response()->download($_SERVER['DOCUMENT_ROOT'] . '\infractionreports\\'.$filename, 'test.pdf', ['Content-Type' => 'application/pdf']);

    
    }
}
