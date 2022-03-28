@extends('layouts.app')
@section('content')
<div>
    @if (!empty($success))
    <div class="alert alert-success"> {{ $success }}</div>
    @endif
<div class="row">
    <div class="  stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Proposition de sujet de thèse</h4>
        
          <form method="POST" action="{{ route('enseignant.storePost') }}">
            @csrf
         
            <div class="form-group">
              <label for="exampleInputEmail1">Sujet</label>
              <input type="text" class="form-control @error('sujet') is-invalid @enderror " name="sujet" value="{{ old('sujet') }}" required id="exampleInputEmail1" placeholder="sujet ">
              @error('sujet')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
          
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Description</label>
              <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputConfirmPassword1" placeholder="Description">{{old("description")}}</textarea>
              @error('description')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div> 
</div>


@endsection