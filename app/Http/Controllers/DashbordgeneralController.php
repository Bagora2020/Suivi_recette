<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pain;
use App\Models\Cantines;
use App\Models\Petitdej;
use App\Models\greenvibes;
use App\Models\Medicament;
use App\Models\Musculation;
use App\Models\Consultation;
use App\Models\OrdreRecette;
use Illuminate\Http\Request;
use App\Models\recetteticket;
use App\Models\sallecafetaria;
use App\Models\BudgetDefinitif;
use App\Models\ChambreEtudiant;
use App\Models\dashbordgeneral;
use App\Models\terrainmultisport;

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
        $total_recette_terrainmultisport=  $this->recette_terrain_multisport($date);
        $total_recette_cantines= $this->recette_Cantines($date);
        $total_recette_ChmbreEt= $this->Recette_LoyerEtudiant($date);
     
        $total_recette_consultation = $this->totalConsultation($date);
        $total_recette_musculation = $this->totalMusculation($date);
        $total_recette_medicament = $this->totalMedicament($date);

        $total_recette_Pain = $this->total_Pain($date);
        $total_recette_recetteticket = $this->Recette_ticket($date);


        $total_recette_budget = $this->budgetdefinitif($date);
       
   
        
        $recette_vente= $this->totalConsultation($date) + $this->Recette_ticket($date) + $this->totalMedicament($date) + $this->total_Pain($date);
 
        
        $recette_location = $this->total_recette_greenvibes($date) + $this->total_recette_sallecafetaria($date) + $this->recette_terrain_multisport($date) + $this->recette_Cantines($date) +  $this->Recette_LoyerEtudiant($date);
    

        $recette_total= $recette_vente + $recette_location;


        $reste= $total_recette_budget - $recette_total;
        
        $taux= ($recette_total/ $total_recette_budget)*100;
        
        $total_recette = [$total_recette_budget, $recette_total];
      
       

        return view('dashboardgeneral', compact('taux','total_recette_budget','reste','recette_location', 'recette_vente', 'recette_total', 'total_recette'));
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


    private function recette_Cantines($date){
        $cantines = Cantines::whereYear('date', $date)->get();
    $total_recette_cantines = 0;
            foreach($cantines as $cantine) {
                $total_recette_cantines += $cantine->montant;
            }
            return $total_recette_cantines;
        }   
      //Recette vente

      
    
    private function totalConsultation($date){
        $recette_consultations = Consultation::whereYear('date', $date)->get();
        $total_recette_consultation = 0;
        foreach($recette_consultations as $recette_consultation){
            $total_recette_consultation += $recette_consultation->montant;
        }

        return $total_recette_consultation;
    }

    private function totalMusculation($date){
        $recette_musculations = Musculation::whereYear('date', $date)->get();

        $total_recette_musculation = 0;

        foreach($recette_musculations as $recette_musculation ){

            $total_recette_musculation += $recette_musculation->montant;
        }

        return $total_recette_musculation;
    }

    private function totalMedicament($date){
        $recette_medicaments = Medicament::whereYear('date', $date)->get();

        $total_recette_medicament = 0;

        foreach( $recette_medicaments as $recette_medicament ){

            $total_recette_medicament += $recette_medicament->montant;
        }

        return $total_recette_medicament;
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

    private function budgetdefinitif($date){
        $budgetdefinitif = BudgetDefinitif::whereYear('date', $date)->get();


        $total_recette_budget = 0;
        foreach ($budgetdefinitif  as $BudgetDefinitifs) {
            $total_recette_budget += $BudgetDefinitifs->budget;
        }
        return $total_recette_budget;
    
}
    private function Recette_ticket($date){
        $recetteticket = recetteticket::whereYear('date', $date)->get();

        $total_recette_recetteticket = 0;
        foreach($recetteticket as $recettetickets) {
            $total_recette_recetteticket += $recettetickets->montant;  
        }
        return $total_recette_recetteticket;
    }
  
    private function Recette_LoyerEtudiant($date){
        $ChmbreEt = ChambreEtudiant::whereYear('datepaiement', $date)->get();

        $total_recette_ChmbreEt = 0;
        foreach($ChmbreEt as $ChmbreEts) {
            $total_recette_ChmbreEt += $ChmbreEts->montant;
        }
        return $total_recette_ChmbreEt;
    }
}