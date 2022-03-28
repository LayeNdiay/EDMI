<?php

namespace App\Models;

use App\Models\PieceAFournir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiplomeObetenu extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "fichier",
        "piece_a_fournir_id",
    ];
    public function PieceAFournir()
    {   
        return $this->belongsTo(PieceAFournir::class);
    }
}
