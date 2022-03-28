<?php

namespace App\Models;

use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratoire extends Model
{
    use HasFactory;
    public $fillable=[
        "name",
        "adresse", 
        "intitule", 
        "enseignant_id",
        "laboratoires_id",
        "etablissement_id",
        
    ];
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
    public function Enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
}
