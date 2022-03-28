@extends('layouts.app')
@section('content')
@if (!empty($success))
<div class="alert alert-success"> {{ $success }}</div>
@endif

<div class="row">
    <div class="col-md-8 offset-md-2 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sujet</h4>
          <blockquote class="blockquote">
            <p class="mb-0"> {{$post->sujet}}</p>
          </blockquote>
        </div>
        <div class="card-body">
          <h5>Description</h5>
          <blockquote class="blockquote blockquote-primary">
            <p>{{$post->description}}</p>
            {{-- <footer class="blockquote-footer">Proposé par <cite title="Source Title">Pr Alhassane BA</cite></footer> --}}
          </blockquote>
        </div>
        <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <td  >Prenom</td>
                <td>Nom </td>
            </tr>
        </thead>
         <tbody>
                @foreach ($etudiants as $i => $etudiant)
                <tr>
                    <td>{{$etudiant->user->prenom}}</td> 
                    <td>{{$etudiant->user->name}}</td>
                        @if (isset($role))
                            <td><a href="{{route('enseignant.confirmerDGPostulat',['slug'=>$candidat->user->slug,'role'=>$role])}}" class="btn btn-primary mr-2">confirmer</a></td>
                        @else
                            @if ($candidats[$i]->conf)
                            <td>
                                
                                <a class="btn btn-primary mr-2" href="{{ route('enseignant.viewEtudiant',['idEtudiant'=>$etudiant->id,'idCandidat'=>$candidats[$i]->id]) }}">
                                    consulter
                                </a>
                            </td>
                            @endif
                        @endif
                
                    </tr>
            @endforeach
         </tbody>
        </table>
        </div>
      </div>
    </div>
</div>

@endsection
{{-- 

<div class=" grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sujet</h4>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table">
           <thead>
               <tr>
                   <td>{{$post->sujet}}</td>
                   <td>{{$post->description}}</td>
               </tr>
           </thead>
            <tbody>

                @foreach ($etudiants as $i => $etudiant)

                    <tr>
                        <td>{{$etudiant->user->prenom}}</td> 
                        <td>{{$etudiant->user->name}}</td>
                            @if (isset($role))
                                <td><a href="{{route('enseignant.confirmerDGPostulat',['slug'=>$candidat->user->slug,'role'=>$role])}}" class="btn btn-primary mr-2">confirmer</a></td>
                            @else
                                @if ($candidats[$i]->conf)
                                <td>
                                    
                                    <a class="btn btn-primary mr-2" href="{{ route('enseignant.viewEtudiant',['idEtudiant'=>$etudiant->id,'idCandidat'=>$candidats[$i]->id]) }}">
                                        consulter
                                    </a>
                                </td>
                                @endif
                            @endif
                       
                        </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</div>
</div> --}}
{{-- <div class="container">

    <div class="row">
        <div class="col-md-4">Sujet</div>
        <div class="col-md-6">{{$post->sujet}}</div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">Description</div>
        <div class="col-md-6">{{$post->description}}</div>
    </div>
    @foreach ($etudiants as $i => $etudiant)
        
        <div class="row mt-4">
            
            <div class="col-md-4">  
                <a  href="{{ route('enseignant.viewEtudiant',['idEtudiant'=>$etudiant->id,'idCandidat'=>$candidats[$i]->id]) }}">
                    {{$etudiant->user->prenom}} {{$etudiant->user->name}} 
                </a>
             </div>
            @if ($conf)
            <form action="{{ route('enseignant.confirmerEtudiant',['id'=>$candidats[$i]->id ]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary mr-2">valider</button>
            </form>
            @endif
        </div>  
    @endforeach
    
</div> --}}