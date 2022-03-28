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
                                        <th class="col-sm-2" >sujet </th>
                                        <th class="col-sm-4" >Description</th>
                                        <th class="col-sm-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                            </tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td> {{$post->sujet}}</td>
                                        <td>{{$post->description}}</td>
                                        <td>{{$post->status}}</td>
                                        @if ($post->status == "ouvert")
                                        <form action="{{ route('enseignant.fermerPost',['id'=>$post->id]) }}" method="POST">
                                            @csrf
                                            <td><button type="submit" class="btn btn-primary mr-2">Fermer</button></td>
                                        </form>
                                    @endif
                                        <td><a class="btn btn-primary mr-2" href="{{route('enseignant.viewOnePost',['id'=>$post->id])}}">Consulter</a></td>
                                    
                                    </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>




@endsection
{{-- <div class="container">
    @if (!empty($success))
        <div class="alert alert-success"> {{ $success }}</div>
    @endif
    <div class=" grid-margin stretch-card">
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

                @foreach ($posts as $post)
                    <tr>
                        <td> {{$post->sujet}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->status}}</td>
                        @if ($post->status == "ouvert")
                            <form action="{{ route('enseignant.fermerPost',['id'=>$post->id]) }}" method="POST">
                                @csrf
                                <td><button type="submit" class="btn btn-primary mr-2">Fermer</button></td>
                            </form>
                        @endif
                        <td><a class="btn btn-primary mr-2" href="{{route('enseignant.viewOnePost',['id'=>$post->id])}}">Consulter</a></td>
                    </tr> 
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div> --}}

    {{-- @foreach ($posts as $post)
        
        <div class="row">
            <div class="row col-mt-4">
                <div class="col-md-4">
                    <a href="{{route('enseignant.viewOnePost',['id'=>$post->id])}}">Sujet</a>
                </div>
                <div class="col-md-6">{{$post->sujet}}</div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-4">Description</div>
            <div class="col-md-6">{{$post->description}}</div>
        </div>  
        <div class="row">
            <div class="col-md-4">status</div>
            <div class="col-md-6">{{$post->status}}</div>
            @if ($post->status == "ouvert")
                <form action="{{ route('enseignant.fermerPost',['id'=>$post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary mr-2">fermer</button>
                </form>
            @endif
            
        </div> 
    @endforeach --}}