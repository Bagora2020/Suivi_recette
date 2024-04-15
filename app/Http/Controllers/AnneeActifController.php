<?php

namespace App\Http\Controllers;

use App\Models\AnneeActif;
use Illuminate\Http\Request;

class AnneeActifController extends Controller
{
    public function index()
    {
        
        $sessionActive = AnneeActif::where('actif', 1)->first();

        
        return $sessionActive;
    }
}
