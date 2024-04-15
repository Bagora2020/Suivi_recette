<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeticket extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function recettetickets(){
        return $this->hasMany(recetteticket::class);
    }
}
