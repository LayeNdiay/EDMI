<?php

namespace App\Models;

use App\Models\CandidatPostuler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProposerTheseEnseignant extends Model
{
    use HasFactory;
    protected $fillable=[
        "status",
        "sujet",
        "description",
        "enseignant_id",
    ];
    public function candidat ()
    {
        return $this->hasMany(CandidatPostuler::class);
    }
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class,);
        
    }

}
