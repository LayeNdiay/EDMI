<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\Cursus;
use App\Models\Doctorat;
use App\Models\Etudiant;
use App\Models\Certificat;
use App\Models\Enseignant;
use App\Models\Laboratoire;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\PieceAFournir;
use App\Models\DiplomeObetenu;
use App\Models\EcoleDoctorale;
use App\Models\DossierAdmission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Demande extends Controller
{   
    public function show()
    {
        $dossierPostuler = DossierAdmission::all()->where('status','attente')->where('postuler',"yes")->where('etudiant_id',Auth::user()->userable->id)->first();
        $dossierValider = DossierAdmission::all()->where('status','valider')->where('etudiant_id',Auth::user()->userable->id)->first();
        if ($dossierPostuler != null  && $dossierValider !=null) {
            return redirect()->route("etudiant.viewDemande",['id'=>$dossierPostuler->id]);    
        }
        if($dossierValider != null)
        {
            return redirect()->route("etudiant.viewDemande",['id'=>$dossierValider->id]);    
        }

        $dossier = DossierAdmission::all()->where('status','attente')->where('postuler',"no")->where('etudiant_id',Auth::user()->userable->id)->first();
        $voir = true;
        if($dossier !=null)
        {
           if($dossier->doctorat()->first()!=null)
           {
               return redirect()->route("etudiant.viewDemande",['id'=>$dossier->id]);    
           }
           $voir = false;
        }
        $enseignant = Enseignant::all();
        $labo = Laboratoire::all();
        $ecoles = EcoleDoctorale::all();
        $etablissement = Etablissement::all();
       return view("etudiant.showDemande",[
           "enseignants"=>$enseignant,
           'labos'=> $labo,
           'etablissements'=>$etablissement,
           "ecoles"=>$ecoles,
           'voir'=>$voir,
       ]);
    }
    public function create(Request $request)
    {
        $request->validate([
            "diplome"=>['required', 'string', 'max:255','min:2'],
            "nom"=>['required', 'string', 'max:255','min:2'],
            "prenom"=>['required', 'string', 'max:255','min:2'],
            "adresse"=>['required', 'string', 'max:255','min:2'],
            "email"=>['required', 'string', 'email', 'max:255'],
            "telephone"=>['required', 'string', 'max:255','min:2'],
            "mention"=>['required', 'string', 'max:255','min:2'],
            "specialite"=>['required', 'string', 'max:255','min:2'],
            "universite"=>['required', 'string', 'max:255','min:2'],
            "date"=>['required'],
            "lieu"=>['required', 'string', 'max:255','min:2'],
            "pays"=>['required', 'string', 'max:255','min:2'],
            "intitule"=>['required', 'string', 'max:255','min:2'],
            "etablissement"=>['required',"min:1"],
            "labo"=>['required',"min:1"],
            "sujet"=>['required', 'string', 'min:2'],
            'enseignant'=>["min:1"],
        ]);
        $etudiant = Auth::user()->userable;
        $user = Auth::user();
        $etudiant->update([
            "adresse"=>$request->adresse,
            "telephone"=>$request->telephone,
        ]);
        $user->update([
            "name"=>$request->nom,
            "prenom"=>$request->prenom, 
            ]);

        $dossier = DossierAdmission::all()->where('status',"attente")->where("postuler","no")->where('etudiant_id',Auth::user()->userable->id)->first();
        if($dossier == null)
        {
            $dossier= DossierAdmission::create([
                "etudiant_id"=>Auth::user()->userable->id,
                "enseignant_id"=>$request->enseignant,
            ]);
        }
        Doctorat::create([
            "laboratoires_id"=>$request->labo,
            'sujet'=>$request->sujet,
            "intituleDoctorat"=>$request->intitule,
            "etablissement_id"=>$request->etablissement,
            "dossier_admission_id"=>$dossier->id,
            "ecole_doctorale_id"=>1,
        ]);
        Cursus::create([
            "diplomeAccess"=>$request->diplome,
            "specialite"=>$request->specialite,
            "universite"=>$request->universite,
            "dossier_admission_id"=>$dossier->id,
            "pays"=>$request->pays,
            "lieu"=>$request->lieu,
            "date"=>$request->date,
            "mention"=>$request->mention
        ]);
       return redirect()->route("etudiant.viewDemande",['id'=>$dossier->id]);
    }
    public function view(int $id)
    {
        $dossier = DossierAdmission::where("id",$id)->first();
        if ($dossier == null) {
            abort(404);
        }   
        $doctorat = $dossier->doctorat()->first(); 
        
        $cursus = $dossier->cursus()->first();
        $ecole = EcoleDoctorale::where('id',1)->first();
        $etablissement = Etablissement::where('id',$doctorat->etablissement_id)->first();
        $labo = Laboratoire::where('id',$doctorat->laboratoires_id)->first();
        return view("etudiant.viewDemande",[
            'doctorat'=>$doctorat,
            "dossier"=>$dossier,
            'cursus'=>$cursus,
            "ecole"=>$ecole,
            "etablissement"=>$etablissement,
            "labo"=>$labo
        ]);
    }
    public function showEdit(String $id)
    {
        $dossier = DossierAdmission::where("id",$id)->first();
        $labos = Laboratoire::all();
        $ecoles = EcoleDoctorale::all();
        $etablissements = Etablissement::all();
        $doctorat =  $dossier->doctorat()->first();
        $labo = $doctorat->laboratoire()->first();
        $cursus = $dossier->cursus()->first();
        $ecole = $doctorat->ecole()->first();
       return view("etudiant.EditDemande",[
           'labos'=> $labos,
           "dossier"=>$dossier,
           "lab"=>$labo,
           "ecole"=>$ecole,
           "cursus"=>$cursus,
           "doctorat"=>$doctorat,
           'etablissements'=>$etablissements,
           "ecoles"=>$ecoles,
       ]);
    }
    public function storeDemande(Request $request, string $id)
    {
        $request->validate([
            "diplome"=>['required', 'string', 'max:255','min:2'],
            "nom"=>['required', 'string', 'max:255','min:2'],
            "prenom"=>['required', 'string', 'max:255','min:2'],
            "adresse"=>['required', 'string', 'max:255','min:2'],
            "email"=>['required', 'string', 'email', 'max:255'],
            "telephone"=>['required', 'string', 'max:255','min:2'],
            "mention"=>['required', 'string', 'max:255','min:2'],
            "specialite"=>['required', 'string', 'max:255','min:2'],
            "universite"=>['required', 'string', 'max:255','min:2'],
            "date"=>['required'],
            "lieu"=>['required', 'string', 'max:255','min:2'],
            "pays"=>['required', 'string', 'max:255','min:2'],
            "intitule"=>['required', 'string', 'max:255','min:2'],
            "etablissement"=>['required',"min:1"],
            "labo"=>['required',"min:1"],
            "sujet"=>['required', 'string', 'min:2'],
        ]);
        $dossier = DossierAdmission::where("id",$id)->first();
        $etudiant = Auth::user()->userable;
        $user = Auth::user();
        $etudiant->update([
            "adresse"=>$request->adresse,
            "telephone"=>$request->adresse,

        ]);
        $user->update([
            "name"=>$request->nom,
            "prenom"=>$request->prenom, 
            ]);
        $doctorat = $dossier->doctorat()->first() ;
        $cursus =  $dossier->cursus()->first() ;
        $doctorat->update([
            "laboratoires_id"=>$request->labo,
            'sujet'=>$request->sujet,
            "intituleDoctorat"=>$request->intitule,
            "dossier_admission_id"=>$id,
            "ecole_doctorale_id"=>$request->ecole,
        ]);
        $cursus->update([
            "diplomeAccess"=>$request->diplome,
            "specialite"=>$request->specialite,
            "universite"=>$request->universite,
            "dossier_admission_id"=>$id,
            "pays"=>$request->pays,
            "lieu"=>$request->lieu,
            "date"=>$request->date,
            "mention"=>$request->mention
        ]);
       return redirect()->route("etudiant.viewDemande",['id'=>$dossier->id]);
    }
    public function showPJ( string $id)
    {
        $dossier = DossierAdmission::where("id",$id)->where("etudiant_id",Auth::user()->userable->id)->first();
        
        if ($dossier == null) {
            abort(404);
        }   
        return view("etudiant.showPJ",["dossier"=>$dossier]);
    }
    public function storePJ(Request $request , int $id)
    {
        $request->validate([
            'cv'=>['required',"max:3180"],
            'projet'=>['required',"max:3180"],
            'attestation'=>['required',"max:3180"],
            'diplomesObenus'=>['required'],
        ]);
        $dossier = DossierAdmission::where("id",$id)->where("etudiant_id",Auth::user()->userable->id)->first();
        $cv= Storage::put('PJ/'.Auth::user()->slug,$request->cv);
        
        $projet= Storage::put('PJ/'.Auth::user()->slug,$request->projet);
        $attestation= Storage::put('PJ/'.Auth::user()->slug,$request->attestation);
        $piece = PieceAFournir::create([
            "cv"=>$cv,
            "charte"=>"mlklm",
            "projetDeThese"=>$projet,
            "AttestationDeBourse"=>$attestation,
            "dossier_admission_id"=>$dossier->id,
        ]);
        foreach ($request->diplomesObenus as $diplome) {
        $path= Storage::put('PJ/'.Auth::user()->slug,$diplome);

            DiplomeObetenu::create([
                "name"=>$diplome->getClientOriginalName(),
                "fichier"=>$path,
                "piece_a_fournir_id"=>$piece->id,
            ]);
        }
        $dossier->update(["postuler"=>"yes"]);
        return redirect()->route("dashboard");
    }
    public function showCertificat(int $id)
    {
        $demande = Auth::user()->userable->DossierAdmission()->where('id',$id)->get()->first();
        if($demande ==null)
        {
            abort(404);
        }
        if($demande->certificat()->get()->first() != null )
        {
            abort(404);
        }
        return view("etudiant.showCertificat",["id"=>$demande->id]);
    }
    public function storeCertificat($id,Request $request)
    {
        $request->validate([
            "certificat"=>['required',"max:3180"]
        ]);
        $demande = Auth::user()->userable->DossierAdmission()->where('id',$id)->get()->first();
        if($demande ==null)
        {
            abort(404);
        }
        $path= Storage::put('Certificat/'.Auth::user()->slug,$request->certificat);
        $certicat = Certificat::create([
            "fichier"=>$path,
            "dossier_admission_id"=>$demande->id
        ]);
        return redirect()->route("dashboard");
        
        # code...
    }
}