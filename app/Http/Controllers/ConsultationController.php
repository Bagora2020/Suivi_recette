<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index(){
        $consultation = Consultation::paginate(12);

        $total_recette_consultation = 0;
        foreach($consultation as $consultations) {
            $total_recette_consultation += $consultations->montant;
        }

        return view('ventes.consultation.index', compact('consultation', 'total_recette_consultation'));
    }

    public function create(){
        return view('ventes.consultation.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data = new Consultation();
        $data->create([
            
            'quantite' => $request->quantite,
            
            'montant' => $request->quantite * 50,
            'date' => $request->date,
            'nomAgent' => $request->nomAgent,

            
        ]);

        return redirect()->route('consultation.index')->with('success', "L'ordre de recette a été ajouté avec Succés");
    }

    public function edit($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('ventes.consultation.edit', compact('consultation'));
    }

    public function update(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update($request->all());
        return redirect()->route('consultation.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();
        return redirect()->route('consultation.index')->with('success', 'Article updated successfully');
    }

}
