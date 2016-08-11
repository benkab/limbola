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
       				<div class="panel-body" id="view-post">
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 thumbnail">
							<img src="{{ URL::to('public/uploads/posts/').'/'.$post->cover }}" alt="post-image" id="post-image">
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<h3>{{$post->lymstyle->title}}</h3>
							<p class="lign"></p>
							<ul id="links">
								<li>
									<a href="{{ route('view_lymstyle_page') }}" data-toggle="tooltip" data-placement="top" title="Voir les lymstyles"><span class="icon ion-ios-undo"></span></a>
								</li>
								@if($post->lymstyle->status == 0)
									@if((Auth::user()->email === $post->user->email) || Auth::user()->isAdmin())
										<li>
											<a href="{{ route('edit_lymstyle', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="Editer"><span class="icon ion-edit"></span></a>
										</li>
									@endif
								@endif
								@if(Auth::user()->isAdmin())
								<li>
									<a href="{{ route('delete_post', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="Supprimer"><span class="icon ion-trash-b"></span></a>
								</li>
								@endif
							</ul>
							<!-- <div class="text-left" id="view-category">
								<span></span>
							</div> -->
							<p id="view-status">
								@if($post->status == 1)
									<span class="label label-success">Publi&eacute;</span>
									<br>
									<small>{{$post->created_at->diffForHumans()}}</small>
								@else
									<span class="label label-default">Non Publi&eacute;</span>
								@endif	
							</p>
							
							<h4 id="auther"><span>Par&nbsp;&nbsp;</span>{{ $post->user->firstname }}&nbsp;{{ $post->user->lastname }}</h4>

							<p id="favorite">
								@if(Auth::user()->favorites()->where('post_id', $post->id)->first())
									@if(Auth::user()->favorites()->where('post_id', $post->id)->first()->favorite == 1)
									<a href="{{ route('notfavorite', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="Retirer de mes favories">
										<span class="icon ion-ios-star"></span>
									</a>
									@else
									<a href="{{ route('favorite', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="Ajouter a mes favories">
										<span class="icon ion-ios-star-outline"></span>
									</a>
									@endif
							    @else
								<a href="{{ route('favorite', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="Ajouter a mes favories">
									<span class="icon ion-ios-star-outline"></span>
								</a>
							    @endif
							</p>
							<span id="like-block">
								@if(Auth::user()->likes()->where('post_id', $post->id)->first())
									@if(Auth::user()->likes()->where('post_id', $post->id)->first()->liked == 1)
									<a href="{{ route('dislike', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="Je n'aime plus">
								      	<span class="icon ion-ios-heart" id="isLiked"></span>
								    </a>
								    @else
								    <a href="{{ route('like', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="J'aime" >
								      	<span class="icon ion-ios-heart-outline" id="isNotLiked"></span>
								    </a>
								    @endif
							    @else
								<a href="{{ route('like', ['id' => $post->id]) }}" data-toggle="tooltip" data-placement="top" title="J'aime">
							      	<span class="icon ion-ios-heart-outline" id="isNotLiked"></span>
							    </a>
							    @endif
							    
							    <span id="likes">
							    	{{ $post->likes()->where('post_id', $post->id)->where('liked', true)->count() }}
							    	{{str_plural('Like', $post->likes()->where('post_id', $post->id)->where('liked', true)->count())}}
							    </span>
							</span>
							<a href="" id="comments">
								10 Commentaires
							</a>
							
							<ul id="links">
								@if($post->lymstyle->status == 0)
								<li>
									@if(Auth::user()->isAdmin())
										<li>
											<a href="{{ route('publier_lymstyle', ['id' => $post->id] )}}" type="button" class="btn btn-sm btn-success" id="publier">
												<span>Publier</span>
											</a>
										</li>
									@endif
								</li>
								@else
									@if(Auth::user()->isAdmin())
										<li>
											<a href="{{ route('retirer_lymstyle', ['id' => $post->id] )}}" type="button" class="btn btn-sm btn-danger" id="publier">
												<span>Retirer</span>
											</a>
										</li>
									@endif
								@endif	
							</ul>
							<hr>
							<ul id="post-tags">
								@foreach( $post->tags->lists('description') as $tag)
								<li>{{ $tag }}</li>
								@endforeach
							</ul>
							<hr>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 fr-view">
							<h5 id="post-body">{!! $post->lymstyle->body !!}</h5>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							
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