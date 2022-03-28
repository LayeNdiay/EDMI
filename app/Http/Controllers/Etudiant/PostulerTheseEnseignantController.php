<?php

namespace App\Http\Controllers\Etudiant;

use Illuminate\Http\Request;
use App\Models\CandidatPostuler;
use App\Models\DossierAdmission;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Auth;
use App\Models\ProposerTheseEnseignant;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;

class PostulerTheseEnseignantController extends Controller
{
    //
    public function showAllOffres()
    {
        $posts = ProposerTheseEnseignant::all()->where('status',"ouvert");
        if ($posts==null) {
            
            return view("message",['message'=>"Il n'existe pas de post pour le moment"]);
        }   
        return view('etudiant.showAppelOffre',["posts"=>$posts]);
    }
    public function CVpostulerAppel(int $id)
    {
        $demande = Auth::user()->userable->DossierAdmission()->where('status','attente')->get()->all();
        if ($demande != null) {
            return view("message",['message'=>"Vous ne pouvez postuler sur un appel d'offre car vous avez déjà une entammer le processus de demande d'admission"]);
        }
        return view('etudiant.CVpostulerAppel',['id'=>$id]);
    }
    public function storePostulerAppel(Request $request, string $id)
    {
        $request->validate([
            'cv'=>['required',"max:3180"]
        ]);
        $path = Storage::put('cvPost',$request->cv);
        CandidatPostuler::create([
            'cv'=>$path, 
            "etudiant_id"=>Auth::user()->userable->id,
            "proposer_these_enseignant_id"=>$id,
        ]);
       return redirect()->route("etudiant.showMyPostulat")->with("success","Demande effectuer avec success ");
        
    }
    public function showMyPostulat()
    {
        $demande = Auth::user()->userable->DossierAdmission()->where('status','attente')->get()->all();
        $vue = true;
        if ($demande != null) {
           $vue = false;
        }
        $candidatPosts = Auth::user()->userable->candidatPostuler()->get()->all();
        $theses = [];
        foreach ($candidatPosts as $key => $post) {
            $theses[$key] = ProposerTheseEnseignant::where("id",$post->proposer_these_enseignant_id)->get()->first();
        }
         
        return view('etudiant.showMyPostulat',['candidatPosts'=>$candidatPosts,'theses'=>$theses,'vue'=>$vue]);
    }
    public function confirmerPostulat(int $id)
    {
        $candidatPosts = Auth::user()->userable->candidatPostuler()->get()->all();
        $these=null;
        foreach ($candidatPosts as  $postCat) {
            if($postCat->id==$id)
            {
                $postCat->update(["confirmationEtudiant"=>'valider','status'=>'valider']);
                $these = ProposerTheseEnseignant::where("id",$postCat->proposer_these_enseignant_id)->get()->first();
                $these->update(["status"=>'fermer']);
            }else{
                $postCat->update(["confirmationEtudiant"=>'refuser','status','refuser']);
                
            }
        }
         DossierAdmission::create([
            "etudiant_id"=>Auth::user()->userable->id,
            "enseignant_id"=>$these->enseignant_id
        ]);
        
       return redirect(RouteServiceProvider::HOME)->with("success","Vous etes maintenant autoriser à vous inscrire ");
    }
    public function showOneOffre($id)
    {
        $posts = ProposerTheseEnseignant::where("id",$id)->get()->first();
        $enseignant = Enseignant::where("id",$posts->enseignant_id)->get()->first();

        if ($posts==null) {
            
            return view("message",['message'=>"Il n'existe pas de post pour le moment"]);
        }   
        return view('etudiant.showOneAppelOffre',["post"=>$posts,'enseignant'=>$enseignant]);
    }
   

}
