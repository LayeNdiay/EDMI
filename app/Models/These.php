<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
    use HasFactory;
    protected $fillable = [
        "description",
        "these",
        "domaine",
        "etudiant_id",
        "enseignant_id",
    ];
}
