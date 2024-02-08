<?php

namespace App\Http\Controllers;

use App\Models\terrainmultisport;
use Illuminate\Http\Request;

class TerrainmultisportController extends Controller
{
    public function index(){
        $terrainmultisport = terrainmultisport::paginate(12);

        $total_recette_terrainmultisport = 0;
        foreach($terrainmultisport as $termultisport) {
            $total_recette_terrainmultisport += $termultisport->montant;
        }

        return view('location.terrainMultisport.index', compact('terrainmultisport', 'total_recette_terrainmultisport'));
    }

    public function create(){
        return view('location.terrainMultisport.create');
    }

    public function store(Request $request){

        $terrainmultisport = $request->all();

        $terrainmultisport = New terrainmultisport();
        $terrainmultisport->create([
            'nomLocataire' => $request->nomLocataire,
            'contact' => $request->contact,
            'statut' => $request->statut,
            'date' => $request->date,
            'debutmatch' => $request->debutmatch,
            'finmatch' => $request->finmatch,
            'montant' => $request->montant
            
        ]);

        return redirect()->route('terrainmultisport.index')->with('success', 'ajouter avec succés');
    }

    public function edit($id)
    {
        $terrainmultisport = Terrainmultisport::findOrFail($id);
        return view('location.terrainmultisport.edit', compact('terrainmultisport'));
    }

    public function update(Request $request, $id)
    {
        $terrainmultisport = Terrainmultisport::findOrFail($id);
        $terrainmultisport->update($request->all());
        return redirect()->route('terrainmultisport.index')->with('success', 'Article updated successfully');
    }


    public function destroy($id)
    {
        $terrainmultisport = Terrainmultisport::findOrFail($id);
        $terrainmultisport->delete();
        return redirect()->route('terrainmultisport.index')->with('success', 'Article updated successfully');
    }

    public function __construct()
{
    $this->middleware('auth');
}

}
