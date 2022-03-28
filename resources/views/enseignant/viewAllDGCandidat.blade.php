@extends('layouts.app')
@section('content')

<div class=" grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Candidats</h4>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table">
           <thead>
               <tr>
                   <td>PRENOM</td>
                   <td>NOM</td>
    
               </tr>
           </thead>
            <tbody>
                <!--For each new candidate-->
                @foreach ($candidats as $candidat)
                <tr>
                  <td>{{$candidat->user->prenom}}</td>
                  <td>{{$candidat->user->name}}</td>
                      <td><a href="{{route('enseignant.viewDGDocsEleve',['slug'=>$candidat->user->slug,'role'=>$role])}}" class="btn btn-primary mr-2">Consulter</a></td>
                </tr> 
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</div>
</div>
@endsection