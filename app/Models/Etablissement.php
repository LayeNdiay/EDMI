<?php

namespace App\Models;

use App\Models\Enseignant;
use App\Models\Laboratoire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etablissement extends Model
{
    use HasFactory;
    public $fillable=[
        "name",
        "adresse",
        "domaine",
        "chefFormation",
        "dGEcole",
        "ecole_doctorale_id",

    ];
    public function labos()
    {
        return $this->belongsTo(Laboratoire::class);
    }
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class,"id");
    }
}
