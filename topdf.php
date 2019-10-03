<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$iterator = new DirectoryIterator('img');
                    foreach($iterator as $document){
                        if ($document != "." && $document != ".."){
                        $pdf->AddPage();
                        $pdf->Image('img/' .$document->getFilename());
                        }
                    }
$pdf->Output();
?>