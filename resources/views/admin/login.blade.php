@extends('welcome')

@section('content')
	<div class="col-xs-12 clearfix text-center" id="login-img">
		<img src="{{ URL::to('resources/views/admin/assets/images/logo.jpg') }}" alt="logo" id="logo">
	</div>
	<div class="col-xs-12">
		<div class="col-lg-4 col-md-4 col-lg-offset-4 col-lg-md-4 col-sm-12 col-xs-12">
			<form class="form-vertical" action="{{ route('login') }}" method="Post" role="form" id="login-form">

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
				<button class="btn btn-sm btn-default">Soumettre</button>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</div>
@endsection
	
