@extends('layouts.app')
@section('content')


<div class=" col-md-9 offset-md-3 grid-margin stretch-card">
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
              <td><a href="{{ Storage::url($candidat->cv )}}"><img class="offset-md-5" src="{{asset('images/CV.png')}}"/></a>
                <span>Curriculum Vitae</span></td>
            </tr>
            <tr>
              @if ($candidat->confirmationEnseignant == 'attente')
                    
              <form action="{{ route('enseignant.confirmerEtudiant',['id'=>$candidat->id ]) }}" method="POST">
                  @csrf
                  <td><button type="submit" class="btn btn-primary mr-2">valider</button></td>
              </form>
              @endif
              <td><button class="btn btn-primary "> Rejeter</button></td>
            </tr>
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
                <td>Telephone</td>
                <td>{{$etudiant->telephone}}</td>
               </tr>
               <tr>
                <td><a href="{{ Storage::url($candidat->cv )}}"><button type="submit" class="btn btn-primary mr-2">Consulter CV</button></a></td>
              </tr>
              <tr>
                @if ($candidat->confirmationEnseignant == 'attente')
                    
                <form action="{{ route('enseignant.confirmerEtudiant',['id'=>$candidat->id ]) }}" method="POST">
                    @csrf
                    <td><button type="submit" class="btn btn-primary mr-2">valider</button></td>
                </form>
                @endif
              </tr>
            </tbody>
          </table>

     
        </div>
      </div>
    </div>
  </div> --}}

{{-- 
<div class="row">
    <div class="col-md-4">prenom</div>
    <div class="col">{{$etudiant->user->prenom}}</div>
</div>
<div class="row">
    <div class="col-md-4">Nom</div>
    <div class="col">{{$etudiant->user->name}}</div>
</div>
<div class="row">
    <div class="col-md-4">addresse</div>
    <div class="col">{{$etudiant->adresse}}</div>
</div>
<div class="row">
    <div class="col-md-4">email</div>
    <div class="col">{{$etudiant->user->email}}</div>
</div>

<div class="row">
    <div class="col-md-4">Nom épouse</div>
    <div class="col">{{$etudiant->user->nomEpoux}}</div>
</div>

<div class="row">
    <div class="col-md-4">Telephone</div>
    <div class="col">{{$etudiant->telephone}}</div>
</div>
<a href="{{ Storage::url($candidat->cv )}}">Voir le  cv</a> --}}