@extends('layouts.app2')
@section('content')
<link href="{{asset('img/favicon.png')}}" rel="icon">
<link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

<!-- Bootstrap core CSS -->
{{-- <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
<!--external css-->
<link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
<link href="{{asset('lib/fancybox/jquery.fancybox.css')}}" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="{{asset('style/style.css')}}" rel="stylesheet">
<link href="{{asset('style/style-responsive.css')}}" rel="stylesheet">
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<div> Les pièces à Joindre</div>
<div class="row ms-4" style="margin-left:30%" >
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<p>En cliquant sur Envoyer vous n'aurais plus le droit de modifier votre dossier</p>
    <div class="">
      <div class="form-panel">
        <form action="{{route('etudiant.storePJ',['id'=>$dossier->id])}}" method="post" enctype="multipart/form-data" class="container" id="container">
            @csrf
            <div class="form-group">
            <label class="control-label col-md-3">Curriculum Vitae</label>
            <div class="controls col-md-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <span class="btn btn-theme02 btn-file">
               <!--   <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> -->
                <input name="cv" accept="application/pdf" type="file" class="default" />
                </span>
                <span class="fileupload-preview" style="margin-left:5px;"></span>
                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3">Projet de Thèse</label>
            <div class="controls col-md-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <span class="btn btn-theme02 btn-file">
                <!--  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>-->
                <input name="projet" accept="application/pdf" type="file" class="default" />
                </span>
                <span class="fileupload-preview" style="margin-left:5px;"></span>
                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Attestation de bourse</label>
            <div class="controls col-md-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <span class="btn btn-theme02 btn-file">
                 <!-- <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span> -->
                <input name="attestation" accept="application/pdf" type="file" class="default" />
                </span>
                <span class="fileupload-preview" style="margin-left:5px;"></span>
                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Inclure les diplomes</label>
            <div class="controls col-md-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <span class="btn btn-theme02 btn-file">
                    <label for="files">Envoyer les diplomes</label>
                    <input type="file" multiple name="diplomesObenus[]" is="drop-files" label="Déposer vos Diplomes" help="Petit message  d'erreur">
                </span>
                <span class="fileupload-preview" style="margin-left:5px;"></span>
                <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
              </div>
            </div>
          </div>
          <button type="submit" style="margin-left: 300px; " class="btn btn-secondary">Envoyer</button>
        </form>
        
      </div>
      <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
  </div>
  <script type="module" src="//unpkg.com/@grafikart/drop-files-element"></script>
@endsection