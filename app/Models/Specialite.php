<?php

namespace App\Models;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialite extends Model
{
    use HasFactory;
    public $fillable=[
        "name",
        "enseignant_id",
    ];
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
        # code...
    }
}
