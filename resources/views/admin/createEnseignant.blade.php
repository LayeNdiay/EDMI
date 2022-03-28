@extends('layouts.app')
@section('content')
    <div>
        @if (!empty($success))
        <div class="alert alert-success"> {{ $success }}</div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="alert alert-info">
            Formulaire de Création d'enseignant
        </div>
        <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('enseignant.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">Prenom</label>

                            <div class="col-md-6">
                                <input id="penom" type="text" class="form-control @error('penom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="name" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="matricule" class="col-md-4 col-form-label text-md-end">Matricule</label>

                            <div class="col-md-6">
                                <input id="matricule" type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}" required autocomplete="matricule" >

                                @error('matricule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="grade" class="col-md-4 col-form-label text-md-end">Grade</label>

                            <div class="col-md-6">
                                <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ old('grade') }}" >

                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6 wrapper">
                            <div id="survey_options">

                                Spécialité
                                <input type="text" name="specialite[]" class="survey_options form-control @error('email') is-invalid @enderror" size="50" required>
                            </div>
 
                                @error('specialite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="controls align-left">
                                    <a href="#" id="add_more_fields" class="btn btn-primary"> Add More</a>
                                    <a href="#" id="remove_fields" class ="btn btn-danger"> Remove Field</a>
                                  </div>
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  
<script>
    var survey_options = document.getElementById('survey_options');
var add_more_fields = document.getElementById('add_more_fields');
var remove_fields = document.getElementById('remove_fields');

add_more_fields.onclick = function(e){
    e.preventDefault()
  var newField = document.createElement('input');
  newField.setAttribute('type','text');
  newField.setAttribute('name','specialite[]');
  newField.setAttribute('class','form-control');
  newField.setAttribute('siz',50);
  newField.setAttribute('placeholder','Another Field');
  survey_options.appendChild(newField);
}

remove_fields.onclick = function(){
  var input_tags = survey_options.getElementsByTagName('input');
  if(input_tags.length > 2) {
    survey_options.removeChild(input_tags[(input_tags.length) - 1]);
  }
}

</script>

@endsection
