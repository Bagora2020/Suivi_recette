<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeActif extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function annee_actifs(){
        return $this->hasMany(Credit::class);
    }
}
