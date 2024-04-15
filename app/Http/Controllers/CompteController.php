<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
   
    public function index(){
        $comptes = Compte::paginate(20);

      
        return view('comptes.index', compact('comptes'));
    }


    public function create(){
        return view('comptes.create');
    }

    public function store(Request $request)
    {
        $comptes = $request->all();

        $comptes = new Compte();
        $comptes->create([
            
            'code' => $request->code,
            'libelle' => $request->libelle, 
        ]);

        return redirect()->route('comptes.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $comptes = Compte::findOrFail($id);
        return view('comptes.edit', compact('comptes'));
    }

    public function update(Request $request, $id)
    {
        $comptes = Compte::findOrFail($id);
        $comptes->update($request->all());
        return redirect()->route('comptes.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $comptes = Compte::findOrFail($id);
        $comptes->delete();
        return redirect()->route('comptes.index')->with('success', 'Article updated successfully');
    }


}
