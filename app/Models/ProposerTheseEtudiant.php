<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposerTheseEtudiant extends Model
{
    use HasFactory;
    protected $fillable =[
        "cv",
        "sujet",
        "description",
        "confirmationEnseignant",
        "etudiant_id",
        "enseignant_id",
    ];
}
