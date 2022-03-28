<?php

namespace App\Models;

use App\Models\Etablissement;
use App\Models\EcoleDoctorale;
use App\Models\DossierAdmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctorat extends Model
{
    use HasFactory;
    protected $fillable = [
        "intituleDoctorat",
        "sujet",
        "dossier_admission_id",
        "etablissement_id",
        "laboratoires_id",
        "ecole_doctorale_id",
    ];
    public function diplomeObetenu() 
    {   
        return $this->belongsTo(DossierAdmission::class,"id");
    }
    public function ecole()
    {   
        return $this->belongsTo(EcoleDoctorale::class,"ecole_doctorale_id");
    }
    public function laboratoire()
    {
        return $this->belongsTo(Laboratoire::class,"laboratoires_id");
        # code...
    }
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class,"etablissement_id"); 
    }
    public function dossier()
    {
        return $this->belongsTo(DossierAdmission::class,'id');
        # code...
    }
}
