<?php

namespace App\Http\Controllers;

use App\Models\Petitdej;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfpetitdejController extends Controller
{
    public function index($id)
    {
        
        $invoice= Petitdej::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfpetitdejeuner', compact('invoice'));

        return $pdf->stream();
    }
}
