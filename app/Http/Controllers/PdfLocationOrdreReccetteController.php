<?php

namespace App\Http\Controllers;

use App\Models\greenvibes;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PdfLocationOrdreReccette;
use App\Models\sallecafetaria;
use App\Models\terrainmultisport;

class PdfLocationOrdreReccetteController extends Controller
{
    public function index($id)
    {
        
        $invoice= Greenvibes::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfgreenvibes', compact('invoice'));

        return $pdf->stream();
    }
}
