<?php

namespace App\Http\Controllers;

use App\Models\AnneeActif;
use App\Models\Compte;
use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index(){
        $credits = Credit::paginate(20);

        $total_budget = 0;
        foreach($credits as $credit) {
            $total_budget += $credit->budget;
        }

        return view('Credits.index', compact('credits','total_budget'));
    }

    public function create(){
        $comptes= Compte::all();
     

        return view('Credits.create', compact('comptes'));

    }

    public function store(Request $request)
    {
        
        $credits = $request->all();
        $sessionActive = AnneeActif::where('actif', 1)->first();

        if ($sessionActive) {

        $credits = new Credit();
        $credits->create([
            'annee_actifs_id' => $sessionActive->id,
            'comptes_id' => $request->comptes_id,
            'budget' => $request->budget,
            'prevision' => $request->prevision, 
        ]);
    }else{

    }

        return redirect()->route('Credits.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $credits = Credit::findOrFail($id);
        $comptes= Compte::all();
   
        return view('Credits.edit', compact('credits','comptes'));
    }

    public function update(Request $request, $id)
    {
        $credits = Credit::findOrFail($id);
    

        $credits->update($request->all());
       
        return redirect()->route('Credits.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $credits = Credit::findOrFail($id);
        $credits->delete();
        return redirect()->route('Credits.index')->with('success', 'Article updated successfully');
    }

}


