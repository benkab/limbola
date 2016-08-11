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
							Nouveau LimStyle
							<div class="pull-right">
								<a href="{{ route('view_lymstyle_page') }}" id="back" data-toggle="tooltip" data-placement="top" title="Voir les lymstyles"><span class="icon ion-ios-undo"></span></a>
								<span class="icon ion-compose"></span>
							</div>
						</h5>
						<p class="lign"></p>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-vertical" action="{{ route('new_post') }}" method="Post" role="form" enctype="multipart/form-data">
									<div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
										<span for="cover" class="control-label" id="label">Photo de couverture</span>
										<br>
										<input type="file" name="cover" id="cover" accept=".png, .jpg">
										@if ($errors->has('cover'))
								        <span class="help-block">{{ $errors->first('cover') }}</span>
								        @endif
									</div>
									<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
										<textarea name="title" id="" rows="3" class="form-control" placeholder="Titre de l'article">{{ Request::old('title') }}</textarea>
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
										 <label><input type="checkbox" value="true" name="status" id="checkbox">Publier l'article en meme temps</label>
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