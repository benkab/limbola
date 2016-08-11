@extends('welcome')

@section('content')
	@include('admin.includes.top-page')
	
	<!-- nav-side -->
	@include('admin.includes.nav-side.post')
	<!-- End nav-side -->

	@include('admin.includes.nav-header')

	<!-- Page Content -->
	<div class="row clearfix" id="page-content">
       <div class="row clearfix" id="tags">
       		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       			<div class="panel panel-default">
       				<div class="panel-body" id="posts">
						<h5>
							Nouvelle L&eacute;gende
							<div class="pull-right">
								<a href="{{ route('view_legendes_page') }}" id="back"><span class="icon ion-ios-undo" data-toggle="tooltip" data-placement="top" title="Voir les legendes"></span></a>
								<span class="icon ion-compose"></span>
							</div>
						</h5>
						<p class="lign"></p>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-vertical" action="{{ route('new_legende') }}" method="Post" role="form" enctype="multipart/form-data">
									<div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
										<span for="cover" class="control-label" id="label">Photo de couverture</span>
										<br>
										<input type="file" name="cover" id="cover" accept=".png, .jpg">
										@if ($errors->has('cover'))
								        <span class="help-block">{{ $errors->first('cover') }}</span>
								        @endif
									</div>
									<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
										<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Pr&eacute;nom de la l&eacute;gende" value="{{ Request::old('firstname') }}">
										@if ($errors->has('firstname'))
								        <span class="help-block">{{ $errors->first('firstname') }}</span>
								        @endif
									</div>
									<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
										<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Nom de la l&eacute;gende" value="{{ Request::old('lastname') }}">
										@if ($errors->has('lastname'))
								        <span class="help-block">{{ $errors->first('lastname') }}</span>
								        @endif
									</div>
									<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
										<textarea name="title" id="" rows="3" class="form-control" placeholder="Titre de la l&eacute;gende">{{ Request::old('title') }}</textarea>
										@if ($errors->has('title'))
								        <span class="help-block">{{ $errors->first('title') }}</span>
								        @endif
									</div>
									<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
								  		<select multiple="true" id="tag" name="tags[]" class="form-control">
								  			@foreach($tags as $tag)
											<option value="{{ $tag->id }}">{{ $tag->description }}</option>
											@endforeach
										</select>
										@if ($errors->has('tags'))
								            <span class="help-block">{{ $errors->first('tags') }}</span>
								        @endif
								  	</div>
								  	<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
								  		<textarea id="editable" name="body" rows="15" class="form-control">{{ Request::old('body') }}</textarea>
								  		@if ($errors->has('body'))
								            <span class="help-block">{{ $errors->first('body') }}</span>
								        @endif
								    </div>
								    @if(Auth::user()->isAdmin())
								    <div class="checkbox">
										  <label><input type="checkbox" value="true" name="status">Publier l'article en meme temps</label>
										</div>	
									@endif

									<button class="btn btn-sm btn-default">Soumettre</button>
									<input type="hidden" name="_token" value="{{ Session::token() }}">
								</form>
							</div>
						</div>
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