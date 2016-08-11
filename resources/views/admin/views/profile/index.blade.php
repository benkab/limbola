@extends('welcome')

@section('content')
	@include('admin.includes.top-page')

	<!-- nav-side -->
	@include('admin.includes.nav-side.profile')
	<!-- End nav-side -->

	@include('admin.includes.nav-header')

	<!-- Page Content -->
	<div class="row clearfix" id="page-content">
       <div class="row clearfix" id="tags">
       		<div class="col-lg-4 col-md-4 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12">
       			<div class="panel panel-default" id="profile">
       				<div class="panel-body">
						<h5>
							Mettre &agrave; jour mon profile
							<span class="icon ion-android-contact pull-right"></span>
						</h5>
						<p class="lign"></p>
						<div class="row">
						  <div class="col-xs-8 col-xs-offset-2 thumbnail">
						  	<img src="{{ URL::to('public/uploads/avatars/').'/'.Auth::user()->avatar }}" alt="user-image" id="user-profile-image">		
						  </div>
						</div>
						<form class="form-vertical" action="{{ route('profile_update') }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('Prenom') ? ' has-error' : '' }}">
								<input type="text" name="Prenom" id="Prenom" class="form-control" placeholder="Pr&eacute;nom" value="{{ Request::old('Prenom') ?: Auth::user()->firstname }}">
								@if ($errors->has('Prenom'))
						        <span class="help-block">{{ $errors->first('Prenom') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }}">
								<input type="text" name="Nom" id="Nom" class="form-control" placeholder="Nom" value="{{ Request::old('Nom') ?: Auth::user()->lastname }}">
								@if ($errors->has('Nom'))
						        <span class="help-block">{{ $errors->first('Nom') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" name="email" id="email" class="form-control" placeholder="Addresse email" value="{{ Request::old('email') ?: Auth::user()->email }}">
								@if ($errors->has('email'))
						        <span class="help-block">{{ $errors->first('email') }}</span>
						        @endif
							</div>
							<button class="btn btn-sm btn-default">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
       				</div>
       			</div>
       		</div>
       		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
       			<div class="panel panel-default">
       				<div class="panel-body">
						<h5>
							Changer ma photo de profil
							<span class="icon ion-key pull-right"></span>
						</h5>
						<p class="lign"></p>
						<form class="form-vertical" action="{{route('upload_profile')}}" method="Post" role="form" enctype="multipart/form-data">
							<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
								<input type="file" name="avatar" id="avatar" accept=".png, .jpg">
								@if ($errors->has('avatar'))
						        <span class="help-block">{{ $errors->first('avatar') }}</span>
						        @endif
							</div>
							<button class="btn btn-sm btn-default">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
       				</div>
       			</div>
       		</div>
       </div>
       <div class="row">
       		<p id="hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi dicta illo ad a, quas numquam, eius perspiciatis amet eos possimus dolor! 
		       	Magnam temporibus dolore ullam consectetur distinctio minus elit. Sequi dicta illo ad a, quas numquam, eius perspiciatis amet eos p
		      
		    </p>
       </div>
       
    </div>
	<!-- End Page Content -->

	@include('admin.includes.bottom-page')
@endsection