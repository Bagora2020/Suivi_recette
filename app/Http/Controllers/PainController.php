<?php

namespace App\Http\Controllers;

use App\Models\Pain;
use Illuminate\Http\Request;

class PainController extends Controller
{
    public function index(){
        $Pain = Pain::paginate(12);

        $total_recette_Pain = 0;
        foreach($Pain as $Pains) {
            $total_recette_Pain += $Pains->montant;
        }

        return view('ventes.pain.index', compact('Pain', 'total_recette_Pain'));
    }

    public function create(){
        return view('ventes.pain.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data = new Pain();
        $data->create([
            
            'quantite' => $request->quantite,
            
            'montant' => $request->quantite * 50,
            'date' => $request->date,
            'nomAgent' => $request->nomAgent,

            
        ]);

        return redirect()->route('pain.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $Pain = Pain::findOrFail($id);
        return view('ventes.pain.edit', compact('Pain'));
    }

    public function update(Request $request, $id)
    {
        $Pain = Pain::findOrFail($id);
        $Pain->update($request->all());
        return redirect()->route('pain.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $Pain = Pain::findOrFail($id);
        $Pain->delete();
        return redirect()->route('pain.index')->with('success', 'Article updated successfully');
    }
}
