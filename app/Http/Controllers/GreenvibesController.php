<?php

namespace App\Http\Controllers;

use App\Models\Greenvibes;
use Illuminate\Http\Request;

class GreenvibesController extends Controller
{
    public function index(){
        $greenvibes = Greenvibes::paginate(12);

        $total_recette_greenvibes = 0;
        foreach($greenvibes as $greenvibe) {
            $total_recette_greenvibes += $greenvibe->montant;
        }

        return view('location.greenvibes.index', compact('greenvibes', 'total_recette_greenvibes'));
    }

    public function create(){
        return view('location.greenvibes.create');
    }


    public function store(Request $request){

        $grenVibes = $request->all();

        $grenVibes = New Greenvibes();
        $grenVibes->create([
            'objetrecette' => $request->objetrecette,
            'mois' => $request->mois,
            'montant' => $request->montant,
            'datepaiement' => $request->datepaiement,
            'nomAgent' => $request->nomAgent
        ]);

        return redirect()->route('greenvibes.index')->with('success', 'ajouter avec succés');
    }

    public function edit($id)
    {
        $grenVibes = Greenvibes::findOrFail($id);
        return view('location.greenvibes.edit', compact('grenVibes'));
    }

    public function update(Request $request, $id)
    {
        $grenVibes = Greenvibes::findOrFail($id);
        $grenVibes->update($request->all());
        return redirect()->route('greenvibes.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $grenVibes = Greenvibes::findOrFail($id);
        $grenVibes->delete();
        return redirect()->route('greenvibes.index')->with('success', 'Article updated successfully');
    }
    public function __construct()
{
    $this->middleware('auth');
}

}

