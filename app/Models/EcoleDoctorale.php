<?php

namespace App\Models;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EcoleDoctorale extends Model
{
    use HasFactory;
    protected $fillable=[
    "name",
    "adresse",
    "enseignant_id",
    ];
    public function directeur()
    {
        return $this->belongsTo(Enseignant::class);
    } 
    public function doctorat()
    {
        return $this->hasMany(Doctorat::class);
    }
}
