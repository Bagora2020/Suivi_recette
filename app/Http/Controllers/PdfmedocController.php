<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfmedocController extends Controller
{
    public function index($id)
    {
        
        $invoice= Medicament::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfmedoc', compact('invoice'));

        return $pdf->stream();
    }
}
