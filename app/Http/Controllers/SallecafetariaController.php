<?php

namespace App\Http\Controllers;

use App\Models\sallecafetaria;
use Illuminate\Http\Request;

class SallecafetariaController extends Controller
{
    public function index(){
        $sallecafetaria = Sallecafetaria::paginate(12);

        $total_recette_sallecafetaria= 0;
        foreach($sallecafetaria as $salcaf) {
            $total_recette_sallecafetaria += $salcaf->montant;
        }
        return view('location.sallecafetaria.index', compact('sallecafetaria', 'total_recette_sallecafetaria'));
    }

    public function create(){
        return view('location.sallecafetaria.create');
    }
    
    public function store(Request $request){

        $sallecafetaria = $request->all();

        $sallecafetaria = New Sallecafetaria();
        $sallecafetaria->create([
         
            'ObjetRecette' => $request->ObjetRecette,
            'montant' => $request->montant,
            'date' => $request->date,
          
            'PartieVersante' => $request->PartieVersante
        ]);

        return redirect()->route('sallecafetaria.index')->with('success', 'ajouter avec succés');
    }


    public function edit($id)
    {
        $sallecafetaria = Sallecafetaria::findOrFail($id);
        return view('location.sallecafetaria.edit', compact('sallecafetaria'));
    }

    public function update(Request $request, $id)
    {
        $sallecafetaria = Sallecafetaria::findOrFail($id);
        $sallecafetaria->update($request->all());
        return redirect()->route('sallecafetaria.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $sallecafetaria = Sallecafetaria::findOrFail($id);
        $sallecafetaria->delete();
        return redirect()->route('sallecafetaria.index')->with('success', 'Article updated successfully');
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
