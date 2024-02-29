<?php

namespace App\Http\Controllers;

use App\Models\Petitdej;
use App\Models\Ticketdej;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfdejController extends Controller
{
    public function index($id)
    {
        
        $invoice= Ticketdej::find($id);
        
        $pdf = Pdf::loadView('ordrederecettepdf.pdfdejeuner', compact('invoice'));

        return $pdf->stream();
    }
}
