<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltreController extends Controller
{
    public function filterByYear(Request $request)
    {
        
            $year = $request->input('year');
            session(['selected_year' => $year]);
    
            return redirect()->back();
        
    }
}
