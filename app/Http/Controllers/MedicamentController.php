<?php

namespace App\Http\Controllers;

use App\Models\OrdreRecette;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /*
    *Cette function nous permet de récuperer les ventes liés uniquement aux médicaments
    */
    public function index()
    {

        $recette_medicaments = OrdreRecette::where('type', '=', 'medicament');
        $recette_medicaments= OrdreRecette::Paginate(12);
        $total_recette_medicaments = 0;
        foreach ($recette_medicaments as $medicament) {
            $total_recette_medicaments += $medicament->montant;
        }

        return view('ventes.medicament.index', compact('recette_medicaments', 'total_recette_medicaments'));
    }

    public function __construct()
{
    $this->middleware('auth');
}

}
