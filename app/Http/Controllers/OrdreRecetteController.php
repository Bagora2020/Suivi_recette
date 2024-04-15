<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medicament;
use App\Models\Musculation;
use App\Models\OrdreRecette;
use App\Models\Pain;
use App\Models\Petitdej;
use App\Models\recetteticket;
use App\Models\Ticketdej;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use DateTime;

class OrdreRecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->all() !== null && $request->all() !== []){
            
            $date = $request->date;
        }else{
            $date = date('Y');
        }
        

       
        $total_recette_medicament = $this->totalMedicament($date);
       
        $total_recette_Pain = $this->total_Pain($date);
        $total_recette_tickets = $this->recetteticket($date);
        
       
      


        $recette_total =  $this->totalMedicament($date) + $this->total_Pain($date) + $this->recetteticket($date);
        
        $res = [ $total_recette_tickets, $total_recette_medicament, $total_recette_Pain];
        return view('ventes.home', compact('total_recette_medicament', 'total_recette_tickets','total_recette_Pain', 'recette_total', 'res'));
    }


    /**
     * Show the form for creating a new resource.
     */
 
    /**
     * Store a newly created resource in storage.
     */
  
    //totales des recettes*****

    private function totalConsultation($date)
    {
        $recette_consultations = Consultation::whereYear('date', $date)->get();
        $total_recette_consultation = 0;
        foreach ($recette_consultations as $recette_consultation) {
            $total_recette_consultation += $recette_consultation->montant;
        }

        return $total_recette_consultation;
    }

    private function totalMusculation($date)
    {
        $recette_musculations = Musculation::whereYear('date', $date)->get();

        $total_recette_musculation = 0;

        foreach ($recette_musculations as $recette_musculation) {

            $total_recette_musculation += $recette_musculation->montant;
        }

        return $total_recette_musculation;
    }

    private function totalMedicament($date)
    {
        $recette_medicaments = Medicament::whereYear('date', $date)->get();

        $total_recette_medicament = 0;

        foreach ($recette_medicaments as $recette_medicament) {

            $total_recette_medicament += $recette_medicament->montant;
        }

        return $total_recette_medicament;
    }

    private function total_petit_dej($date)
    {
        $recette_petitdej = Petitdej::whereYear('date', $date)->get();
        $total_recette_petitdejj = 0;
        foreach ($recette_petitdej  as $recette_petitdejj) {
            $total_recette_petitdejj += $recette_petitdejj->montant;
        }
        return $total_recette_petitdejj;
    }

    private function total_dej($date)
    {
        $recette_ticketdej = Ticketdej::whereYear('date', $date)->get();


        $total_recette_ticketdej = 0;
        foreach ($recette_ticketdej  as $recette_ticketdejj) {
            $total_recette_ticketdej += $recette_ticketdejj->montant;
        }
        return $total_recette_ticketdej;
    }

    private function total_pain($date)
    {
        $recette_Pain = Pain::whereYear('date', $date)->get();


        $total_recette_Pain = 0;
        foreach ($recette_Pain  as $recette_Pain) {
            $total_recette_Pain += $recette_Pain->montant;
        }
        return $total_recette_Pain;
    }

    private function recetteticket($date)
    {
        $recette_tickets = recetteticket::whereYear('date', $date)->get();


        $total_recette_tickets = 0;
        foreach ($recette_tickets  as $recette_ticket) {
            $total_recette_tickets += $recette_ticket->montant;
        }
        return $total_recette_tickets;
    }
}
