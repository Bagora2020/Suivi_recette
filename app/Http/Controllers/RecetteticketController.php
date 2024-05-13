<?php

namespace App\Http\Controllers;

use App\Models\recetteticket;
use App\Models\Typeticket;
use Illuminate\Http\Request;

class RecetteticketController extends Controller
{
    public function index(){
        $recetteticket = recetteticket::paginate(28);
        
        $recettepartype=[];

        $total_recette_recetteticket = 0;
        foreach($recetteticket as $recettetickets) {
            $total_recette_recetteticket += $recettetickets->montant;
        }

        // Boucle à travers les recettes tickets
    foreach ($recetteticket as $recette) {
        // Vérifier si le type de recette existe déjà dans le tableau regroupé
        if (array_key_exists($recette->typeticket->nomticket, $recettepartype)) {
            // Si oui, ajouter la recette à ce tableau
            $recettepartype[$recette->typeticket->nomticket][] = $recette;
        } else {
            // Sinon, créer une nouvelle entrée dans le tableau regroupé avec ce type de recette
            $recettepartype[$recette->typeticket->nomticket] = [$recette];
        }
    }
      
        return view('ventes.recetteticket.index', compact('recettepartype', 'recetteticket', 'total_recette_recetteticket'));
    }

    
    public function create(){
        $typeticket= Typeticket::all();
      

        return view('ventes.recetteticket.create', compact('typeticket'));

    }

    public function store(Request $request)
    {
        
        $recetteticket = $request->all();
   
$montant= $request->typeticket_valeur * $request->quantite;

        $recetteticket = new recetteticket();
        $recetteticket->create([
            'typeticket_nomticket' => $request->typeticket_nomticket,
            'quantite' => $request->quantite,
            'montant' => $montant,
            'date' => $request->date,
            'partieVersante' => $request->partieVersante,
           
        ]);

        return redirect()->route('recetteticket.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $recetteticket = recetteticket::findOrFail($id);
        $typeticket = Typeticket::all();
        return view('ventes.recetteticket.edit', compact('recetteticket','typeticket'));
    }

    public function update(Request $request, $id)
    {
        $recetteticket = recetteticket::findOrFail($id);
     
        $montant= $request->typeticket_valeur * $request->quantite;

        $recetteticket->update([
            'typeticket_nomticket' => $request->typeticket_nomticket,
            'quantite' => $request->quantite,
            'montant' =>$montant,
            'date' => $request->date,
            'partieVersante' => $request->partieVersante,
        ]);
       
        return redirect()->route('recetteticket.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $recetteticket = recetteticket::findOrFail($id);
        $recetteticket->delete();
        return redirect()->route('recetteticket.index')->with('success', 'Article updated successfully');
    }
}
