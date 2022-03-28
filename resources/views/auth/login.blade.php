@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Connexion</h4>
          <p class="card-description">
            
          </p>
          <form method="POST" class="forms-sample" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Login</label>
              <input type="email" name='email' value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror " id="exampleInputEmail1" placeholder="Login">
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"  id="exampleInputPassword1" placeholder="Password">
              @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
           </div>
         
            <button type="submit" class="btn btn-primary mr-2">Connexion</button>
          </form>
        </div>
      </div>
    </div>
</div>




@endsection
