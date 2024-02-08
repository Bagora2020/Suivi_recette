<?php

namespace App\Http\Controllers;

use App\Models\dashbordgeneral;
use App\Models\greenvibes;
use App\Models\OrdreRecette;
use App\Models\sallecafetaria;
use App\Models\terrainmultisport;
use DateTime;
use Illuminate\Http\Request;

class DashbordgeneralController extends Controller
{
    public function index(Request $request){
        if($request->all() !== null && $request->all() !== []){
            
            $date = $request->date;
        }else{
            $date = date('Y');
        }
        
        
        $total_recette_greenvibes = $this->total_recette_greenvibes($date);
        $total_recette_greenvibes = $this->total_recette_greenvibes($date);
        $total_recette_sallecafetaria= $this->total_recette_sallecafetaria($date);
        $total_recette_terrainmultisport=  $this->recette_terrain_multisport($date);


        $total_recette_consultation = $this->totalConsultation($date);
        $total_recette_musculation = $this->totalMusculation($date);
        $total_recette_medicament = $this->totalMedicament($date);
        $total_recette_petitdejj = $this->total_petit_dej($date);
        $total_recette_ticketdej = $this->total_dej($date);
        
        
        
        $recette_vente= $this->totalConsultation($date) + $this->total_petit_dej($date) + $this->totalMusculation($date) + $this->totalMedicament($date) + $this->total_dej($date);
        
      
        
        $recette_location = $this->total_recette_greenvibes($date) + $this->total_recette_sallecafetaria($date) + $this->recette_terrain_multisport($date);

        $recette_total= $recette_vente + $recette_location;

        $total_recette = [$recette_vente, $recette_location];
      

        return view('dashboardgeneral', compact('recette_location', 'recette_vente', 'recette_total', 'total_recette'));
    }


private function total_recette_greenvibes($date){

        $greenvibes = Greenvibes::whereYear('datepaiement', $date)->get();

        $total_recette_greenvibes = 0;
        foreach($greenvibes as $greenvibe) {
            $total_recette_greenvibes += $greenvibe->montant;
        }
        return $total_recette_greenvibes;
}
    
private function total_recette_sallecafetaria($date){

    $sallecafetaria = Sallecafetaria::whereYear('date', $date)->get();

        $total_recette_sallecafetaria= 0;
        foreach($sallecafetaria as $salcaf) {
            $total_recette_sallecafetaria += $salcaf->montant;
        }
        return $total_recette_sallecafetaria;
}
private function recette_terrain_multisport($date){

        $terrainmultisport = Terrainmultisport::whereYear('date', $date)->get();

        $total_recette_terrainmultisport = 0;
        foreach($terrainmultisport as $termultisport) {
            $total_recette_terrainmultisport += $termultisport->montant;
        }
        return $total_recette_terrainmultisport;
    }  

      //Recette vente

      
    
    private function totalConsultation($date){
        $recette_consultations = OrdreRecette::where('type', '=', 'consultation')
                                                ->whereYear('date', $date)
                                                ->get();
        $total_recette_consultation = 0;
        foreach($recette_consultations as $recette_consultation){
            $total_recette_consultation += $recette_consultation->montant;
        }

        return $total_recette_consultation;
    }

    private function totalMusculation($date){
        $recette_musculations = OrdreRecette::where('type', '=', 'musculation')
                                            ->whereYear('date', $date)
                                            ->get();

        $total_recette_musculation = 0;

        foreach($recette_musculations as $recette_musculation ){

            $total_recette_musculation += $recette_musculation->montant;
        }

        return $total_recette_musculation;
    }

    private function totalMedicament($date){
        $recette_medicaments = OrdreRecette::where('type', '=', 'medicament')
                                                ->whereYear('date', $date)
                                                ->get();

        $total_recette_medicament = 0;

        foreach( $recette_medicaments as $recette_medicament ){

            $total_recette_medicament += $recette_medicament->montant;
        }

        return $total_recette_medicament;
    }


    private function total_petit_dej($date)
    {
        $recette_petitdej = OrdreRecette::where('type', '=', 'petitdej')
                                            ->whereYear('date', $date)
                                            ->get();

        $total_recette_petitdejj = 0;
        foreach ($recette_petitdej  as $recette_petitdejj) {
            $total_recette_petitdejj += $recette_petitdejj->montant;
        }
        return $total_recette_petitdejj;
    }

    private function total_dej($date)
    {
        $recette_ticketdej = OrdreRecette::where('type', '=', 'ticketdej')
                                                ->whereYear('date', $date)
                                                ->get();


        $total_recette_ticketdej = 0;
        foreach ($recette_ticketdej  as $recette_ticketdejj) {
            $total_recette_ticketdej += $recette_ticketdejj->montant;
        }
        return $total_recette_ticketdej;
    }    

    
}
