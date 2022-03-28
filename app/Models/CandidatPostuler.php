<?php

namespace App\Models;

use App\Models\Etudiant;
use App\Models\ProposerTheseEnseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidatPostuler extends Model
{
    use HasFactory;
    protected $fillable = [
        "cv",
        "status",
        "confirmationEnseignant",
        "confirmationEtudiant",
        "etudiant_id",
        "proposer_these_enseignant_id", 
    ];
    public function these()
    {
        return $this->belongsTo(ProposerTheseEnseignant::class,"id",);
    }
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
