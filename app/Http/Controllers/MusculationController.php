<?php

namespace App\Http\Controllers;

use App\Models\OrdreRecette;
use Illuminate\Http\Request;


class MusculationController extends Controller
{
    public function index(){
    $recette_musculation= OrdreRecette::where('type','=','musculation');
    $recette_musculation= OrdreRecette::Paginate(12);

    $total_recette_musculation= 0;
    foreach($recette_musculation as $muscu) {
    $total_recette_musculation += $muscu->montant;
    }

        return view('ventes.musculation.index', compact('recette_musculation', 'total_recette_musculation'));
    }

    
    
    public function __construct()
{
    $this->middleware('auth');
}

}
