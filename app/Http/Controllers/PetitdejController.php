<?php

namespace App\Http\Controllers;

use App\Models\Petitdej;
use Illuminate\Http\Request;

class PetitdejController extends Controller
{
    public function index(){
        $ticketpetitdej = Petitdej::paginate(12);

        $total_recette_ticketpetitdej = 0;
        foreach($ticketpetitdej as $ticketpetitdejs) {
            $total_recette_ticketpetitdej += $ticketpetitdejs->montant;
        }

        return view('ventes.ticketpetitdej.indexpetitdej', compact('ticketpetitdej', 'total_recette_ticketpetitdej'));
    }

    public function create(){
        return view('ventes.ticketpetitdej.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data = new Petitdej();
        $data->create([
            
            'quantite' => $request->quantite,
            
            'montant' => $request->quantite * 50,
            'date' => $request->date,
            'nomAgent' => $request->nomAgent,

            
        ]);

        return redirect()->route('ticketpetitdej.indexpetitdej')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $ticketpetitdej = Petitdej::findOrFail($id);
        return view('ventes.ticketpetitdej.edit', compact('ticketpetitdej'));
    }

    public function update(Request $request, $id)
    {
        $ticketpetitdej = Petitdej::findOrFail($id);
        $ticketpetitdej->update($request->all());
        return redirect()->route('ticketpetitdej.indexpetitdej')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $ticketpetitdej = Petitdej::findOrFail($id);
        $ticketpetitdej->delete();
        return redirect()->route('ticketpetitdej.indexpetitdej')->with('success', 'Article updated successfully');
    }

}
