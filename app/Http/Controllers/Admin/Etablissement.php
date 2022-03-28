<?php

namespace App\Http\Controllers\Admin;

use App\Models\Enseignant;
use App\Models\Laboratoire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EcoleDoctorale;
use Illuminate\Foundation\Auth\User;
use App\Models\Etablissement as ModelsEtablissement;

class Etablissement extends Controller
{
    public function show()
    {
        $enseignant = Enseignant::all() ;
        $ecole = EcoleDoctorale::all() ;
        return view('Etablissement.show',['enseignant'=>$enseignant,"ecoles"=>$ecole]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255','min:2'], 
            'adresse' => ['required', 'string', 'max:255','min:2'], 
            'domaine' => ['required', 'string', 'max:255','min:2'], 
            'ecole' => ['required', 'string', 'max:255','min:1'], 
            'enseignant' => ['required', 'integer','min:1'], 
            'dgecole' => ['required', 'integer','min:1',"different:enseignant"], 
        ]);
        $enseignants = Enseignant::all();
        foreach ($enseignants as $enseignant) {
                if ($enseignant->id == $request->enseignant) {
                    $enseignant->update([
                        "role"=>"directeur de la formation doctoral",
                    ]);
                }
                elseif ($enseignant->id == $request->dgecole) {
                    $enseignant->update(["role" => "directeur d'etablissement"]);
                }
        }
        ModelsEtablissement::create([
            'name'=>$request->nom,
            'adresse'=>$request->adresse,
            'domaine'=>$request->domaine,
            'chefFormation'=>$request->enseignant,
            'dGEcole'=>$request->dgecole,
            "ecole_doctorale_id"=>$request->ecole,
        ]);
        $ecole= EcoleDoctorale::all();
        return view("Etablissement.show",['enseignant'=>$enseignants,"ecoles"=>$ecole])->with("success","Etablissemnt créer avec succes");
        
    }
}
