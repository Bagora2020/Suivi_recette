<?php

namespace App\Http\Controllers;

use App\Models\BudgetDefinitif;
use Illuminate\Http\Request;

class BudgetDefinitifController extends Controller
{
    public function index(){
        $BudgetDefinitif = BudgetDefinitif::paginate(12);

      
        return view('budgetdefinitif.index', compact('BudgetDefinitif'));
    }


    public function create(){
        return view('budgetdefinitif.create');
    }

    public function store(Request $request)
    {
        $BudgetDefinitif = $request->all();

        $BudgetDefinitif = new BudgetDefinitif();
        $BudgetDefinitif->create([
            
            'budget' => $request->budget,
            'date' => $request->date,
            
        ]);

        return redirect()->route('budgetdefinitif.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $BudgetDefinitif = BudgetDefinitif::findOrFail($id);
        return view('budgetdefinitif.edit', compact('BudgetDefinitif'));
    }

    public function update(Request $request, $id)
    {
        $BudgetDefinitif = BudgetDefinitif::findOrFail($id);
        $BudgetDefinitif->update($request->all());
        return redirect()->route('budgetdefinitif.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $BudgetDefinitif = BudgetDefinitif::findOrFail($id);
        $BudgetDefinitif->delete();
        return redirect()->route('budgetdefinitif.index')->with('success', 'Article updated successfully');
    }
}
