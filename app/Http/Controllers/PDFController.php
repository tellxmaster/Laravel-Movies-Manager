<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function pdf(){
        $pdf = \PDF::loadView('livewire.reporte-top.pdf');
        return $pdf->download('REPORTE-TOP-CINEFLIX'.date('Y-m-d').'.pdf');
    }
}
