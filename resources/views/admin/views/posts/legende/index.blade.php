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
							L&eacute;gendes
						</h5>
						<a href="{{ route('new_legende') }}" class="pull-right btn btn-sm btn-default" id="new-post-link">
							<span class="icon ion-compose"></span>
							<span class="hidden-sm hidden-xs">&nbsp;R&eacute;diger</span>
						</a>
						<p class="lign"></p>
						@foreach($legendes as $legende)
						<div class="row">
							<div class="col-md-1 text-right hidden-sm hidden-xs">
								<img src="{{ URL::to('public/uploads/posts/').'/'.$legende->post->cover }}" alt="post-image" id="all-post-image">
							</div>
							<div class="col-md-5" id="article-title">
								<div class="col-xs-12">
									<p class="text-left">{{ $legende->firstname}}&nbsp;{{ $legende->lastname}}</p>
									<li><p class="text-left">{{ $legende->title}}</p></li>
									<br>
									<span>{{ $legende->post->created_at->diffForHumans() }}</span>
									<p id="article-auther"><span class="icon ion-edit"></span>&nbsp;{{ $legende->post->user->firstname }}&nbsp;{{ $legende->post->user->lastname }}</p>
									<hr class="hidden-xs hidden-sm">
								</div>
								<br>
							</div>
							<div class="col-md-2 text-left" id="view-category">
								<!-- <div class="col-xs-12" id="view-category-inner">
									<span></span>
								</div> -->
							</div>
							<div class="col-md-2 artiicle-status">
								<div class="col-xs-12">
									@if($legende->status == 1)
										<span class="label label-success">Publi&eacute;</span>
									@else
										<span class="label label-default">Non Publi&eacute;</span>
									@endif	
						        </div>
							</div>
							<div class="col-md-2 interaction">
								<div class="col-xs-12">
									<div class="artiicles-actions">
										<a href="{{ route('view_legende', ['id' => $legende->post->id]) }}" class="btn btn-xs btn-warning" role="button" data-toggle="tooltip" data-placement="top" title="Voir">
											<span class="icon ion-folder" aria-hidden="true"></span> 
										</a>
										@if($legende->status == 0)
											@if((Auth::user()->email === $legende->post->user->email) || Auth::user()->isAdmin())
											<a href="{{ route('edit_legende', ['id' => $legende->post->id]) }}" class="btn btn-xs btn-default" role="button" data-toggle="tooltip" data-placement="top" title="Editer">
												<span class="icon ion-compose" aria-hidden="true"></span> 
											</a>
											@endif
										@endif
										@if(Auth::user()->isAdmin())
										<a href="{{ route('delete_post', ['id' => $legende->post->id]) }}" class="btn btn-xs btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Supprimer">
											<span class="icon ion-trash-b" aria-hidden="true"></span> 
										</a>
										@endif
										
									</div>
									<hr class="hidden-lg hidden-md">
								</div>

							</div>
						</div>
						@endforeach
						<div class="row text-center">
			            	{!! $legendes->render() !!}
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