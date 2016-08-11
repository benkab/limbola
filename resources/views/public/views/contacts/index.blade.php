@extends('welcome')

@section('title')
	Contacts | Limbola - Magazine
@endsection

@section('content')
	<div class="row" id="page-background">
		<!-- Navbar -->
		@include('public.includes.navbar')
		<!-- End Navbar -->

		<!-- Page Header -->
		<div id="profile_header" class="row profile_header">
			<h3 class="text-center">Contacts. <br><small>un total regal</small></h3>
			<p id="lign-2"></p>
		</div>

		<div class="row"  id="identification">
			<div class="container">
				<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12" id="visitor-login">
					<div class="panel panel-default">
						<h5 id="title">
							Nos contacts
							<span class="icon ion-ios-location pull-right"></span>
							<p class="lign"></p>
						</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas soluta voluptatibus 
							in ullam sit beatae cum ipsam quam at ut officia.
						</p>
						<br>
							<span class="icon ion-android-mail"></span>
							&nbsp;<span>info@limbola-magazine.com</span>
							<br>
							<span class="icon ion-android-call"></span>
							&nbsp;<span>+33 60 23 543 534</span>
							<br>
							<ul id="solcial_net">
								<li>
					    			<a href=""><span class="icon ion-social-facebook" data-toggle="tooltip" data-placement="right" title="Suivez nous sur Facebook"></span></a>
					    		</li>
					    		<li>
					    			<a href=""><span class="icon ion-social-twitter" data-toggle="tooltip" data-placement="right" title="Suivez nous sur Twitter"></span></a>
					    		</li>
					    		<li>
					    			<a href=""><span class="icon ion-social-googleplus" data-toggle="tooltip" data-placement="right" title="Suivez nous sur Google-Plus"></span></a>
					    		</li>
							</ul>
						<hr>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
					<div class="panel panel-default">
						<h5 id="title">
							Formulaire de contact
							<span class="icon ion-android-mail pull-right"></span>
							<p class="lign"></p>
						</h5>
						<form class="form-vertical" action="{{ route('sendMessage') }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
								<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Pr&eacute;nom" value="{{ Request::old('firstname') }}">
						        @if ($errors->has('firstname'))
						        <span class="help-block">{{ $errors->first('firstname') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
								<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Nom" value="{{ Request::old('lastname') }}">
							    @if ($errors->has('lastname'))
						        	<span class="help-block">{{ $errors->first('lastname') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" name="email" id="email" class="form-control" placeholder="Adresse email" value="{{ Request::old('email') }}">
						        @if ($errors->has('email'))
						        <span class="help-block">{{ $errors->first('email') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
								<textarea name="message" id="message" rows="10" class="form-control" placeholder="Message">{{ Request::old('message') }}</textarea>
								@if ($errors->has('message'))
						        <span class="help-block">{{ $errors->first('message') }}</span>
						        @endif
							</div>
							<button class="btn btn-sm btn-info">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Newsletter -->
		@include('public.includes.newsletter')
		<!-- End Newsletter -->

		<!-- Footer -->
		@include('public.includes.footer')
		<!-- End Footer -->
		
	</div>


	<!-- Navigation -->
	@include('public.includes.navigation')
	<!-- End Navigation -->

	@include('public.includes.search')
@endsection