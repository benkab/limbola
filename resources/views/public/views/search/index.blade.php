@extends('welcome')

@section('content')
	<section id="page-background">
		<!-- Navbar -->
		@include('public.includes.navbar')
		<!-- End Navbar -->
		<div class="container" id="search-contaner">
			<p id="search-term">Resultat pour <b>&laquo;{{$query}}&raquo;</b></p>
			<p class="lign"></p>
		</div>
		<!-- List posts -->
		<div id="view_posts" class="container">
			<h4>Parmi les articles</h4>
			<hr>
			@foreach($posts as $post)
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="thumbnail">
					<img src="{{ URL::to('../public/uploads/posts/').'/'.$post->cover }}" alt="post-image">
					<div class="caption">
						<div class="col-xs-12 text-right" id="social-networks">
							<div class="pull-left">
								<ul>
									<li>
						    			<a href=""><span class="icon ion-social-facebook"></span></a>
						    		</li>
						    		<li>
						    			<a href=""><span class="icon ion-social-twitter"></span></a>
						    		</li>
						    		<li>
						    			<a href=""><span class="icon ion-social-googleplus"></span></a>
						    		</li>
								</ul>
							</div>
				        	<small id="date"><span class="icon ion-ios-calendar-outline"></span>&nbsp;{{ date('d/m/Y', strtotime($post->published_at)) }}</small>
						</div>
						<div id="post-title-container" class="text-center">
							<h3 id="post-title"><a href="{{ route('singlePost', ['slug' => $post->slug]) }}">{{$post->title}}</a></h3>
						</div>
						<p id="post-lign"></p>
				        <div class="col-xs-4 text-left" id="actions">
				        	<p id="likes">
				        		@if(!Auth::check())
								<a href="">
									<span class="icon ion-android-favorite-outline"></span>
									<span id="numbers">{{ $post->likes()->where('post_id', $post->id)->where('liked', true)->count() }}</span>
								</a>
								@else
									@if(Auth::user()->likes()->where('post_id', $post->id)->first())
										@if(Auth::user()->likes()->where('post_id', $post->id)->first()->liked == 1)
										<a href="{{ route('dislike', ['id' => $post->id]) }}" >
									      	<span class="icon ion-android-favorite" id="isLiked"></span>
									      	<span id="numbers">{{ $post->likes()->where('post_id', $post->id)->where('liked', true)->count() }}</span>
									    </a>
									    @else
									    <a href="{{ route('like', ['id' => $post->id]) }}" >
									      	<span class="icon ion-android-favorite-outline"></span>
									      	<span id="numbers">{{ $post->likes()->where('post_id', $post->id)->where('liked', true)->count() }}</span>
									    </a>
									    @endif
								    @else
									<a href="{{ route('like', ['id' => $post->id]) }}" >
								      	<span class="icon ion-android-favorite-outline"></span>
								      	<span id="numbers">{{ $post->likes()->where('post_id', $post->id)->where('liked', true)->count() }}</span>
								    </a>
								    @endif
								@endif
							</p>
				        </div>
				        <div class="col-xs-4 text-center">
				        	<p id="favorite">
				        		@if(!Auth::check())
								<a href="">
									<span class="icon ion-ios-star-outline"></span>
								</a>
								@else
									@if(Auth::user()->favorites()->where('post_id', $post->id)->first())
										@if(Auth::user()->favorites()->where('post_id', $post->id)->first()->favorite == 1)
										<a href="{{ route('notfavorite', ['id' => $post->id]) }}" >
									      	<span class="icon ion-ios-star"></span>
									    </a>
									    @else
									    <a href="{{ route('favorite', ['id' => $post->id]) }}" >
									      	<span class="icon ion-ios-star-outline"></span>
									    </a>
									    @endif
								    @else
									<a href="{{ route('favorite', ['id' => $post->id]) }}" >
								      	<span class="icon ion-ios-star-outline"></span>
								    </a>
								    @endif
								@endif
							</p>
				        </div>
				        <div class="col-xs-4 text-right" id="actions">
				        	<p id="comments">
								<a href="{{ route('singlePost', ['slug' => $post->slug]) }}">
									<span class="icon ion-ios-chatbubble-outline"></span><span id="comments-number">{{$post->comments()->count()}}</span>
								</a>
							</p>
				        </div>
				    </div>
			    </div>
			</div>
			@endforeach
		</div>
		<!-- End List posts -->
	</section>
	<!-- Navigation -->
	@include('public.includes.navigation')
	<!-- End Navigation -->

	@include('public.includes.search')
@endsection



