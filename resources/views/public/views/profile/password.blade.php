@extends('welcome')

@section('title')
	R&eacute;initiation | Limbola - Magazine
@endsection

@section('content')
	<div class="row" id="page-background">

		<!-- Navbar -->
		@include('public.includes.navbar')
		<!-- End navbar -->

		<!-- Page Header -->
		<div id="profile_header" class="row profile_header">
			<h3 class="text-center">R&eacute;initiation. <br><small>un total regal</small></h3>
			<p id="lign-2"></p>
		</div>
		<!-- End Page Header -->

		<div class="row changezmotdepassecontainer"  id="identification">
			<div class="container">
				<div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 col-xs-12 col-sm-12" id="visitor-login">
					<div class="panel panel-default">
						<h5 id="title">
							Changer mon mot de passe
							<span class="icon ion-android-contact pull-right"></span>
							<p class="lign"></p>
						</h5>
						<form class="form-vertical" action="{{ route('post_password_reset') }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" name="email" id="email" class="form-control" placeholder="&#xf132; &nbsp;Addresse email" value="{{ Request::old('email')}}">
								@if ($errors->has('email'))
						        <span class="help-block">{{ $errors->first('email') }}</span>
						        @endif
							</div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" name="password" id="password" class="form-control" placeholder="&#xf458; &nbsp;Nouveu mot de passe" value="{{ Request::old('password') }}">
							    @if ($errors->has('password'))
						        	<span class="help-block">{{ $errors->first('password') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('confirmpassword') ? ' has-error' : '' }}">
								<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="&#xf458; &nbsp;Confirmez nouveau mot de passe" value="{{ Request::old('confirmpassword') }}">
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
