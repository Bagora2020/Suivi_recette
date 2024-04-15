<?php

namespace App\Http\Controllers;

use App\Models\Cantines;
use Illuminate\Http\Request;

class CantinesController extends Controller
{
    public function index(){
        $cantine = Cantines::paginate(21);
        
        $total_recette_cantines = 0;
        foreach($cantine as $cantines) {
            $total_recette_cantines += $cantines->montant;
        }
        

        return view('location.cantines.index', compact('cantine', 'total_recette_cantines'));
    }

    

    public function create(){
        return view('location.Cantines.create');
    }


    public function store(Request $request){

        $cantine = $request->all();

        $cantine = New Cantines();
        $cantine->create([
            'objetrecette' => $request->objetrecette,
            'numero' => $request->numero,
            'nomLoc' => $request->nomLoc,
            'mois' => $request->mois,
            'montant' => $request->montant,
            'date' => $request->date,
            'nomAgent' => $request->nomAgent
        ]);

        return redirect()->route('Cantines.index')->with('success', 'ajouter avec succés');
    }

    public function edit($id)
    {
        $cantine = Cantines::findOrFail($id);
        return view('location.Cantines.edit', compact('cantine'));
    }

    public function update(Request $request, $id)
    {
        $cantine = Cantines::findOrFail($id);
        $cantine->update($request->all());
        return redirect()->route('Cantines.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $cantine = Cantines::findOrFail($id);
        $cantine->delete();
        return redirect()->route('Cantines.index')->with('success', 'Article updated successfully');
    }
    public function __construct()
{
    $this->middleware('auth');
}
}
