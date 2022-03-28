<?php

namespace App\Models;

use App\Models\DossierAdmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avis extends Model
{
    use HasFactory;
    protected $fillable = [
        "role",
        "decision",
        "date",
        "dossier_admission_id",
        "enseignant_id",
    ];

    public function diplomeObetenu()
    {   
        return $this->belongsTo(DossierAdmission::class);
    }
    public function enseignant()
    {   
        return $this->belongsTo(Enseignant::class);
    }
}
