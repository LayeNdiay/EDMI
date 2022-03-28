<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Admin\EspaceController;
use App\Http\Controllers\Admin\Etablissement;
use App\Http\Controllers\Admin\Laboratoire;
use App\Http\Controllers\Enseignant\EspaceEnseignantController;
use App\Http\Controllers\Enseignant\theseController;
use App\Http\Controllers\Etudiant\Demande;
use App\Http\Controllers\Etudiant\PostulerTheseEnseignantController;



Route::get('/', function () {
    return view('welcome');
});  



Route::get('/liste-etudiants-autorisées-inscrit',[EspaceEnseignantController::class,'showListeAuto'])->name("enseignant.voirListAuto");
Route::get('/liste-etudiants-inscrit',[EspaceEnseignantController::class,'showListeInscrit'])->name("enseignant.listInscrit");
Route::get('/voir-les-appels-offres',[PostulerTheseEnseignantController::class,'showAllOffres'])->name('etudiant.showAllOffre');
Route::get('/appel-offres/{id}',[PostulerTheseEnseignantController::class,'showOneOffre'])->name('etudiant.showOneOffre');




Route::get('/dashboard',[Dashboard::class,'index'])->name('dashboard')->middleware(["auth",'verified']);

Route::middleware(["auth",'role:etudiant'])->group(function(){
    Route::get('/demande-admission',[Demande::class,'show'])->name('etudiant.showDemande');
    Route::get('/demande-admission/voir/{id}',[Demande::class,'view'])->name('etudiant.viewDemande');
    Route::post('/demande-admission',[Demande::class,'create'])->name('etudiant.createDemande');
    
    Route::get('/demande-admission/edit/{id}',[Demande::class,'showEdit'])->name('etudiant.showEdit');
    Route::post('/demande-admission/edit/{id}',[Demande::class,'storeDemande'])->name('etudiant.storeDemande');
 
    Route::get('/demande-admission/PJ/{id}',[Demande::class,'showPJ'])->name('etudiant.showPJ');
    Route::post('/demande-admission/PJ/{id}',[Demande::class,'storePJ'])->name('etudiant.storePJ');

    Route::get('/dossier/upload/{id}',[Demande::class,'showCertificat'])->name('etudiant.showcertificat');
    Route::post('/dossier/upload/{id}',[Demande::class,'storeCertificat'])->name('etudiant.storeCertificat');


    Route::get('/voir-les-appels-offres/mesPost',[PostulerTheseEnseignantController::class,'showMyPostulat'])->name('etudiant.showMyPostulat');

    Route::get('/postuler-appple-cv/{id}',[PostulerTheseEnseignantController::class,'CVpostulerAppel'])->name('etudiant.CVpostulerAppel');
    Route::post('/postuler-appple-cv/{id}',[PostulerTheseEnseignantController::class,'storePostulerAppel'])->name('etudiant.storePostulerAppel');
    Route::post('/confirmer/postuler-appple-cv/{id}',[PostulerTheseEnseignantController::class,'confirmerPostulat'])->name('etudiant.confirmerPostulat');
});


Route::middleware(["auth",'role:admin'])->group(function(){
    Route::get('/dashboard-admin',[EspaceController::class,'index'])->name('adminDashboard');
    Route::get('/creer-enseignant',[EspaceController::class,'showFromulaireEnseignant'])->name('enseignant.create');
    Route::post('/creer-enseignant',[EspaceController::class,'storeEnseignant'])->name('enseignant.store');
    Route::get('/creer-laboratoire',[Laboratoire::class,'show'])->name('laboratoire.show');
    Route::post('/creer-laboratoire',[Laboratoire::class,'create'])->name('laboratoire.create');
    Route::get('/creer-Etablissement',[Etablissement::class,'show'])->name('Etablissement.show');
    Route::post('/creer-Etablissement',[Etablissement::class,'create'])->name('Etablissement.create');
   
});



Route::middleware(["auth",'role:enseignant'])->group(function(){
    Route::get('/dashboard-enseignant',[EspaceEnseignantController::class,'index'])->name('enseignant.dashboard');
    Route::get('/directeur-de-these/candidatures',[theseController::class,'showCandidats'])->name('enseignant.showCandidats');

    Route::get('/postuler-sujet-these',[theseController::class,'showPostuler'])->name('enseignant.show-Post');
    Route::post('/postuler-sujet-these',[theseController::class,'storePost'])->name('enseignant.storePost');

    Route::get('/csp/candidatures',[theseController::class,'cspShowCandidats'])->name('enseignant.CSP.showCandidats');
    Route::get('/directeur-de-these/voir-docs-candidature/{slug}',[theseController::class,'viewDocsEleve'])->name('enseignant.viewDocsEleve');
    Route::get('/directeur-de-these/voir-docs-candidature/CSP/{slug}',[theseController::class,'viewCSPDocsEleve'])->name('enseignant.CSP.viewDocsEleve');


    Route::get('/liste-des-etudiants-auto-inscrits',[EspaceEnseignantController::class,'download'])->name("enseignant.download");
    Route::get('/liste-des-etudiants-inscrits',[EspaceEnseignantController::class,'downloadListe'])->name("enseignant.downloadListe");


    Route::get('/directeur-de-these/confirmation/{slug}',[theseController::class,'validerEtudiant'])->name('enseignant.validerEtudiant');
    Route::post('/directeur-de-these/confirmation/{slug}',[theseController::class,'storeCharte'])->name('enseignant.storeCharte');
    Route::get('/directeure/confirmation/{slug}/{role}',[theseController::class,'viewDGDocsElev'])->name('enseignant.viewDGDocsEleve');
    
    Route::get('/voir-une-offre/{id}',[theseController::class,'viewOnePost'])->name('enseignant.viewOnePost');
    Route::get('/voir-mes-offres',[theseController::class,'viewAllPost'])->name('enseignant.viewAllPost');
    
    Route::post('/fermer/{id}',[theseController::class,'fermerPost'])->name('enseignant.fermerPost');
    
    Route::post('/confirmer/{id}',[theseController::class,'confirmerEtudiant'])->name('enseignant.confirmerEtudiant');
 
    Route::get('/voir-Etudiant/{idEtudiant}/{idCandidat}',[theseController::class,'viewEtudiant'])->name('enseignant.viewEtudiant');

    Route::post('/CSP/confirmer/{slug}',[theseController::class,'confirmerCSPPostulat'])->name('enseignant.CSP.confirmerPostulat');
    Route::post('/CSP/refuser/{slug}',[theseController::class,'refuserCSPPostulat'])->name('enseignant.CSP.refuserPostulat');

    Route::post('/DG/conf/{role}/{slug}',[theseController::class,'confirmerDGPostulat'])->name('enseignant.confirmerDGPostulat');
    Route::post('/DG/refuser/{role}/{slug}',[theseController::class,'refuserDGPostulat'])->name('enseignant.refuserDGPostulat');

}); 




require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
