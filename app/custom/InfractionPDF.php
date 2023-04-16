<?php

namespace App;

use Codedge\Fpdf\Fpdf\Fpdf;

// well, this works apparently
class InfractionPdf extends Fpdf {
    function Header(){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 0, 'TEST MOTHERFUCKER');
    }
}

?>