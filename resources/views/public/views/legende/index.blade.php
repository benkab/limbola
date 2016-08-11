@extends('welcome')

@section('title')
	L&eacute;gendes | Limbola - Magazine
@endsection

@section('content')
	<div class="row" id="page-background">
		<!-- Navbar -->
		@include('public.includes.navbar-2')
		<!-- End Navbar -->

		<!-- Page Header -->
		<div id="profile_header" class="row profile_header">
			<div class="container">
				<h3 class="text-left">Nos Légendes<br>
					<small>
						Des portraits d'entrepreneurs ou d'entreprises ayant du potentiel, source d'inspiration et influenceurs des générations.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dolorem ullam, sit dolorum deleniti culpa, 
						numquam nemo necessitatibus repellendus incidunt alias rerum praesentium ad a odio tempora quidem libero obcaecati!
					</small>
				</h3>
			</div>
		</div>
		<!-- End Page Header -->
		
		<!-- List posts -->
		<div id="legendes" class="container">
			<div class="col-xs-12">
				@foreach($legendes as $legende)
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" class="legende">
					<div class="thumbnail " id="legende-thumbnail">
						<img src="{{ URL::to('public/uploads/posts/').'/'.$legende->post->cover }}" alt="post-image" id="legende-img">
						<div class="caption">
						    <div id="caption-content">
						    	<div class="col-xs-12 text-right" id="social-networks">
									<div class="pull-left">
										<ul>
											<li>
								    			<a href=""><span class="icon ion-social-facebook" data-toggle="tooltip" data-placement="right" title="Partager sur Facebook"></span></a>
								    		</li>
								    		<li>
								    			<a href=""><span class="icon ion-social-twitter" data-toggle="tooltip" data-placement="right" title="Partager sur Twitter"></span></a>
								    		</li>
								    		<li>
								    			<a href=""><span class="icon ion-social-googleplus" data-toggle="tooltip" data-placement="right" title="Partager sur Google-Plus"></span></a>
								    		</li>
										</ul>
									</div>
						        	<small id="date"><span class="icon ion-ios-calendar-outline"></span>&nbsp;{{ date('d/m/Y', strtotime($legende->post->published_at)) }}</small>
								</div>
					    		<a href="{{ route('singleLegende', ['slug' => $legende->slug]) }}" id="slug">
					    			
					    			<p class="text-center" id="post-auther">
							    		<b>{{$legende->firstname}}&nbsp;{{$legende->lastname}}</b>
							    	</p>
							    	<p class="text-center" id="post-title">
							    		{{$legende->title}}
							    		<br>
							    		<span id="favorite">
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
										</span>
							    	</p>

					    		</a>
								 <p id="post-lign"></p>
						        <div class="col-xs-12 text-right" id="actions">
						        	<span id="likes">
						        		@if(!Auth::check())
										<a data-toggle="modal" data-target="#secondModal" id="identification-link">
											<span class="icon ion-android-favorite-outline" data-toggle="tooltip" data-placement="top" title="J'aime"></span>
											<span id="numbers">
												{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
											</span>
										</a>
										@else
											@if(Auth::user()->likes()->where('post_id', $legende->post->id)->first())
												@if(Auth::user()->likes()->where('post_id', $legende->post->id)->first()->liked == 1)
												<a href="{{ route('dislike', ['id' => $legende->post->id]) }}">
											      	<span class="icon ion-android-favorite" data-toggle="tooltip" data-placement="top" title="Je n'aime plus"></span>
											      	<span id="numbers">
											      		{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
											      	</span>
											    </a>
											    @else
											    <a href="{{ route('like', ['id' => $legende->post->id]) }}">
											      	<span class="icon ion-android-favorite-outline"  data-toggle="tooltip" data-placement="top" title="J'aime"></span>
											      	<span id="numbers">
											      		{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
											      	</span>
											    </a>
											    @endif
										    @else
											<a href="{{ route('like', ['id' => $legende->post->id]) }}">
										      	<span class="icon ion-android-favorite-outline"  data-toggle="tooltip" data-placement="top" title="J'aime" id="like"></span>
										      	<span id="numbers">
										      		{{ $legende->post->likes()->where('post_id', $legende->post->id)->where('liked', true)->count() }}
										      	</span>
										    </a>
										    @endif
										@endif
									</span>
						        	<span id="comments">
										<a href="{{ route('singleLegende', ['slug' => $legende->slug]) }}"> 
											<span class="icon ion-ios-chatbubble-outline"></span>
											<span id="comments-number">{{$legende->post->comments()->count()}}</span>
										</a>
									</span>
						        </div>
						    </div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<!-- End List posts -->

		

		<div id="paging" class="text-center">
			<small>{!! $legendes->render() !!}</small>
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

	@include('public.includes.search')
	@include('public.includes.identification-modal')
@endsection
