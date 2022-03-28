<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Etudiant\Demande;
use App\Models\CandidatPostuler;
use App\Models\DossierAdmission;
use App\Models\EcoleDoctorale;
use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\ProposerTheseEnseignant;
use App\Models\ProposerTheseEtudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class theseController extends Controller
{
    public function showPostuler()
    {
        return view('enseignant.showPostuler');
    }
    public function storePost(Request $request)
    {
        $request->validate([
            'sujet' => ['required', 'string', 'max:255','min:2'], 
            'description' => ['required', 'string','min:2'], 
        ]);
       $postEnseignant =  ProposerTheseEnseignant::create([
            "sujet"=>$request->sujet,
            "description"=>$request->description,
            "enseignant_id"=>Auth::user()->userable->id,
        ]);
       return redirect()->route("enseignant.viewOnePost",['id'=>$postEnseignant]);
    }
    public function viewOnePost(string $id)
    {
        $post = ProposerTheseEnseignant::where('id',$id)->where('enseignant_id',Auth::user()->userable->id)->first();
        if($post ==null)
        {
            abort(404);
        }
        $eleves = [];
        $postCandidats =$post->candidat()->get()->all();
        foreach ($postCandidats as $key =>$postCandidat) {
            $etud = $postCandidat->etudiant()->get()->first();
            $PostEl =$etud->candidatPostuler()->get()->all();
            $var = true;
            foreach ($PostEl as $el) {
                if ($el->status == "valider") {
                   $var = false;
                   break;
                }
            }
            if($var)
            {
                $eleves[$key] = $etud;
            }
            $postCandidat->conf = true;
            if($postCandidat->status =="valider" && $postCandidat->confirmationEnseignant == "valider")
            {
                $postCandidat->conf = false;
            }
        }
        return view("enseignant.viewOnePost",['post'=>$post,'candidats'=>$postCandidats,'etudiants'=>$eleves]);
    }
    public function viewAllPost()
    {
        $posts = Auth::user()->userable->proposerThese()->get()->all();
        return view("enseignant.viewAllPost",['posts'=>$posts]);
    }
    public function fermerPost(int $id)
    {
        $post = Auth::user()->userable->proposerThese()->where('id',$id)->get()->first();
        $post->update([
            'status'=>'fermer'
        ]);
        return redirect()->route("enseignant.viewAllPost")->with('success','fermeture effectuer avec success');
    }
    public function confirmerEtudiant(int $id)
    {
        $candidatPostuler = CandidatPostuler::where('id',$id)->get()->first() ;
        $candidatPostuler->update(["confirmationEnseignant"=>'valider']);
        $name = $candidatPostuler->etudiant()->get()->first();
        return redirect()->route("enseignant.viewAllPost")->with('success',$name->user->name ."est accepter autoriser à suivre une these avec votre sujet");
    }
    public function viewEtudiant(int $idEtudiant,int $idCandidat)
    {
        $etudiant = Etudiant::where("id",$idEtudiant)->get()->first();
        $candidat = CandidatPostuler::where("id",$idCandidat)->get()->first();
        return view('enseignant.voirEtudiant',['etudiant'=>$etudiant,'candidat'=>$candidat]);
    }
    public function showCandidats()
    {
        $dossier = null;
        $candidats = [];
        $i=0;
        $dossier = DossierAdmission::where("enseignant_id",Auth::user()->userable->id)->where("postuler","yes")->where("status","attente")->get()->all();
        if(Auth::user()->userable->id != 8)
        {

            if($dossier !=null)
            {
                foreach ($dossier as $doc) {
                    if($doc->status=='attente'  )
                    {
                        $candidats[$i]=$doc->etudiant()->get()->first() ;
                        $i++;
                    }
                }
                return view("enseignant.viewAllCandidat",["candidats"=>$candidats,"validation"=>$dossier]);
            }
        }
        $dossier = DossierAdmission::where("postuler","yes")->where("status","attente")->get()->all();
        if ($dossier != null) {
            $role=null;
            foreach ($dossier as $doc) {
                if($doc->status=='attente' &&  $doc->avisDirecteurDeThese=="valider" )
                {
                    $idDGEcole =$doc->doctorat()->get()->first()->etablissement()->get()->first()->dGEcole;
                   
                    $dgEcole = Enseignant::where("id",$idDGEcole)->get()->first();

                    //responsable de l'etablissement de ratachement du Doctrat
                    if($dgEcole !=null)
                    {
                        if($dgEcole->id == Auth::user()->userable->id && $doc->avisResponsableDoctorat == "attente")
                        {
                            $candidats[$i]=$doc->etudiant()->get()->first() ;
                            $role ="respEcole";
                            $i++;
                        }
                    }
                    $enseignant2 =$doc->doctorat()->get()->first()->laboratoire()->get()->first()->Enseignant()->get()->first() ;
                    //responsable du laboratoire
                    if($enseignant2->id == Auth::user()->userable->id && $doc->avisDirecteurDeLabo == "attente")
                    {
                        $candidats[$i]=$doc->etudiant()->get()->first() ;
                        $role = "dgLabo" ;
                        $i++;
                    }
                    $idChefFormation =$doc->doctorat()->get()->first()->etablissement()->get()->first()->chefFormation ;
                    //responsable du doctorat
                    $chefFormation = Enseignant::where("id",$idChefFormation)->get()->first();
                    // dd($chefFormation);
                    if($chefFormation !=null)
                    {   
                        if($chefFormation->id == Auth::user()->userable->id && $doc->avischefRatachement == "attente" )
                        {
                            $candidats[$i]=$doc->etudiant()->get()->first() ;

                            $role = "chefEcole";
                            $i++;
                        }
                    }
                    $DGEMDI = Enseignant::where('id',8)->get()->first();
                    if($DGEMDI != null)
                    {
                       if($DGEMDI->id == Auth::user()->userable->id && $doc->avisDirecteurDeEcoleDoctorale == "attente" )
                       {
                        $candidats[$i]=$doc->etudiant()->get()->first() ;
                        $role = "dgEDMI";
                        $i++;
                       }
                    }
                }
            }
            return view("enseignant.viewAllDGCandidat",["candidats"=>$candidats,'role'=>$role]);
        }
        return view("message",["message"=>"Aucun candidat a visualiser pour le moment "]);

    }
    public function viewDocsEleve($slug)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        return view("enseignant.viewDocsEtudiant",["dossier"=>$dossier,"etudiant"=>$etudiant]);
    }
    public function validerEtudiant($slug)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        return view("enseignant.validerEtudiant",["etudiant"=>$etudiant,"dossier"=>$dossier]);
    }
    public function storeCharte(Request $request,$slug)
    {
        $request->validate([
            'charte'=>['required',"max:3180"]
        ]);
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        $charte= Storage::put('PJ/'.Auth::user()->slug,$request->charte);
        $pieceAfournir = $dossier->pieceAFournir()->get()->first();
        $pieceAfournir->update([
            "charte"=>$charte,
        ]);
        $dossier->update([
            "avisDirecteurDeThese"=>"valider"
        ]);
        return redirect()->route('enseignant.showCandidats');
    }
    public function viewDGDocsElev($slug,$role)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        return view("enseignant.viewDGDocsEtudiant",["dossier"=>$dossier,"etudiant"=>$etudiant,"role"=>$role]);
    }
    public function confirmerDGPostulat($role,$slug)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        if($role =='chefEcole')
        {
            $dossier->update([
            'avischefRatachement'=>"valider"
            ]);
        }
        elseif ($role =='dgLabo') {
            $dossier->update([
                'avisDirecteurDeLabo'=>"valider"
                ]);
        }
        elseif ($role =='respEcole') {
            $dossier->update([
                'avisResponsableDoctorat'=>"valider"
                ]);
        }
        elseif ($role =='dgEDMI') {
            $dossier->update([
                'avisDirecteurDeEcoleDoctorale'=>"valider"
                ]);
        }

        return redirect()->route("enseignant.showCandidats")->with('success',"Validation effectuer avec succes");

    }
    public function refuserDGPostulat($role,$slug)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        if($role =='chefEcole')
        {
            $dossier->update([
            'avischefRatachement'=>"refuser",
            "status"=>"refuser"

            ]);
        }
        elseif ($role =='dgLabo') {
            $dossier->update([
                'avisDirecteurDeLabo'=>"refuser",
                "status"=>"refuser"
                ]);
        }
        elseif ($role =='respEcole') {
            $dossier->update([
                'avisResponsableDoctorat'=>"refuser",
                "status"=>"refuser"

                ]);
        }
        elseif ($role =='dgEDMI') {
            $dossier->update([
                'avisDirecteurDeEcoleDoctorale'=>"refuser",
                "status"=>"refuser"

                ]);
        }

        return redirect()->route("enseignant.showCandidats")->with('success',"refus effectuer avec succes");

    }
    public function cspShowCandidats()
    {
        $dossier = DossierAdmission::where("postuler","yes")->where("status","attente")->get()->all();
        $candidats = [];
        $i=0;
        foreach ($dossier as $doc) {
            if($doc->avischefRatachement == "valider" && $doc->avisDirecteurDeLabo== 'valider' && $doc->avisResponsableDoctorat == "valider" && $doc->avisDirecteurDeEcoleDoctorale == "valider") 
            {
                $candidats[$i] = $doc->etudiant()->get()->first() ; 
                $i++;
            }
        }
        return view("enseignant.showCSPCandidat",["candidats"=>$candidats]);
    }
    public function viewCSPDocsEleve($slug)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        return view("enseignant.viewCSPDocsEtudiant",["dossier"=>$dossier,"etudiant"=>$etudiant]);
    }
    public function confirmerCSPPostulat($slug)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        $dossier->update([
            "status"=>"valider"
        ]);
        return redirect()->route("enseignant.CSP.showCandidats")->with('success',"refus effectuer avec succes");
    }
    public function refuserCSPPostulat($slug)
    {
        $etudiant = User::where("slug",$slug)->get()->first()->userable;
        $dossier = $etudiant->DossierAdmission()->where("status","attente")->get()->first();
        $dossier->update([
            "status"=>"refuser"
        ]);
        return redirect()->route("enseignant.CSP.showCandidats")->with('success',"refus effectuer avec succes");

    }
}