<div class="row text-center" id="subscribe">
	<p>Abonnez vous &agrave; notre newsletter</p>
	<div class="col-xs-10 col-sm-10 col-md-4 col-lg-4 col-xs-offset-1 col-sm-offset-1 col-md-offset-4 col-lg-offset-4">
		<form action="{{ route('subscribe')}}" method="Post" role="form">
	    	<div class="form-group{{ $errors->has('email_subs') ? ' has-error' : '' }} text-center">
		      	<input type="text" name="email_subs" class="form-control" id="email_subs" placeholder="Votre addresse email" value="{{ Request::old('email_subs') }}">
		      	@if ($errors->has('email_subs'))
		        <span class="help-block">{{ $errors->first('email_subs') }}</span>
		        @endif
			</div>
			<br>
			<button class="btn btn-sm btn-default">Soumettre</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
	</div>
</div>