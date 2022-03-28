<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory;
    protected $fillable = [
        'fichier',
        'dossier_admission_id'
    ];
    public function dossier_admission()
    {
        return $this->belongsTo(DossierAdmission::class);
    }
}
