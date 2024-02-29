<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfConsultationController extends Controller
{
    public function index($id)
    {
        
        $invoice= Consultation::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfconsultation', compact('invoice'));

        return $pdf->stream();
    }
}
