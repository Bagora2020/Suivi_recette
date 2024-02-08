<?php

namespace App\Http\Controllers;

use App\Models\OrdreRecette;
use Illuminate\Http\Request;

class PetitdejController extends Controller
{
    public function index()
    {
        $recette_petitdej = OrdreRecette::where('type', '=', 'petitdej');
        $recette_petitdej = OrdreRecette::Paginate(12);
        $total_recette_petitdejj = 0;
        foreach ($recette_petitdej  as $recette_petitdejj) {
            $total_recette_petitdejj += $recette_petitdejj->montant;
        }


        return view('ventes.TicketsRestauration.indexpetitdej', compact('recette_petitdej', 'total_recette_petitdejj'));
    }
}
