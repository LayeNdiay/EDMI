@extends('layouts.app')
@section('content')
<div>
    @if (!empty($success))
    <div class="alert alert-success"> {{ $success }}</div>
    @endif
    <div class="alert alert-info">
        Formulaire de Création de Laboratoire
    </div>
    <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('laboratoire.create') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="nomLabo" class="col-md-4 col-form-label text-md-end">nomLaboratoire</label>

                        <div class="col-md-6">
                            <input id="nomLabo" type="text" class="form-control @error('nomLabo') is-invalid @enderror" name="nomLabo" value="{{ old('nomLabo') }}" required autocomplete="name" autofocus>

                            @error('nomLabo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="adresse" class="col-md-4 col-form-label text-md-end">Adresse</label>

                        <div class="col-md-6">
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="name" autofocus>

                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="intitule" class="col-md-4 col-form-label text-md-end">Intitule Laboratoire</label>

                        <div class="col-md-6">
                            <input id="intitule" type="text" class="form-control @error('intitule') is-invalid @enderror" name="intitule" value="{{ old('intitule') }}" required autocomplete="name" autofocus>

                            @error('intitule')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="enseignant" class="col-md-4 col-form-label text-md-end">Choix du directeur de laboratoire</label>
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
                        <label for="ecole" class="col-md-4 col-form-label text-md-end">Choix de l'etablissement de rachement </label>
                        <div class="col-md-6">
                            <select id="ecole" name="ecole" class="form-control @error('ecole') is-invalid @enderror"   required>
                               @foreach ($etablissement as  $eta)
                                    <option value="{{$eta->id}}">{{$eta->name }}</option>
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