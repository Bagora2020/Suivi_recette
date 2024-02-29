<?php

namespace App\Http\Controllers;

use App\Models\Ticketdej;
use Illuminate\Http\Request;

class TicketdejController extends Controller
{
    public function index(){
        $ticketdej = Ticketdej::paginate(12);

        $total_recette_ticketdej = 0;
        foreach($ticketdej as $ticketdejs) {
            $total_recette_ticketdej += $ticketdejs->montant;
        }

        return view('ventes.ticketdej.indexdej', compact('ticketdej', 'total_recette_ticketdej'));
    }

    public function create(){
        return view('ventes.ticketdej.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data = new Ticketdej();
        $data->create([
            
            'quantite' => $request->quantite,
            
            'montant' => $request->quantite * 100,
            'date' => $request->date,
            'nomAgent' => $request->nomAgent,

            
        ]);

        return redirect()->route('ticketdej.indexdej')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $ticketdej = Ticketdej::findOrFail($id);
        return view('ventes.ticketdej.edit', compact('ticketdej'));
    }

    public function update(Request $request, $id)
    {
        $ticketdej = Ticketdej::findOrFail($id);
        $ticketdej->update($request->all());
        return redirect()->route('ticketdej.indexdej')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $ticketdej = Ticketdej::findOrFail($id);
        $ticketdej->delete();
        return redirect()->route('ticketdej.indexdej')->with('success', 'Article updated successfully');
    }

}
