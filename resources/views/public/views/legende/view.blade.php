@extends('welcome')

@section('title')
	{{$legende->title}} | L&eacute;gendes | Limbola - Magazine
@endsection

@section('content')
	<div class="row" id="page-background">
		<!-- Navbar -->
		@include('public.includes.navbar')
		<!-- End Navbar -->
		
		<section id="single_posts">
			<div class="container">
				<div class="container">
					<h3>{{ $legende->title }} - 
						@if(!Auth::check())
						<a data-toggle="modal" data-target="#secondModal" id="identification-link">
							<span class="icon ion-ios-star-outline" data-toggle="tooltip" data-placement="top" title="Ajouter &agrave; mes favories"></span>
						</a>
						@else
							@if(Auth::user()->favorites()->where('post_id', $legende->post->id)->first())
								@if(Auth::user()->favorites()->where('post_id', $legende->post->id)->first()->favorite == 1)
								<a href="{{ route('notfavorite', ['id' => $legende->post->id]) }}" data-toggle="tooltip" data-placement="top" title="Retirer de mes favories">
							      	<span class="icon ion-ios-star"></span>
							    </a>
							    @else
							    <a href="{{ route('favorite', ['id' => $legende->post->id]) }}" data-toggle="tooltip" data-placement="top" title="Ajouter &agrave; mes favories">
							      	<span class="icon ion-ios-star-outline"></span>
							    </a>
							    @endif
						    @else
							<a href="{{ route('favorite', ['id' => $legende->post->id]) }}" data-toggle="tooltip" data-placement="top" title="Ajouter &agrave; mes favories">
						      	<span class="icon ion-ios-star-outline"></span>
						    </a>
						    @endif
						@endif
					</h3>
					<p class="lign"></p>
				</div>
				<div class="container">
					<ul id="post-tags">
					@foreach( $legende->post->tags->lists('description') as $tag)
					<li><span>{{ $tag }}</span></li>
					@endforeach
				</ul>
				<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
					<div class="thumbnail">
						<img src="{{ URL::to('public/uploads/posts/').'/'.$legende->post->cover }}" alt="post-image">
					</div>
					<div class="panel panel-default">
						<p>
						<small id="date" class="pull-right"><span class="icon ion-ios-calendar-outline"></span>&nbsp;{{ date('d/m/Y', strtotime($legende->post->published_at)) }}</small>
						<small>Par&nbsp;</small><b>{{ $legende->post->user->firstname }}&nbsp;{{ $legende->post->user->lastname }}</b></p>
						<hr>
						<div id="post-text">
							{!! $legende->body !!}
						</div>
					</div>

					<div class="panel panel-default">
						<div class="row">
							<div class="col-xs-6">
								<ul id="feedback">
									<li>
										@if(!Auth::check())
										<a data-toggle="modal" data-target="#secondModal" id="identification-link">
											<span class="icon ion-android-favorite-outline" data-toggle="tooltip" data-placement="top" title="J'aime"></span>
											<span id="num">
												{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
											</span>
										</a>
										@else
											@if(Auth::user()->likes()->where('post_id', $legende->post->id)->first())
												@if(Auth::user()->likes()->where('post_id', $legende->post->id)->first()->liked == 1)
												<a href="{{ route('dislike', ['id' => $legende->post->id]) }}">
											      	<span class="icon ion-android-favorite" data-toggle="tooltip" data-placement="top" title="Je n'aime plus"></span>
											      	<span id="num">
											      		{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
											      	</span>
											    </a>
											    @else
											    <a href="{{ route('like', ['id' => $legende->post->id]) }}">
											      	<span class="icon ion-android-favorite-outline"  data-toggle="tooltip" data-placement="top" title="J'aime"></span>
											      	<span id="num">
											      		{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
											      	</span>
											    </a>
											    @endif
										    @else
											<a href="{{ route('like', ['id' => $legende->post->id]) }}">
										      	<span class="icon ion-android-favorite-outline"  data-toggle="tooltip" data-placement="top" title="J'aime" id="like"></span>
										      	<span id="num">
										      		{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
										      	</span>
										    </a>
										    @endif
										@endif
									</li>
								</ul>
							</div>
							<div class="col-xs-6 pull-right">
								<ul id="solcial_net" class="pull-right">
									<li>
						    			<a href=""><span class="icon ion-social-facebook" data-toggle="tooltip" data-placement="left" title="Partager sur Facebook"></span></a>
						    		</li>
						    		<li>
						    			<a href=""><span class="icon ion-social-twitter" data-toggle="tooltip" data-placement="left" title="Partager sur Twitter"></span></a>
						    		</li>
						    		<li>
						    			<a href=""><span class="icon ion-social-googleplus" data-toggle="tooltip" data-placement="left" title="Partager sur Google-Plus"></span></a>
						    		</li>
								</ul>
							</div>
						</div>
						<hr>
						@foreach($legende->post->comments as $comment)
						@if($comment->status == 1)
						<div class="media">
							  <a class="media-left" href="#">
							    <img class="media-object" src="{{ URL::to('public/uploads/avatars/').'/'.$comment->user->avatar }}" alt="Generic placeholder image">
							  </a>
							  <div class="media-body">
							    <h5 class="media-heading">
							    	<b>{{ $comment->user->firstname }}&nbsp;{{ $comment->user->lastname }}</b>
							    </h5>
							    <p><span>{{ $comment->body }}</span></p>
							    <small>{{ date('d/m/Y', strtotime($legende->post->published_at)) }}</small>
							    &nbsp;-&nbsp;
							    <span id="actions">
										@if(Auth::user() == $comment->user)
										<a href="{{ route('delete_comment', ['id' => $comment->id]) }}">
											<span class="icon ion-trash-b" data-toggle="tooltip" data-placement="top" title="Supprimer le commentaire"></span>
										</a>
										@elseif(!(Auth::user() == $comment->user))
										<a href="{{ route('report_comment', ['id' => $comment->id]) }}">
											<span class="icon ion-flag" data-toggle="tooltip" data-placement="top" title="Signaler le commentaire"></span>
										</a>
										@endif
								</span>
							  </div>
						</div>
						@endif
						@endforeach
						@if($legende->post->comments->count())
							<p id="lign-2"></p>
						@endif
						<form action="{{ route('post_comment', ['id' => $legende->post->id]) }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
								<textarea name="body" id="body" rows="3" class="form-control" placeholder="Ajouter un commentaire">{{ Request::old('body') }}</textarea>
								@if ($errors->has('body'))
						        <span class="help-block">{{ $errors->first('body') }}</span>
						        @endif
							</div>
							@if(Auth::check())
							<button class="btn btn-sm btn-info" id="token">Soumettre</button>
							@else
							<a href="{{route('identification')}}" type="button" class="btn btn-sm btn-info" id="token">Connexion</a>
							@endif
							<input type="hidden" name="_token" value="{{ Session::token() }}" >
						</form>
						@if($legende->post->comments->count())
						<hr>
						<div class="row text-center" id="commentaires">
							<span>
								{{$legende->post->comments->count()}} 
								{{str_plural('Commentaire', $legende->post->comments->count())}}
							</span>
						</div>
						@endif
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12" id="suggestion">
					<div class="panel panel-default text-center" id="other-items">
						<h5 class="text-center"><b>Les plus lues</b></h5>
						<p id="lign-2"></p>
						<ul class="text-center">
							@foreach($lus as $lu)
							<li class="text-center">
								<a href="{{ route('singleLymstyle', ['slug' => $lu->slug]) }}">{{$lu->title}}</a>
							</li>
							<br>
							<span class="icon ion-ios-eye-outline"></span>&nbsp;
	                			<span class="comment-number">
									{{$lu->post->comments->count()}}
	                			</span>
	                		</span>
							<hr>
							@endforeach
						</ul>
					</div>
					<div class="panel panel-default text-center" id="other-items">
						<h5 class="text-center"><b>Les plus comment&eacute;es</b></h5>
						<p id="lign-2"></p>
						<ul class="text-center">
							@foreach($lus as $lu)
							<li class="text-center">
								<a href="{{ route('singleLymstyle', ['slug' => $lu->slug]) }}">{{$lu->title}}</a>
							</li>
							<br>
							<span class="icon ion-ios-chatbubble-outline"></span>&nbsp;
	                			<span class="comment-number">
									{{$lu->post->comments->count()}}
	                			</span>
	                		</span>
							<hr>
							@endforeach
						</ul>
					</div>
					@foreach($suggestions as $suggestion)
					<div class="thumbnail wrapper">
						<div class="overlay">
							<div class="row text-center" id="carousel-post-container">
	                    		<p id="carousel-post-title">
	                    			<b>{{$suggestion->firstname}}&nbsp;{{$suggestion->lastname}}</b>
	                    		</p>
	                    		<p id="carousel-post-title-2">
	                    			{{ $suggestion->title }}
	                    		</p>
	                    	</div>
	                    	<div class="row text-center" id="single-post-suggestion-comments">
	                    		<span href="">
	                    			<span class="icon ion-ios-chatbubble-outline"></span>&nbsp;
	                    			<span id="suggestion-comment-number">
										{{$suggestion->post->comments->count()}}
	                    			</span>
	                    		</span>
	                    	</div>
	                    	<div class="row text-center" id="carousel-link">
	                    		<a href="{{ route('singleLegende', ['slug' => $suggestion->slug]) }}">
									<span>En savoir plus</span>
								</a>
	                    	</div>
						</div>
						<img src="{{ URL::to('public/uploads/posts/').'/'.$suggestion->post->cover }}" alt="post-image" id="reaveal-content">
					</div>
					@endforeach
				</div>
			</div>
		</section>

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
	@include('public.includes.identification-modal')
@endsection