<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function index(){
        $medicament = Medicament::paginate(12);

        $total_recette_medicament = 0;
        foreach($medicament as $medicaments) {
            $total_recette_medicament += $medicaments->montant;
        }

        return view('ventes.medicament.index', compact('medicament', 'total_recette_medicament'));
    }

    public function create(){
        return view('ventes.medicament.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data = new Medicament();
        $data->create([

            'objetRecette'=> $request->objetRecette,
            'quantite' => $request->quantite,
            'pu' => $request->pu,
            'montant' => $request->quantite *  $request->pu,
            'date' => $request->date,
            'nomAgent' => $request->nomAgent,

            
        ]);

        return redirect()->route('medicament.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $medicament = Medicament::findOrFail($id);
        return view('ventes.medicament.edit', compact('medicament'));
    }

    public function update(Request $request, $id)
    {
        $medicament = Medicament::findOrFail($id);
        $medicament->update($request->all());
        return redirect()->route('medicament.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $medicament = Medicament::findOrFail($id);
        $medicament->delete();
        return redirect()->route('medicament.index')->with('success', 'Article updated successfully');
    }
    

}
