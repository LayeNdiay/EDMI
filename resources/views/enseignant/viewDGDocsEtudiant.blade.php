@extends('layouts.app')
@section('content')
<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Etudiant</h4>
      <p class="card-description">
      </p>
      <div class="table-responsive">
        <table class="table">
         
          <tbody>
            <tr>
              <td>Prenom</td>
              <td>{{$etudiant->user->prenom}}</td>
            </tr>
            <tr>
              <td>Nom</td>
              <td>{{$etudiant->user->name}}</td>
             
            </tr>
            <tr>
              <td>Adresse Domicile</td>
              <td>{{$etudiant->adresse}}</td>
          
            </tr>
            <tr>
              <td>Email</td>
              <td>{{$etudiant->user->email}}</td>
            </tr>
            <tr>
              <td>Telephone</td>
              <td>{{$etudiant->telephone}}</td>
             </tr>
             <tr>
              <td><a href="{{ Storage::url($dossier->pieceAFournir()->get()->first()->cv )}}"><img src="{{asset('images/CV.png')}}"/></a>
                <span>Curriculum Vitae</span>
              <a   href="{{ Storage::url($dossier->pieceAFournir()->get()->first()->projetDeThese )}}"><img class="offset-md-2" src="{{asset('images/thesis.png')}}"/></a>
                <span>Projet de thèse</span></td>
              <td>
                <a href="{{ Storage::url($dossier->pieceAFournir()->get()->first()->AttestationDeBourse )}}"><img class="offset-md-2"  src="{{asset('images/scholarship.png')}}"/></a>
                <span>Attestation de bourse</span>
              </td>
            </tr>
            <tr>
              @foreach ($dossier->pieceAFournir()->get()->first()->diplomeObetenu()->get()->all() as $pj )
              <td>
                <a href="{{ Storage::url($pj->fichier )}}"><img src="{{asset('images/graduated.png')}}"/></a>
                  <span>{{$pj->name}}</span>
              </td> 
            @endforeach
            </tr>
            <form action="{{route('enseignant.confirmerDGPostulat',['slug'=>$etudiant->user->slug,'role'=>$role])}}" method="POST">
              @csrf
              <td><input type="submit"  value="valider" class="btn btn-primary mr-2"></td>
            </form>
            <form action="{{route('enseignant.refuserDGPostulat',['slug'=>$etudiant->user->slug,'role'=>$role])}}" method="POST">
              @csrf
              <td><input type="submit"  value="refuser" class="btn btn-primary mr-2"></td>
            </form>
          </tbody>
        </table>

   
      </div>
    </div>
  </div>
</div>
@endsection

{{-- <div class="grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Etudiant</h4>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table">
           
            <tbody>
              <tr>
                <td>Prenom</td>
                <td>{{$etudiant->user->prenom}}</td>
              </tr>
              <tr>
                <td>Nom</td>
                <td>{{$etudiant->user->name}}</td>
               
              </tr>
              <tr>
                <td>Adresse Domicile</td>
                <td>{{$etudiant->adresse}}</td>
            
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$etudiant->user->email}}</td>
              </tr>
              <tr>
                <td>Telephone ea</td>
                <td>{{$etudiant->telephone}}</td>
               </tr>
               <tr>
                    <td><a href="{{ Storage::url($dossier->pieceAFournir()->get()->first()->cv )}}"><button type="submit" class="btn btn-primary mr-2">Consulter CV</button></a></td>
              </tr>
              <tr>
                <td><a href="{{ Storage::url($dossier->pieceAFournir()->get()->first()->projetDeThese )}}"><button type="submit" class="btn btn-primary mr-2">Consulter projet de these</button></a></td>
             </tr>
             <tr>
                <td><a href="{{ Storage::url($dossier->pieceAFournir()->get()->first()->AttestationDeBourse )}}"><button type="submit" class="btn btn-primary mr-2">Consulter attestation de bourse</button></a></td>
            </tr>
         
            @foreach ($dossier->pieceAFournir()->get()->first()->diplomeObetenu()->get()->all() as $pj )
                <tr>
                  <td><a href="{{ Storage::url($pj->fichier )}}"><button type="submit" class="btn btn-primary mr-2">{{$pj->name}}</button></a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <form action="{{route('enseignant.confirmerDGPostulat',['slug'=>$etudiant->user->slug,'role'=>$role])}}" method="POST">
            @csrf
            <td><input type="submit"  value="valider" class="btn btn-primary mr-2"></td>
          </form>
          <form action="{{route('enseignant.refuserDGPostulat',['slug'=>$etudiant->user->slug,'role'=>$role])}}" method="POST">
            @csrf
            <td><input type="submit"  value="refuser" class="btn btn-primary mr-2"></td>
          </form>
        </div>
      </div>
    </div>
  </div> --}}