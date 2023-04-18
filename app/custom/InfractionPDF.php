<?php

namespace App\Custom;

use Codedge\Fpdf\Fpdf\Fpdf;

// well, this works apparently
class InfractionPdf extends Fpdf {
    public $month = '01';

    public static function getColumnWidths(){
        return [40, 30, 30, 30, 50];
    }

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

    public function createTableHeaders(){
        $headers = ['ID', 'Issuer', 'Receiver', 'Reason', 'Timestamp'];
        $header_widths = $this->getColumnWidths();

        $this->setFont('Times', 'B', 12);
        $this->Ln(10);
        $this->Ln(10);

        for ($i = 0; $i < count($headers); $i++){
            $this->Cell($header_widths[$i], 10, $headers[$i], 0, 0, 'C');
        }

        $this->Ln();
    }
}

?>