@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sujet</h4>
          <blockquote class="blockquote">
            <p class="mb-0"> {{$post->sujet}} </p>
          </blockquote>
        </div>
        <div class="card-body">
          <h5>Description</h5>
          <blockquote class="blockquote blockquote-primary">
            <p> {{$post->description}}  </p>
            <footer class="blockquote-footer">Proposé par <cite title="Source Title"> {{$enseignant->user->prenom . '  ' .$enseignant->user->name  }} </cite></footer>
          </blockquote>
        </div>
      </div>
    </div>
</div>
@endsection

