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
    <p><label>Diplome</label><input  value="{{$cursus->diplomeAccess }}"  placeholder="Diplome d'accès..." oninput="this.className = ''" name="diplome">
      @error('diplome')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{$cursus->specialite}}" placeholder="Spécialité:..." oninput="this.className = ''" name="specialite">
      @error('specialite')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{$cursus->universite}}" placeholder="Université de délivrance..." oninput="this.className = ''" name="universite">
      @error('universite')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{$cursus->date}}" type="date" placeholder="Date de délivrance..." oninput="this.className = ''" name="date">
      @error('date')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{$cursus->lieu}}" placeholder="Lieu d'obtention..." oninput="this.className = ''" name="lieu">
      @error('lieu')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><input value="{{$cursus->mention}}" placeholder="Mention..." oninput="this.className = ''" name="mention">
      @error('mention')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </p>
    <p><label>Pays</label><select placeholder="Pays" name="pays">
      <option selected>{{$cursus->pays}}</option>
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
    <p><input value="{{$doctorat->intituleDoctorat}}" placeholder="Intitulé..." oninput="this.className = ''" name="intitule"></p>
   <p> <label>Etablissement d'accueil</label>  
    <select class="form-control @error('etablisssement') is-invalid @enderror " name="etablissement" >
   
      @foreach ($etablissements as $eta)
        <option value="{{$eta->id}}">{{$eta->name}}</option>
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
      @if ($labo->id != $lab->id )
          <option value="{{$labo->id}}">{{$labo->name}}</option>   
      @endif
  @endforeach
     
   </select>
  </select></p>
  <p><textarea name="sujet" placeholder="sujet de thèse" class="form-control @error('sujet') is-invalid @enderror">{{$doctorat->sujet}}</textarea>
    @error('sujet')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror</p>
    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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
              
              
              {{-- <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Formulaire de demande d'admission</h4>
                    <form class="form-sample" method="POST" action="{{ route('etudiant.storeDemande',['id'=>$dossier->id]) }}" >
                      @csrf
                      
                      <p class="card-description my-4">
                        Cursus Universitaire du candidat
                      </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Diplome d'accès</label>
                            <div class="col-sm-9">
                              <input type="text" value="{{ $cursus->diplomeAccess }}" name="diplome" class="form-control @error('diplome') is-invalid @enderror" />
                                @error('diplome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Spécialité</label>
                            <div class="col-sm-9">
                              <input name="specialite" value ="{{$cursus->specialite}}" type="text" class="form-control @error('specialite') is-invalid @enderror" />
                              @error('specialite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Université de délivrance</label>
                            <div class="col-sm-9"> 
                              <input name="universite" value="{{ $cursus->universite }}" type="text" class="form-control @error('universite') is-invalid @enderror" />
                              @error('universite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date d'obtention</label>
                            <div class="col-sm-9">
                              <input name="date" value="{{ $cursus->date }}" type="date" class="form-control @error('date') is-invalid @enderror" />
                              @error('date')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                             @enderror
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lieu d'obtention</label>
                            <div class="col-sm-9">
                              <input name="lieu" value="{{ $cursus->lieu }}" type="text" class="form-control @error('lieu') is-invalid @enderror" />
                              @error('lieu')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">mention </label>
                              <div class="col-sm-9">
                                <input name="mention" value="{{$cursus->mention }}" type="text" class="form-control @error('mention') is-invalid @enderror" />
                                @error('mention')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                            </div>
                          </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label @error('pays') is-invalid @enderror">Pays</label>
                            <div class="col-sm-9">
                              <select name="pays" class="form-control">
                                <option>{{$cursus->pays}}</option>
                                <option>Italy</option>
                                <option>Russia</option>
                                <option>Britain</option>
                                <option>Senegal</option>
                                <option>Guinnée</option>
                                <option>Mali</option>
                                <option>Mauritanie</option>
                              </select>
                            </div>
                            @error('pays')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <p class="card-description my-4">
                        Doctorat auquel le candidat demande son admission
                      </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Intitulé</label>
                            <div class="col-sm-9">
                              <input name="intitule" value="{{ $doctorat->intituleDoctorat }}" type="text" class="form-control @error('intitule') is-invalid @enderror" />
                              @error('intitule')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ecole doctorale</label>
                            <div class="col-sm-9">
                              <select name="ecole" class="form-control @error('ecole') is-invalid @enderror">
                                <option value="{{$ecole->id}}">{{$ecole->name}}</option>   
                                @foreach ($ecoles as $eco)
                                @if ($eco->id != $ecole->id )
                                    <option value="{{$ecole->id}}">{{$ecole->name}}</option>   
                                @endif
                                @endforeach
                                 
                               </select>
                              @error('ecole')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Etablissement de rattachement</label>
                            <div class="col-sm-9">
                              <select name="etablissement" class="form-control @error('etablisssement') is-invalid @enderror">
                               @foreach ($etablissements as $eta)
                                <option value="{{$eta->id}}">{{$eta->name}}</option>

                               @endforeach
                                
                              </select>
                              @error('etablisssement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Laboratoire d' accueil</label>
                            <div class="col-sm-9">
                             
                              <select name="labo" class="form-control @error('etablisssement') is-invalid @enderror"> 
                                <option value="{{$lab->id}}">{{$lab->name}}</option>   
                                @foreach ($labos as $labo)
                                    @if ($labo->id != $lab->id )
                                        <option value="{{$labo->id}}">{{$labo->name}}</option>   
                                    @endif
                                @endforeach
                                 
                               </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row my-4 ">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sujet de thèse</label>
                            <div class="col-sm-9">
                              <textarea name="sujet" id="" cols="30" rows="10" class="form-control @error('sujet') is-invalid @enderror">{{$doctorat->sujet}}</textarea>
                                @error('sujet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                        </div>
                      </div><br/>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div> --}}
