<?php

namespace App\Http\Controllers;

use App\Models\Cantines;
use App\Models\PdfCantine;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PdfLocationOrdreReccette;
use App\Models\sallecafetaria;
use App\Models\terrainmultisport;

class PdfCantineController extends Controller
{
    public function index($id)
    {
        
        $invoice= Cantines::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfCantine', compact('invoice'));

        return $pdf->stream();
    }
}
