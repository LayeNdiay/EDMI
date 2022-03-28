@extends('layouts.app')
@section('content')
    @if (!empty($etudiants))
    <div class=" grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste des étudiants autorisés à s'inscrire dans votre Etablissement</h4>
            <p class="card-description">
            </p>
            <div class="table-responsive">
              <table class="table">
               <thead>
                   <tr>
                       <td>PRENOM</td>
                       <td>NOM</td>
                       <td>Directeur de thése</td>
                       <td>Laboratoire</td>
        
                   </tr>
               </thead>
                <tbody>
                    <!--For each new candidate-->
                    @foreach ($etudiants as $candidat)
                    <tr>
                      <td>{{$candidat->user->prenom}}</td>
                      <td>{{$candidat->user->name}}</td>
                      <td>{{$candidat->dg}}</td>
                      <td>{{$candidat->labo}}</td>
                        
                    </tr> 
                    @endforeach
                </tbody>
              </table>
        </div>
        <a href="{{route('enseignant.download')}}">Télécharger sous fomat PDF</a>
        
    </div>
    </div>
    </div>
    @endif
@endsection
