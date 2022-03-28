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
                        <h4 class="card-title">Sujets</h4>
                        <p class="card-description">  </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-sm-4" >sujet </th>
                                        <th class="col-sm-4" >Description</th>
                                        <th class="col-sm-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </tbody>
                                 @foreach ($candidatPosts as $key =>$post)

                                    <tr>
                                        <td>{{$theses[$key]->sujet}}</td>
                                        <td>{{$theses[$key]->description}}</td>
                                        @if ( $post->confirmationEnseignant == "valider")
                                        <td><label class="badge badge-success">validé</label></td>
                                            @if ($vue)
                                            <form action="{{ route('etudiant.confirmerPostulat',['id'=>$post->id]) }}" method="POST">
                                                @csrf
                                                <td><button type="submit" class="btn btn-primary mr-2">Confirmer</button></td>
                                            </form>
                                            @endif
                                            
                                        @endif
                                        @if ( $post->confirmationEnseignant == "attente")
                                        <td><label class="badge badge-warning">attente</label></td>
                                        
                                        @endif
                                        @if ( $post->confirmationEnseignant == "refuser")
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
{{-- <div class="  grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sujets</h4>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table">
           <thead>
               <tr>
                <td>Sujet</td>
                <td>Description</td>
                <td>Statut</td>
               </tr>
           </thead>
            <tbody>

                <!--For each subject-->
                @foreach ($candidatPosts as $key =>$post)
                    <tr>

                        <td> {{$theses[$key]->sujet}}</td>
                        <td>{{$theses[$key]->description}}</td>
                        <td>{{$post->confirmationEnseignant}}</td>
                        @if ( $vue && $post->confirmationEnseignant == "valider")
                            <form action="{{ route('etudiant.confirmerPostulat',['id'=>$post->id]) }}" method="POST">
                                @csrf
                                <td><button type="submit" class="btn btn-primary mr-2">Confirmer</button></td>
                            </form>
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