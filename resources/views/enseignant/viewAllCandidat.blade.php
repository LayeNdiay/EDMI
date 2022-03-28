@extends('layouts.app')
@section('content')
<style type="text/css">

  table {
      table-layout: fixed;
      word-wrap: break-word;
  }

      table th, table td {
          overflow: hidden;
      }

</style>
<div class="row  d-flex " >
          <div class=" grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Candidat</h4>
                      <p class="card-description"> </p>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th class="col-sm-4" >Prenom </th>
                                      <th class="col-sm-4" >Nom</th>
                                      <th class="col-sm-2">Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                          </tbody>
                          @foreach ($candidats as $key => $candidat)

                                  <tr>
                                    <td>{{$candidat->user->prenom}}</td>
                                    <td>{{$candidat->user->name}}</td>
                                      @if ($validation[$key]->avisDirecteurDeThese == "valider")
                                      <td><label class="badge badge-success">validé</label></td>
                                          
                                      @endif
                                      @if ( $validation[$key]->avisDirecteurDeThese == "attente") 
                                      <td><label class="badge badge-warning">attente</label></td>
                                        <td><a href="{{route('enseignant.viewDocsEleve',['slug'=>$candidat->user->slug])}}" class="btn btn-primary mr-2">Consulter</a></td>
                                      
                                      @endif
                                      @if ( $validation[$key]->avisDirecteurDeThese == "refuser")
                                      <td><label class="badge badge-danger">Refusé</label></td>
                                          
                                      @endif
                                  </tr>
                              @endforeach
                              
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
</div>


{{-- <div class=" grid-margin stretch-card">
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
                   <td>Status</td>
    
               </tr>
           </thead>
            <tbody>
                <!--For each new candidate-->
                @foreach ($candidats as $candidat)
                <tr>
                  <td>{{$candidat->user->prenom}}</td>
                  <td>{{$candidat->user->name}}</td>
                  <td>{{$validation}}</td>
                  @if ($validation == "attente")
                      
                  <td><a href="{{route('enseignant.viewDocsEleve',['slug'=>$candidat->user->slug])}}" class="btn btn-primary mr-2">Consulter</a></td>
                  @endif
                </tr> 
                @endforeach
            </tbody>
          </table>
    </div>
</div>
</div>
</div> --}}
@endsection