<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Etudiant;
use App\Models\Enseignant;
Use PDF;
use Illuminate\Http\Request;
use App\Models\DossierAdmission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EspaceEnseignantController extends Controller
{
    public function index()
    {
        $dossier = DossierAdmission::where('status',"valider")->get()->all();
        $etudiants =[] ;
        $i = 0;
        foreach ($dossier  as $doc) {
                $etablissement = $doc->doctorat()->get()->first()->etablissement()->get()->first(); 
                if($etablissement->dGEcole == Auth::user()->userable->id)
                {
                    $etudiants[$i] = $doc->etudiant()->get()->first();
                    $etudiants[$i]->etablissement = $doc->doctorat()->get()->first()->etablissement()->get()->first()->name;
                    $enseignant = Enseignant::where('id',$doc->enseignant_id)->get()->first();
                    $etudiants[$i]->dg = $enseignant->user->prenom . '  ' .$enseignant->user->name;
                    $etudiants[$i]->labo = $doc->doctorat()->get()->first()->laboratoire()->get()->first()->name;
                    $i++;
                }
        }
        return view("enseignant-dashboard",["etudiants"=>$etudiants]);
    }
    public function showListeAuto()
    {
        $dossier = DossierAdmission::where('status',"valider")->get()->all();
        $etudiants =[] ;
        foreach ($dossier as $key => $doc) {
            $etudiants[$key] = $doc->etudiant()->get()->first();
            $etudiants[$key]->etablissement = $doc->doctorat()->get()->first()->etablissement()->get()->first()->name;
            $enseignant = Enseignant::where('id',$doc->enseignant_id)->get()->first();
            $etudiants[$key]->dg = $enseignant->user->prenom . '  ' .$enseignant->user->name;
            $etudiants[$key]->labo = $doc->doctorat()->get()->first()->laboratoire()->get()->first()->name;
        }
        return view('enseignant.showListeAuto',['candidats'=>$etudiants,]);
    }
    public function showListeInscrit()
    {
        $dossier = DossierAdmission::where('status',"valider")->get()->all();
        $etudiants =[] ;
        $i = 0;
        foreach ($dossier  as $doc) {
            if ($doc->certificat()->get()->first() != null) {
                
                $etudiants[$i] = $doc->etudiant()->get()->first();
                $etudiants[$i]->etablissement = $doc->doctorat()->get()->first()->etablissement()->get()->first()->name;
                $enseignant = Enseignant::where('id',$doc->enseignant_id)->get()->first();
                $etudiants[$i]->dg = $enseignant->user->prenom . '  ' .$enseignant->user->name;
                $etudiants[$i]->labo = $doc->doctorat()->get()->first()->laboratoire()->get()->first()->name;
                $i++;
            }
        }
        return view('enseignant.showListeInscrit',['candidats'=>$etudiants,]);  
    }
    public function download()
    {
        $dossier = DossierAdmission::where('status',"valider")->get()->all();
        $etudiants =[] ;
        $i = 0;
        foreach ($dossier  as $doc) {
                $etudiants[$i] = $doc->etudiant()->get()->first();
                $etudiants[$i]->etablissement = $doc->doctorat()->get()->first()->etablissement()->get()->first()->name;
                $enseignant = Enseignant::where('id',$doc->enseignant_id)->get()->first();
                $etudiants[$i]->dg = $enseignant->user->prenom . '  ' .$enseignant->user->name;
                $etudiants[$i]->labo = $doc->doctorat()->get()->first()->laboratoire()->get()->first()->name;
                $i++;
        }
        $pdf = PDF::loadView('enseignant.showListePDF', ['candidats'=>$etudiants]);
        return $pdf->download("liste.pdf");
    }
    public function downloadListe()
    {
        $dossier = DossierAdmission::where('status',"valider")->get()->all();
        $etudiants =[] ;
        $i = 0;
        foreach ($dossier  as $doc) {
            if ($doc->certificat()->get()->first() != null) {
                
                $etudiants[$i] = $doc->etudiant()->get()->first();
                $etudiants[$i]->etablissement = $doc->doctorat()->get()->first()->etablissement()->get()->first()->name;
                $enseignant = Enseignant::where('id',$doc->enseignant_id)->get()->first();
                $etudiants[$i]->dg = $enseignant->user->prenom . '  ' .$enseignant->user->name;
                $etudiants[$i]->labo = $doc->doctorat()->get()->first()->laboratoire()->get()->first()->name;
                $i++;
            }
        }
        $pdf = PDF::loadView('enseignant.showListePDF', ['candidats'=>$etudiants]);
        return $pdf->download("liste.pdf");
    }
}
