<?php

namespace App\Custom;

use Codedge\Fpdf\Fpdf\Fpdf;

// well, this works apparently
class InfractionPdf extends Fpdf {
    public $month = '01';


    function Header(){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 0, 'Job Ace Infraction Report for ' . $this->month . '/' . date('Y'));
    }
}

?>