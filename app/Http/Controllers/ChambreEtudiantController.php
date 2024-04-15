<?php

namespace App\Http\Controllers;

use App\Models\ChambreEtudiant;
use Illuminate\Http\Request;

class ChambreEtudiantController extends Controller
{
    public function index(){
        $ChmbreEt = ChambreEtudiant::paginate(12);

        $total_recette_ChmbreEt = 0;
        foreach($ChmbreEt as $ChmbreEts) {
            $total_recette_ChmbreEt += $ChmbreEts->montant;
        }

        return view('location.ChambreEtudiant.index', compact('ChmbreEt', 'total_recette_ChmbreEt'));
    }

    public function create(){
        return view('location.ChambreEtudiant.create');
    }


    public function store(Request $request){

        $ChmbreEt = $request->all();

        $ChmbreEt = New ChambreEtudiant();
        $ChmbreEt->create([
            'objetrecette' => $request->objetrecette,
            'mois' => $request->mois,
            'montant' => $request->montant,
            'datepaiement' => $request->datepaiement,
            'nomAgent' => $request->nomAgent
        ]);

        return redirect()->route('ChambreEtudiant.index')->with('success', 'ajouter avec succés');
    }

    public function edit($id)
    {
        $ChmbreEt = ChambreEtudiant::findOrFail($id);
        return view('location.ChambreEtudiant.edit', compact('ChmbreEt'));
    }

    public function update(Request $request, $id)
    {
        $ChmbreEt = ChambreEtudiant::findOrFail($id);
        $ChmbreEt->update($request->all());
        return redirect()->route('ChambreEtudiant.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $ChmbreEt = ChambreEtudiant::findOrFail($id);
        $ChmbreEt->delete();
        return redirect()->route('ChambreEtudiant.index')->with('success', 'Article updated successfully');
    }
    public function __construct()
{
    $this->middleware('auth');
}

}
