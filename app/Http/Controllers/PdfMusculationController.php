<?php

namespace App\Http\Controllers;

use App\Models\Musculation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfMusculationController extends Controller
{
    public function index($id)
    {
        
        $invoice= Musculation::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfmusculation', compact('invoice'));

        return $pdf->stream();
    }
}
