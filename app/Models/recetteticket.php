<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recetteticket extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function typeticket(){
        return $this->belongsTo(typeticket::class, 'typeticket_nomticket');
  
}
}