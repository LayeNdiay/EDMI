<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\emailPassword;
use App\Models\Enseignant;
use App\Models\Specialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EspaceController extends Controller
{
    public function index()
    {
        return view("admin-dashboard");
    }
    public function showFromulaireEnseignant()
    {
        return view("admin.createEnseignant");
    }
    public function storeEnseignant(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','min:2'], 
            'specialite' => ['required','max:12'], 
            'prenom' => ['required', 'string', 'max:255','min:2'], 
            'grade' => ['required', 'string', 'max:255','min:1'], 
            'matricule' => [ 'string', 'max:255','min:2','unique:enseignants'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $password = Str::random(5). rand(10000, 99999 );
        $user = new  User([
            'name' => $request->name,
            'email' => $request->email,
            'role'=>"enseignant",
            'prenom'=>$request->prenom,
            'slug'=>$this->slugify($request->name . '-'. $request->prenom . time()),
            'password' => Hash::make($password),
            'email_verified_at'=>now()
        ]);
        $enseignant = Enseignant::create([
            "role"=>"directeur de these",
            "matricule"=>$request->matricule,
            "grade"=>$request->grade,
        ]);
        foreach ($request->specialite as $specia) {
            Specialite::create([
                "name"=>$specia,
                "enseignant_id"=>$enseignant->id
            ]);
        }
        $enseignant->user()->save($user);
        Mail::to($user->email)->send(new emailPassword($user,$password));
        return view("admin.createEnseignant")->with("success","Compte Enseignant créer avec succés");
    }
    
}
