<?php

namespace App\Models;

use App\Models\User;
use App\Models\Specialite;
use App\Models\Laboratoire;
use App\Models\Etablissement;
use App\Models\EcoleDoctorale;
use App\Models\ProposerTheseEnseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule',
        'grade',
        'slug',
        "role",

    ];
    public function user()
    {
        return $this->morphOne(User::class,"userable");
    }
    public function laboratoire()
    {
        return $this->hasOne(Laboratoire::class);
    }
    public function chefFormation()
    {
        return $this->hasOne(Etablissement::class,'chefFormation'); 
    }
    public function dGEtablissement()
    {
        return $this->hasOne(Etablissement::class,'dGEcole'); 
    }
    public function dGEcole()
    {
        return $this->hasOne(EcoleDoctorale::class);
    }
    public function specialites()
    {
        return $this->hasMany(Specialite::class);
        # code...
    }
    public function theses()
    {
        return $this->hasMany(These::class);
        # code...
    }
    public function proposerThese()
    {
        return $this->hasMany(ProposerTheseEnseignant::class);
    }
}
