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

        
<div class="   grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sujets</h4>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table">
           <thead>
               <tr>
                   <td  >Sujet</td>
                   <td >Description</td>
                   <td>Enseignant </td>
               </tr>
           </thead>
            <tbody>
                @foreach ($posts as $post)
                <!--For each subject-->
                    <tr>
                        <td>
                                {{$post->sujet}}
                        </td>
                        <td >
                                {{$post->description}}
                        </td>

                        <td> 
                            {{$post->enseignant()->get()->first()->user->prenom . ' '.$post->enseignant()->get()->first()->user->name }}
                     </td>
                        @auth
                            @if (Auth::user()->role == "etudiant")
                                <div class="my-4 ">
                                    {{-- <a class="btn btn-primary " href="{{ route('etudiant.CVpostulerAppel',['id'=>$post->id])}}">postuler sur un appel d'offre </a> --}}
                                    <td><a class="btn btn-primary mr-2" href="{{ route('etudiant.CVpostulerAppel',['id'=>$post->id])}}">Postuler</a></td>
                                </div>  
                            @endif
                            @endauth
                            @guest
                                
                            <td><a class="btn btn-primary mr-2" href="{{ route('etudiant.showOneOffre',['id'=>$post->id])}}">Visualiser</a></td>
                            @endguest
                    </tr> 
                @endforeach
            </tbody>
          </table>
    </div>    
</div>
</div>
</div>

@endsection