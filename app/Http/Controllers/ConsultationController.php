<?php

namespace App\Http\Controllers;

use App\Models\OrdreRecette;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(){
    $recette_consultation = OrdreRecette::where('type', '=', 'consultation');
    $recette_consultation = OrdreRecette::Paginate(12);        
        
    $total_recette_consultation= 0;
    foreach($recette_consultation as $consul) {
    $total_recette_consultation += $consul->montant;
    }

        return view('ventes.consultation.index', compact('recette_consultation', 'total_recette_consultation'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
