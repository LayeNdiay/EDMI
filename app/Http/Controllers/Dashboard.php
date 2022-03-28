<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DossierAdmission;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        if (Auth()->user()->role === 'admin') {

            return redirect()->route('adminDashboard');
        }
        else if (Auth()->user()->role === 'enseignant') {

            return redirect()->route('enseignant.dashboard');
        }
        $dossier = DossierAdmission::where("etudiant_id",Auth::user()->userable->id)->where('postuler','yes')->get()->first();
        
        $cmp=0;
        if($dossier!=null)
        {

            if($dossier->avisDirecteurDeThese=="valider")
            {
                $cmp++;
            }
            if($dossier->avisDirecteurDeLabo=="valider")
            {
                $cmp++;
            }
            if($dossier->avisDirecteurDeEcoleDoctorale=="valider")
            {
                $cmp++;
            }
            if($dossier->avisResponsableDoctorat=="valider")
            {
                $cmp++;
            }
            if($dossier->avischefRatachement=="valider")
            {
                $cmp++;
            }
        }
        $pourcentage = ceil(($cmp*100)/5)  ;
        if($dossier == null)
        {
            return view('message',["message"=>'']);
        }
        $doctorat = $dossier->doctorat()->get()->first();
        if($doctorat==null)
        { 
            return view('message',["message"=>'']);
        }
        return view("dashboard",["pourcentage"=>$pourcentage,'dossier'=>$dossier]);
    }
}