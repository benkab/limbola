@extends('welcome')

@section('content')
	@include('admin.includes.top-page')

	<!-- nav-side -->
	@include('admin.includes.nav-side.tag')
	<!-- End nav-side -->
	
	@include('admin.includes.nav-header')

	<!-- Page Content -->
	<div class="row clearfix" id="page-content">
       <div class="row clearfix" id="tags">
       		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
       			<div class="panel panel-default">
       				<div class="panel-body">
						<h5>
							Nouveau mot cl&eacute;
							<span class="icon ion-link pull-right"></span>
						</h5>
						<p class="lign"></p>
						<form class="form-vertical" action="{{ route('tags') }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
								<textarea name="description" id="description" rows="3" class="form-control" placeholder="Description">{{ Request::old('description') }}</textarea>
								@if ($errors->has('description'))
						        <span class="help-block">{{ $errors->first('description') }}</span>
						        @endif
							</div>
							<button class="btn btn-sm btn-default">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
       				</div>
       			</div>
       		</div>
       		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
       			<div class="panel panel-default" id="panel-with-paging">
       				<div class="panel-body">
						<h5>
							Tous les mots cl&eacute;s
							<span class="icon ion-android-list pull-right"></span>
						</h5>
						<p class="lign"></p>
						<table class="table">
							<tr>
								<td>Description</td>
								<td class="text-center">Status</td>
								<td class="hidden-sm hidden-xs text-center">Date de cr&eacute;ation</td>
								<td class="text-center">Actions</td>
							</tr>
							@foreach($tags as $tag)
							<tr>
								<td>&nbsp;&nbsp;&nbsp;{{ $tag->description}} </td>
								@if($tag->isUsed($tag))
								<td class="text-center"><small class="label label-success">Utilis&eacute;</small></td>
								@else
								<td class="text-center"><small class="label label-default">Non utilis&eacute;</small></td>
								@endif
								<td class="hidden-sm hidden-xs text-center">{{ $tag->created_at->diffForHumans() }}</td>
								<td class="text-center">
									<a href="{{ route('tag.edit', ['id' => $tag->id])}}" data-toggle="tooltip" data-placement="top" title="Editer">
										<span class="icon ion-edit"></span>
									</a>
									@if(!$tag->isUsed($tag))
										@if(Auth::user()->isAdmin())
										<a href="{{ route('tag.remove', ['id' => $tag->id])}}" data-toggle="tooltip" data-placement="top" title="Supprimer">
											<span class="icon ion-trash-b"></span>
										</a>
										@endif
									@endif
								</td>
							</tr>
							@endforeach
						</table>
						<hr>
						<small id="render">{!! $tags->render() !!}</small>
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