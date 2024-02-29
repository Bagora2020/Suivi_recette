<?php

namespace App\Http\Controllers;

use App\Models\Cantines;
use App\Models\ChambreEtudiant;
use App\Models\greenvibes;
use App\Models\recetteloction;
use App\Models\sallecafetaria;
use App\Models\terrainmultisport;
use Illuminate\Http\Request;

class RecetteloctionController extends Controller
{


        public function index(Request $request){
            if($request->all() !== null && $request->all() !== []){
                
                $date = $request->date;
            }else{
                $date = date('Y');
            }

            $month = $request->input('month');
            if ($month === null) {
                $month = date('m');
            }

        $total_recette_greenvibes = $this->total_recette_greenvibes($date,$month);
        $total_recette_sallecafetaria= $this->total_recette_sallecafetaria($date, $month);
        $total_recette_terrainmultisport=  $this->recette_terrain_multisport($date, $month);
        $total_recette_cantines=  $this->recette_Cantines($date, $month);
        $total_recette_ChmbreEt=  $this->recette_Chmbr($date, $month);

        $recettes_total_location = $this->total_recette_greenvibes($date, $month) + $this->total_recette_sallecafetaria($date, $month) + $this->recette_terrain_multisport($date, $month)+ $this->recette_Cantines($date, $month) + $this->recette_Chmbr($date, $month);

        $location=[$total_recette_greenvibes, $total_recette_sallecafetaria, $total_recette_terrainmultisport, $total_recette_cantines, $total_recette_ChmbreEt];

        return view('location.home', compact('total_recette_greenvibes', 'total_recette_sallecafetaria', 'total_recette_terrainmultisport', 'recettes_total_location','total_recette_cantines','total_recette_ChmbreEt', 'location'));
}

private function total_recette_greenvibes($date, $month){

    $greenvibes = Greenvibes::whereYear('datepaiement', $date)
                                    ->whereMonth('datepaiement', $month)->get();

    $total_recette_greenvibes = 0;
    foreach($greenvibes as $greenvibe) {
        $total_recette_greenvibes += $greenvibe->montant;
    }
    return $total_recette_greenvibes;
}

private function total_recette_sallecafetaria($date, $month){

$sallecafetaria = Sallecafetaria::whereYear('date', $date)
                                ->whereMonth('date', $month)->get();

    $total_recette_sallecafetaria= 0;
    foreach($sallecafetaria as $salcaf) {
        $total_recette_sallecafetaria += $salcaf->montant;
    }
    return $total_recette_sallecafetaria;
}
private function recette_terrain_multisport($date, $month){

    $terrainmultisport = Terrainmultisport::whereYear('date', $date)->whereMonth('date', $month)->get();

    $total_recette_terrainmultisport = 0;
    foreach($terrainmultisport as $termultisport) {
        $total_recette_terrainmultisport += $termultisport->montant;
    }
    return $total_recette_terrainmultisport;
}  

private function recette_Cantines($date, $month){
    $cantines = Cantines::whereYear('date', $date)->whereMonth('date', $month)->get();
$total_recette_cantines = 0;
        foreach($cantines as $cantine) {
            $total_recette_cantines += $cantine->montant;
        }
        return $total_recette_cantines;
    }    
     
    private function recette_Chmbr($date){
        $ChmbreEt = ChambreEtudiant::whereYear('datepaiement', $date)->get();
        $total_recette_ChmbreEt = 0;
        foreach($ChmbreEt as $ChmbreEts) {
            $total_recette_ChmbreEt += $ChmbreEts->montant;
        }
        return $total_recette_ChmbreEt;
        }   
    
       
    
    

    public function __construct()
{
    $this->middleware('auth');
}

    
}
