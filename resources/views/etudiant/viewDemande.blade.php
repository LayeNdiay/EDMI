@extends('layouts.app')
@section('content')
<div class=" grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Récapitulatif</h4>
        <p class="card-description">
          @if ($dossier->postuler == 'no')
            Vous povez revenir n'importe quand <br>
            Cliquer sur upload piece de jointe pour completer votre dossier 
          @endif
        </p>
        <div class="table-responsive">
          <table class="table">
           
            <tbody>
              <tr>
                <td>Prenom</td>
                <td>{{Auth::user()->prenom}}</td>
              </tr>
              <tr>
                <td>Nom</td>
                <td>{{Auth::user()->name}}</td>
               
              </tr>
              <tr>
                <td>Adresse Domicile</td>
                <td>{{Auth::user()->userable->adresse}}</td>
            
              </tr>
              <tr>
                <td>Telephone</td>
                <td>{{Auth::user()->userable->telephone}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{Auth::user()->email}}</td>
              </tr>
              <tr>
                <td>Diplôme d'accès</td>
                <td>{{$cursus->diplomeAccess}}</td>
              </tr>
              <tr>
                <td>Spécialité</td>
                <td>{{$cursus->specialite}}</td>
               
              </tr>
              <tr>
                <td>Université de délivrance</td>
                <td>{{$cursus->universite}}</td>
            
              </tr>
              <tr>
                <td>date de délivrance</td>
                <td>{{$cursus->date}}</td>
              </tr>
              <tr>
                <td>Lieu d'obtention</td>
                <td>{{$cursus->lieu}}</td>
              </tr>
              <tr>
                <td>Pays</td>
                <td>{{$cursus->pays}}</td>
               </tr>
               <tr>
                <td>Intitulé du doctorat</td>
                <td>{{$doctorat->intituleDoctorat}}</td>
              </tr>
              <tr>
                <td>Ecole doctorale</td>
                <td>{{$ecole->name}}</td>
               
              </tr>
              <tr>
                <td>Etablissement d'accueil</td>
                <td>{{$etablissement->name}}</td>


            
              </tr>
              <tr>
                <td>Laboratoire d'accueil</td>
                <td>{{$labo->name}}</td>
              </tr>
              <tr>
                <td>Sujet de thèse</td>
                <td>{{$doctorat->sujet}}</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
      
          <a class="btn btn-light" href="{{ route('etudiant.showEdit',['id'=>$dossier->id])}}">Modifier </a>
     
          @if ($dossier->postuler == 'no')
              
          <a class="btn btn-primary mr-3" href="{{ route('etudiant.showPJ',['id'=>$dossier->id])}}">Upload Piece de jointe </a>
          @endif


        </div>
      </div>
    </div>
  </div>


  
  @endsection
  
  
  {{-- <style type="text/css">
  
      
      .section{
          padding: 20px;
          padding-bottom: 50px;
          width = 50%; margin: 50px 15%;
          border: solid 1px #000;
      }
      
      .left{
          float: left;
      }
      span{
          width: 40%;
      }
      
      h1{
          text-align: center;
          font-size: 25px;
      }
      h2{
          text-align: center;
          margin-top: 10px;
      }
      body{
          padding: 0;
          margin: 0;
          font-family: 'Arial';
      }
  </style>
  <div>
      <div class="section s1">
          <h2>Identification du candidat</h2>
          <div><span class="left">Nom :</span><span>{{Auth::user()->name}}</span></div>
          <div><span class="left">Prénom :</span><span>{{Auth::user()->prenom}}</span></div>
          <div><span class="left">Nom d'épouse :</span><span>{{Auth::user()->userable->nomEpoux}}</span></div>
          <div><span class="left">Adresse domicile :</span><span>{{Auth::user()->userable->adresse}}</span></div>
          <div><span class="left">Téléphone :</span><span>{{Auth::user()->userable->telephone}}</span></div>
          <div><span class="left">Email :</span><span>{{Auth::user()->email}}</span></div>
      </div>
      <div class="section s2">
          <h2>Cursus universitaire du candidat</h2>
          <div><span class="left">Diplôme d'accés :</span><span>{{$cursus->diplomeAccess}}</span></div>
          <div><span class="left">Spécialité :</span><span>{{$cursus->specialite}}</span></div>
          <div><span class="left">Université ayant délivré le diplôme :</span><span>{{$cursus->universite}}</span></div>
          <div><span class="left">Lieu et date d'obtention du diplôme :</span><span>{{$cursus->lieu .'  '. $cursus->date}}</span></div>
          <div><span class="left">Mention :</span><span>Bien</span></div>
      </div>
      <div class="section s3">
          <h2>Doctorat auquel le candidat demande son admission</h2>
          <div><span class="left">Intitulé du Doctorat :</span><span> {{$doctorat->intituleDoctorat}} </span></div>
          <div><span class="left">Etablissemnt de rattachement du Doctorat :</span><span>{{$ecole->name}}</span></div>
          <div><span class="left">Ecole doctorale :</span><span>{{$doctorat->ecoleDoctorat}}</span></div>
          <div><span class="left">Intitulé du laboratoire d'accueil :</span><span> {{$doctorat->intituleLaboratoire}} </span></div>
          <div><span class="left">Adresse du laboratoire d'accueil :</span><span>{{$doctorat->adresseLaboratoire}}</span></div>
          <div><span class="left">Sujet de thèse :</span><span style="float: left;" > {{$doctorat->sujet}} <span></div>
      </div>
   
  </div>
  <a class="btn btn-primary" href="{{ route('etudiant.showEdit',['id'=>$dossier->id])}}">Modifier </a> --}}
