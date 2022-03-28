@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/multistep.css')}}">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="form-sample" method="POST" action="{{ route('etudiant.createDemande') }}" >
  @csrf
  <!-- One "tab" for each step in the form: -->
  
  <div class="tab">
    <h2>Indentification du candidat</h2>
    <p><input placeholder="Prenom" value="{{Auth::user()->prenom}}" oninput="this.className = ''" name="prenom">
      @error('prenom')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input placeholder="Nom" value="{{Auth::user()->name}}" oninput="this.className = ''" name="nom">
      @error('nom')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror</p>
    <p><input placeholder="Adresse Domicile" value="{{Auth::user()->userable->adresse}}" oninput="this.className = ''" name="adresse">
      @error('adresse')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
    </p>
    <p><input placeholder="Telephone" value="{{Auth::user()->userable->telephone}}"  oninput="this.className = ''" name="telephone">
      @error('telephone')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input placeholder="Email"  value="{{Auth::user()->email}}" oninput="this.className = ''" name="email">
      @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
  </div>

  <div class="tab">
    <h2>Cursus Universitaire du candidat:</h2>
    <p><label>Diplome</label><input  value="{{old('diplome')}}"  placeholder="Diplome d'accès..." oninput="this.className = ''" name="diplome">
      @error('diplome')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{old('specialite')}}" placeholder="Spécialité:..." oninput="this.className = ''" name="specialite">
      @error('specialite')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{old('universite')}}" placeholder="Université de délivrance..." oninput="this.className = ''" name="universite">
      @error('universite')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{old('date')}}" type="date" placeholder="Date de délivrance..." oninput="this.className = ''" name="date">
      @error('date')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{old('lieu')}}" placeholder="Lieu d'obtention..." oninput="this.className = ''" name="lieu">
      @error('lieu')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{old('mention')}}" placeholder="Mention..." oninput="this.className = ''" name="mention">
      @error('mention')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><label>Pays</label><select placeholder="Pays" name="pays">
      <option>Senegal</option>
      <option>France</option>
      <option>Mali</option>
      <option>Guinnée</option>
      <option>America</option>
      <option>Italy</option>
      <option>Russia</option>
      <option>Britain</option>
    </select></p>
  </div>

 
  <div class="tab">
    <h2>Doctorat auquel le candidat demande son admission</h2>
    <p><input placeholder="Intitulé..." oninput="this.className = ''" name="intitule"></p>
   <p> <label>Etablissement d'accueil</label>  <select class="form-control" name="etablissement">
     @foreach ($etablissements as $etablissement)
          <option value="{{$etablissement->id}}">{{$etablissement->name}}</option>   
         @endforeach
        </select>
      @error('etablissement')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </select></p>
  <p><label>Laboratoire d'accueil</label>
     <select name="labo" class="form-control @error('labo') is-invalid @enderror">
    @foreach ($labos as $labo)
     <option value="{{$labo->id}}">{{$labo->name}}</option>   
    @endforeach
   </select>
  </select></p>
  <p><textarea name="sujet" placeholder="sujet de thèse" class="form-control @error('sujet') is-invalid @enderror">{{old('sujet')}}</textarea>
    @error('sujet')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span> 
    @enderror</p>
    @if ($voir)
        
      <p><label>choix du directeur de Thése</label>

      <select name="enseignant" class="form-control @error('enseignants') is-invalid @enderror">
        @foreach ($enseignants as $prof)
        <option value="{{$prof->id}}">{{$prof->user->prenom .'  '. $prof->user->name}}</option>   
        @endforeach
      </select></p>
    @endif

    <button type="submit" class="btn btn-primary mr-2">Enrégistrer</button>
  </div>



  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
  </div>
  
</form>
<!--Multistepform ends-->



</div>
</div>
</div>
</div>


<script src="{{asset('css/multistep.js')}}"></script>
@endsection