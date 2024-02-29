<?php

namespace App\Http\Controllers;

use App\Models\Musculation;
use Illuminate\Http\Request;

class MusculationController extends Controller
{
    public function index(){
        $musculation = Musculation::paginate(12);

        $total_recette_musculation = 0;
        foreach($musculation as $musculations) {
            $total_recette_musculation += $musculations->montant;
        }

        return view('ventes.musculation.index', compact('musculation', 'total_recette_musculation'));
    }

    public function create(){
        return view('ventes.musculation.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data = new Musculation();
        $data->create([
            
            'quantite' => $request->quantite,
            
            'montant' => $request->quantite * 50,
            'date' => $request->date,
            'nomAgent' => $request->nomAgent,

            
        ]);

        return redirect()->route('musculation.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $musculation = Musculation::findOrFail($id);
        return view('ventes.musculation.edit', compact('musculation'));
    }

    public function update(Request $request, $id)
    {
        $musculation = Musculation::findOrFail($id);
        $musculation->update($request->all());
        return redirect()->route('musculation.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $musculation = Musculation::findOrFail($id);
        $musculation->delete();
        return redirect()->route('musculation.index')->with('success', 'Article updated successfully');
    }

}
