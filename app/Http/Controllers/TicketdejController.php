<?php

namespace App\Http\Controllers;

use App\Models\OrdreRecette;
use Illuminate\Http\Request;

class TicketdejController extends Controller
{
    public function index()
    {
        $recette_ticketdej = OrdreRecette::where('type', '=', 'ticketdej');
        $recette_ticketdej = OrdreRecette::Paginate(10);


        $total_recette_ticketdej = 0;
        foreach ($recette_ticketdej  as $recette_ticketdejj) {
            $total_recette_ticketdej += $recette_ticketdejj->montant;
        }


        return view('ventes.TicketsRestauration.indexdej', compact('recette_ticketdej','total_recette_ticketdej'));
    }
}
