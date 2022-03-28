<?php

namespace App\Models;

use App\Models\These;
use App\Models\DossierAdmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        "adresse",
        "nomEpoux",
        "telephone",
        'slug'
    ];
    public function user()
    {
        return $this->morphOne(User::class,"userable");
    }
    public function these()
    {
     return $this->hasMany(These::class);
    }
    public function DossierAdmission()
    {
        return $this->hasMany(DossierAdmission::class);
    }
    public function candidatPostuler()
    {
        return $this->hasMany(CandidatPostuler::class);
    }
}
