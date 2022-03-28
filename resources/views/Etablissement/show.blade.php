@extends('layouts.app')
@section('content')
<div>
    @if (!empty($success))
    <div class="alert alert-success"> {{ $success }}</div>
    @endif
    <div class="alert alert-info">
        Formulaire de Création de Ecole de ratachement
    </div>
    <div class="card">

            <div class="card-body">
                <form method="POST" action="{{ route('Etablissement.create') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="nom" class="col-md-4 col-form-label text-md-end">nom de l'etablissement</label>

                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="name" autofocus>

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="adresse" class="col-md-4 col-form-label text-md-end">adresse</label>

                        <div class="col-md-6">
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required  autofocus>

                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="domaine" class="col-md-4 col-form-label text-md-end">Domaine</label>

                        <div class="col-md-6">
                            <input id="domaine" type="text" class="form-control @error('domaine') is-invalid @enderror" name="domaine" value="{{ old('domaine') }}" required  autofocus>

                            @error('domaine')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="enseignant" class="col-md-4 col-form-label text-md-end">Choix du responsable de la formation doctoral </label>
                        <div class="col-md-6">
                            <select id="enseignant" name="enseignant" class="form-control @error('enseignant') is-invalid @enderror"   required>
                               @foreach ($enseignant as  $etud)
                              
                                    <option value="{{$etud->id}}">{{$etud->user->prenom.' '.$etud->user->name }}</option>
                               @endforeach
                              </select>
                            @error('enseignant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dgecole" class="col-md-4 col-form-label text-md-end">Choix du directeur de l'établissement</label>
                        <div class="col-md-6">
                            <select id="dgecole" name="dgecole" class="form-control @error('dgecole') is-invalid @enderror"   required>
                               @foreach ($enseignant as  $etud)
                              
                                    <option value="{{$etud->id}}">{{$etud->user->prenom.' '.$etud->user->name }}</option>
                               @endforeach
                              </select>
                            @error('dgecole')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ecole" class="col-md-4 col-form-label text-md-end">Ecole Doctorale</label>
                        <div class="col-md-6">
                            <select id="ecole" name="ecole" class="form-control @error('ecole') is-invalid @enderror"   required>
                               @foreach ($ecoles as  $ecole)
                              
                                    <option value="{{$ecole->id}}">{{$ecole->name }}</option>
                               @endforeach
                              </select>
                            @error('ecole') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
 
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Enrégistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection