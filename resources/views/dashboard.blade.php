@extends('layouts.app')
@section('content')
  @if (!empty($success))
  <div class="alert alert-success"> {{ $success }}</div>
  @endif

<div class=" grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Dossier de demande d'admission <p>Déposé le {{$dossier->created_at}}</p></h4>
        <p class="card-description">
          @if ($dossier->status == "valider")
            @if ($dossier->certificat()->get()->first()==null)
              <a href=" {{route('etudiant.showcertificat',['id'=>$dossier->id])}} ">Compléter mon inscription avec l'upload du mon certifcat d'inscription</a>
            @endif
        @endif
        </p>
        <div class="card-body">
          <h4 class="card-title">Sujet de thèse</h4>
          <blockquote class="blockquote">
            <p class="mb-0">{{$dossier->doctorat()->get()->first()->sujet}}</p>
          </blockquote>
        </div>
      
        <div class="table-responsive">
          
          <table class="table">
            <tbody>
          
               
               <tr>
                <td>Evolution:
                    <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$pourcentage}}%" aria-valuenow="{{$pourcentage}}" aria-valuemin="0" aria-valuemax="{{$pourcentage}}"></div>
                  </div>
                </td>
                <td> {{$pourcentage}} %</td>
                @if ($dossier->status == "attente")
                    
                <td><button class="badge badge-warning mr-2">{{$dossier->status}}</button></td>
                @endif
                @if ($dossier->status == "refuser")
                  <td><button class="badge badge-danger mr-2">{{$dossier->status}}</button></td>
                @endif
                @if ($dossier->status == "valider")
                  <td><button class="badge badge-success mr-2">{{$dossier->status}}</button></td>
              @endif
              </tr> 
              
            </tbody>
          </table>
          @if ($dossier->certificat()->get()->first()!=null)          
            <h3>Vous etes désormais inscrit </h3>
          @endif
    </div>
 
          </div>
          @if ($dossier->avisDirecteurDeThese=="valider")
              
          <li>Validé par le directeur de thèse</li>
          @endif
          @if ($dossier->avisDirecteurDeLabo=="valider")
              
          <li>Validé par le directeur de Labo</li>
          @endif
          @if ($dossier->avisDirecteurDeEcoleDoctorale=="valider")
          <li>Validé par le directeur de l'ecole doctorale</li>
              
          @endif
          @if ($dossier->avisResponsableDoctorat=="valider")
          <li>Validé par le directeur de l'ecole de rattachement</li>
              
          @endif
          @if ($dossier->avischefRatachement=="valider")
              
          <li>Validé par le chef de l'ecole de rattachement</li>
          @endif
          @if ($pourcentage == 100 &&  $dossier->status != "valider")
              <tr>
                <td class="text-danger">En attente de validation du conseil scientifique</td>
              </tr>
            @endif
         </ul>
    </div>
    
</div>
</div>
</div>

@endsection
