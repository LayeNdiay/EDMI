<?php

namespace App\Models;

use App\Models\Avis;
use App\Models\Cursus;
use App\Models\Doctorat;
use App\Models\Etudiant;
use App\Models\PieceAFournir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DossierAdmission extends Model
{
    use HasFactory;
    protected $fillable=[
        "status",
        "postuler",
        "avisDirecteurDeThese",
        "avisDirecteurDeLabo",
        "avisDirecteurDeEcoleDoctorale",
        "avisResponsableDoctorat",
        "avischefRatachement",
        "etudiant_id",
        "enseignant_id",
    ];
    public function avis()
    {   
        return $this->hasMany(Avis::class);
    }
    public function cursus()
    {   
        return $this->hasOne(Cursus::class);
    }
    public function doctorat()
    {   
        return $this->hasOne(Doctorat::class);
    }
    public function pieceAFournir()
    {   
        return $this->hasOne(PieceAFournir::class);
    }
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function certificat()
    {
        return $this->hasOne(Certificat::class);
    }
}
