<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\terrainmultisport;

class PdfterrainmultisportController extends Controller
{
    public function index($id)
    {
        
        $invoice2= Terrainmultisport::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfterrainmultisport', compact('invoice2'));

        return $pdf->stream();
    }
}
