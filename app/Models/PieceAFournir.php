<?php

namespace App\Models;

use App\Models\DiplomeObetenu;
use App\Models\DossierAdmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PieceAFournir extends Model
{
    use HasFactory;
    protected $fillable = [
        "cv",
        "charte",
        "projetDeThese",
        "AttestationDeBourse",
        "dossier_admission_id",
    ];
    public function dossierAdmission()
    {   
        return $this->belongsTo(DossierAdmission::class);
    }
    public function diplomeObetenu()
    {   
        return $this->hasMany(DiplomeObetenu::class);
    }
}
