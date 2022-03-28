<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Enseignant;
use App\Models\Laboratoire as ModelLab;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Controllers\Controller;

class Laboratoire extends Controller
{
    public function show()
    {
        $enseignant = Enseignant::all();
        $etablissement = Etablissement::all();
        return view('laboratoire.show',['enseignant'=>$enseignant,"etablissement"=>$etablissement]);
    }
    public function create(Request $request)
    {
        
        $enseignants = Enseignant::all();
        $etablissement = Etablissement::all();
        $request->validate([
            "nomLabo" => ['required', 'string', 'max:255','min:2'], 
            "adresse" => ['required', 'string', 'max:255','min:2'], 
            "intitule" => ['required', 'string', 'max:255','min:2'], 
            "enseignant" => ['required', 'integer','min:1'], 
            "ecole" => ['required', 'integer','min:1'], 
        ]); 
        foreach ($enseignants as $enseignant) {
                if ($enseignant->id === $request->enseignant) {
                    $enseignant->update([
                        "role"=>"directeur de la formation doctoral",
                    ]);
                }
        }
        ModelLab::create([
            'name'=>$request->nomLabo,
            'adresse'=>$request->adresse,
            'intitule'=>$request->intitule,
            'enseignant_id'=>$request->enseignant,
            'etablissement_id'=>$request->ecole
        ]);
        return view("laboratoire.show",['enseignant'=>$enseignants,"etablissement"=>$etablissement])->with("success","Ecole créer avec succes");
    }
}
