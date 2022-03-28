<?php

namespace App\Models;

use App\Models\Enseignant;
use App\Models\DossierAdmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cursus extends Model
{
    use HasFactory;
    protected $fillable = [
        "diplomeAccess",
        "specialite",
        "universite",
        "pays",
        "lieu",
        "date",
        "mention",
        "dossier_admission_id",
    ];
    public function diplomeObetenu()
    {   
        return $this->belongsTo(DossierAdmission::class);
    }
}
