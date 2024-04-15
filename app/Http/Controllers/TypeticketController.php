<?php

namespace App\Http\Controllers;

use App\Models\Typeticket;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class TypeticketController extends Controller
{
    public function index(){
        $typeticket = Typeticket::paginate(12);

      
        return view('ventes.typetickets.index', compact('typeticket'));
    }


    public function create(){
        return view('ventes.typetickets.create');
    }

    public function store(Request $request)
    {
        $typeticket = $request->all();

        $typeticket = new Typeticket();
        $typeticket->create([
            
            'nomticket' => $request->nomticket,
            'valeur' => $request->valeur,
            'description' => $request->description,

        ]);

        return redirect()->route('typetickets.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $typeticket = Typeticket::findOrFail($id);
        return view('ventes.typetickets.edit', compact('typeticket'));
    }

    public function update(Request $request, $id)
    {
        $typeticket = Typeticket::findOrFail($id);
        $typeticket->update($request->all());
        return redirect()->route('typetickets.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $typeticket = Typeticket::findOrFail($id);
        $typeticket->delete();
        return redirect()->route('typetickets.index')->with('success', 'Article updated successfully');
    }
}
