<?php

namespace App\Http\Controllers;

use App\Models\OrdreRecette;
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
        

        $total_recette_consultation = $this->totalConsultation($date);
        $total_recette_musculation = $this->totalMusculation($date);
        $total_recette_medicament = $this->totalMedicament($date);
        $total_recette_petitdejj = $this->total_petit_dej($date);
        $total_recette_ticketdej = $this->total_dej($date);

        $total_restauration = $this->total_petit_dej($date) + $this->total_dej($date);


        $recette_total = $this->totalConsultation($date) + $this->totalMusculation($date) + $this->totalMedicament($date) + $this->total_petit_dej($date) + $this->total_dej($date);
        $res = [$total_recette_consultation, $total_recette_musculation, $total_recette_medicament, $total_restauration];
        return view('ventes.home', compact('total_recette_consultation', 'total_recette_musculation', 'total_recette_medicament', 'total_restauration', 'recette_total', 'res'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $ordreRecette = OrdreRecette::all();


        return view('ventes.create', compact('ordreRecette'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data = new OrdreRecette();
        $data->create([
            'objetRecette' => $request->objetRecette,
            'quantite' => $request->quantite,
            'pu' => $request->pu,
            'montant' => $request->quantite * $request->pu,
            'date' => $request->date,

            'type' => $request->type
        ]);

        return redirect()->route('ordreRecette.create')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }



    /**
     * Display the specified resource.
     */
    public function show(OrdreRecette $ordreRecette)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {


        $ordreRecette = OrdreRecette::findOrFail($id);
        return view('ventes.edit', compact('ordreRecette'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ordreRecette = OrdreRecette::findOrFail($id);

             $ordreRecette->update([
            'objetRecette' => $request->objetRecette,
            'quantite' => $request->quantite,
            'pu' => $request->pu,
            'montant' => $request->quantite * $request->pu,
            

            'type' => $request->type
        ]);

        return redirect()->route('ordreRecette.create')->with('success', "l'ordre de recette a été modifié avec succès");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ordreRecette = OrdreRecette::findOrFail($id);
        $ordreRecette->delete();
        return redirect()->back()->with('success', "l'ordre de recette a été supprimer avec succès");
    }

    //totales des recettes*****

    private function totalConsultation($date)
    {
        $recette_consultations = OrdreRecette::where('type', '=', 'consultation')
            ->whereYear('date', $date)
            ->get();
        $total_recette_consultation = 0;
        foreach ($recette_consultations as $recette_consultation) {
            $total_recette_consultation += $recette_consultation->montant;
        }

        return $total_recette_consultation;
    }

    private function totalMusculation($date)
    {
        $recette_musculations = OrdreRecette::where('type', '=', 'musculation')
                                                    ->whereYear('date', $date)
                                                    ->get();

        $total_recette_musculation = 0;

        foreach ($recette_musculations as $recette_musculation) {

            $total_recette_musculation += $recette_musculation->montant;
        }

        return $total_recette_musculation;
    }

    private function totalMedicament($date)
    {
        $recette_medicaments = OrdreRecette::where('type', '=', 'medicament')
                                                    ->whereYear('date', $date)
                                                    ->get();

        $total_recette_medicament = 0;

        foreach ($recette_medicaments as $recette_medicament) {

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
