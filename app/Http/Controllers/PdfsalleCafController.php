<?php

namespace App\Http\Controllers;

use App\Models\PdfsalleCaf;
use App\Models\sallecafetaria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfsalleCafController extends Controller
{
    public function index($id)
    {
        
        $invoice1= Sallecafetaria::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfsalleCafetaria', compact('invoice1'));

        return $pdf->stream();
    }
}
