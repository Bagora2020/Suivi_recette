<?php

namespace App\Http\Controllers;

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

        $total_recette_greenvibes = $this->total_recette_greenvibes($date);
        $total_recette_sallecafetaria= $this->total_recette_sallecafetaria($date);
        $total_recette_terrainmultisport=  $this->recette_terrain_multisport($date);

        $recettes_total_location = $this->total_recette_greenvibes($date) + $this->total_recette_sallecafetaria($date) + $this->recette_terrain_multisport($date);

        $location=[$total_recette_greenvibes, $total_recette_sallecafetaria, $total_recette_terrainmultisport];

        return view('location.home', compact('total_recette_greenvibes', 'total_recette_sallecafetaria', 'total_recette_terrainmultisport', 'recettes_total_location', 'location'));
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


       
     
    
       
    
    

    public function __construct()
{
    $this->middleware('auth');
}

    
}
