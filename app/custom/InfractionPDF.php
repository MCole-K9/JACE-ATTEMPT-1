<?php

namespace App\Custom;

use Codedge\Fpdf\Fpdf\Fpdf;

// well, this works apparently
class InfractionPdf extends Fpdf {
    public $month = '01';

    function Header(){
        $this->SetFont('Times', 'B', 18);
        $this->Cell(0, 0, 'Job Ace Infraction Report for ' . $this->month . '/' . date('Y'), 0, 0, 'C');
        $this->Line(25, 25, 270, 25);
        $this->Ln();
    }

    function Footer(){
        $this->SetY(-15);
        $this->Line(25, 185, 270, 185);
        $this->SetFont('Times', '', 12);
        $this->Cell(265, 0,$this->PageNo(), 0, 0, 'R');
    }
}

?>