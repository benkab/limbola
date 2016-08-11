@extends('welcome')

@section('title')
	Identification | Limbola - Magazine
@endsection

@section('content')
	<div class="row" id="page-background">

		<!-- Navbar -->
		@include('public.includes.navbar')
		<!-- End navbar -->

		<!-- Page Header -->
		<div id="profile_header" class="row profile_header">
			<h3 class="text-center">Identification. <br><small>un total regal</small></h3>
			<p id="lign-2"></p>
		</div>
		<!-- End Page Header -->

		<div class="row"  id="identification">
			<div class="container">
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12" id="visitor-login">
					<div class="panel panel-default">
						<h5 id="title">
							Me connecter
							<span class="icon ion-android-contact pull-right"></span>
							<p class="lign"></p>
						</h5>
						<form class="form-vertical" action="{{ route('login_visitor') }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" name="email" id="email" class="form-control" placeholder="Addresse email" value="{{ Request::old('email') }}">
						        @if ($errors->has('email'))
						        <span class="help-block">{{ $errors->first('email') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" value="{{ Request::old('password') }}">
							    @if ($errors->has('password'))
						        	<span class="help-block">{{ $errors->first('password') }}</span>
						        @endif
							</div>
							<small class="pull-right motdepasseoublie"><a href="" data-toggle="modal" data-target="#myModal">Mot de passe oubli&eacute;</a></small>
							<button class="btn btn-sm btn-info">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="row">
									<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-xs-12 col-sm-12 text-center">
										<h5><b>Changer mon mot de passe</b></h5>
										<p id="lign-2"></p>
										<form action="{{ route('open_reset_password') }}" method="Post" role="form">
											<input type="email" name="my_email" id="my_email" class="form-control" placeholder="Adresse email" required>
											<br>
											<button class="btn btn-sm btn-info">Soumettre</button>
											<input type="hidden" name="_token" value="{{ Session::token() }}">
										</form>
									</div>
								</div>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
					<div class="panel panel-default">
						<h5 id="title">
							M'inscrire
							<span class="icon ion-person-add pull-right"></span>
							<p class="lign"></p>
						</h5>
						<form class="form-vertical" action="{{ route('new_visitor') }}" method="Post" role="form">
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
							<div class="form-group{{ $errors->has('email_inscription') ? ' has-error' : '' }}">
								<input type="email" name="email_inscription" id="email_inscription" class="form-control" placeholder="Adresse email" value="{{ Request::old('email_inscription') }}">
						        @if ($errors->has('email_inscription'))
						        <span class="help-block">{{ $errors->first('email_inscription') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('password_inscription') ? ' has-error' : '' }}">
								<input type="password" name="password_inscription" id="password_inscription" class="form-control" placeholder="Mot de passe" value="{{ Request::old('password_inscription') }}">
							    @if ($errors->has('password_inscription'))
						        	<span class="help-block">{{ $errors->first('password_inscription') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('confirmpassword') ? ' has-error' : '' }}">
								<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirmer mot de passe" value="{{ Request::old('confirmpassword') }}">
							    @if ($errors->has('confirmpassword'))
						        	<span class="help-block">{{ $errors->first('confirmpassword') }}</span>
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

@endsection
