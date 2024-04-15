<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class Credit extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function comptes(){
        return $this->belongsTo(Compte::class, 'comptes_id');
    }

    public function annee_actifs(){
        return $this->belongsTo(AnneeActif::class, 'annee_actifs_id');
    }
}
