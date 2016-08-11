@extends('welcome')

@section('title')
	Mon profile | Limbola - Magazine
@endsection

@section('content')
	<div class="row" id="page-background">
		<!-- Navbar -->
		@include('public.includes.navbar-2')
		<!-- End Navbar -->

		<!-- Page Header -->
		<div id="profile_header" class="row profile_header">
			<h3 class="text-center">Mon Profile. <br><small>un total regal</small></h3>
			<p id="lign-2"></p>
		</div>
		<!-- End Page Header -->
		
		<div class="row section" id="profile">
			<div class="container">
				<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12" id="visitor-login">
					<div class="panel panel-default">
						<div class="row" id="profile-info">
							<h5 id="title">
								Changer ma photo de profil
								<span class="icon ion-key pull-right"></span>
								<p class="lign"></p>
							</h5>
							
							<div class="col-xs-12 text-center">
								@if((Auth::user()) && (Auth::user()->avatar !== 'default.jpg'))
								<a href="{{ route('visitor_profile', ['id' => Auth::user()->id])}}">
									<img src="{{ URL::to('public/uploads/avatars/').'/'.Auth::user()->avatar }}" alt="user-image" id="profile-avatar">
								</a>
						        @endif
								<p>
									<b>
										{{ Auth::user()->firstname . " " . Auth::user()->lastname}}
									</b>
									<br>
									<small>Membre depuis {{ date('m/Y', strtotime(Auth::user()->created_at)) }}</small>
								</p>
								<br>
							</div>
						</div>
						
								<form class="form-vertical" action="{{route('upload_profile')}}" method="Post" role="form" enctype="multipart/form-data">
			
										<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
											<input type="file" name="avatar" accept=".png, .jpg" id="user-profile-input-image">
											@if ($errors->has('avatar'))
									        <span class="help-block">{{ $errors->first('avatar') }}</span>
									        @endif
										</div>
						
									
									<button class="btn btn-sm btn-info">Soumettre</button>
									<input type="hidden" name="_token" value="{{ Session::token() }}">
								</form>
	
						
					</div>

				</div>
				<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
					<div class="panel panel-default">
						<div class="row" id="profile-info">
							<h5 id="title">
								Mettre a jour mon profil
								<span class="icon ion-android-contact pull-right"></span>
								<p class="lign"></p>
							</h5>
						</div>
						<form class="form-vertical" action="{{ route('profile_update') }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('Prenom') ? ' has-error' : '' }}">
								<input type="text" name="Prenom" id="Prenom" class="form-control" placeholder="Pr&eacute;nom" value="{{ Request::old('Prenom') ?: Auth::user()->firstname }}">
								@if ($errors->has('Prenom'))
						        <span class="help-block">{{ $errors->first('Prenom') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }}">
								<input type="text" name="Nom" id="Nom" class="form-control" placeholder="Nom" value="{{ Request::old('Nom') ?: Auth::user()->lastname }}">
								@if ($errors->has('Nom'))
						        <span class="help-block">{{ $errors->first('Nom') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" name="email" id="email" class="form-control" placeholder="Addresse email" value="{{ Request::old('email') ?: Auth::user()->email }}">
								@if ($errors->has('email'))
						        <span class="help-block">{{ $errors->first('email') }}</span>
						        @endif
							</div>
							<small class="pull-right motdepasseoublie"><a data-toggle="modal" data-target="#thirdModal">Supprimer mon compte</a></small>
							<button class="btn btn-sm btn-info">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
						<!-- Modal -->
						<div class="modal fade" id="thirdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-body">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="row">
										<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-xs-12 col-sm-12 text-center">
											<h5><b>Supprimer mon compte</b></h5>
											<p id="lign-2"></p>
											<a href="{{route('delete_account')}}" type="button" class="btn btn-sm btn-info">Supprimer</a>
										</div>
									</div>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Page Header -->
		<!-- <div id="profile_header" class="row">
			<h3 class="text-center">Mes lymstyles favorites. <br><small>un total regal</small></h3>
			<p id="lign-2"></p>
		</div> -->
		<!-- End Page Header -->
		
			<!-- Nothing to display -->
			<!-- <div class="col-xs-12 text-center" id="NothingToDisplay">
				<p><b><span class="icon ion-load-c"></span>&nbsp;&nbsp;Vous n'avez pas encore ajout&eacute; de Lymstyle &agrave; vos favories</b></p>
				<br>
			</div> -->
			<!-- End Nothing to display -->

			<!-- <div class="row text-center" id="loadMore">
				<a href="{{ route('lymstyles') }}">
					<span id="text">Ajouter les lymstyles</span>
				</a>
			</div> -->

		<!-- List lymstyles -->
		<!-- <div id="view_posts" class="section">
			<div class="container">
				@foreach($lymstyles as $lymstyle)
					@if(Auth::user()->favorites()->where('post_id', $lymstyle->post->id)->where('favorite', true)->first())
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="thumbnail">
							<img src="{{ URL::to('../public/uploads/posts/').'/'.$lymstyle->post->cover }}" alt="post-image">
							<div class="caption">
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
						        	<small id="date"><span class="icon ion-ios-calendar-outline"></span>&nbsp;{{ date('d/m/Y', strtotime($lymstyle->post->published_at)) }}</small>
								</div>
								<div id="post-title-container" class="text-center">
									<h3 id="post-title">
										<a href="{{ route('singleLymstyle', ['slug' => $lymstyle->slug]) }}"  data-toggle="tooltip" data-placement="bottom" title="Lire l'article">
											{{ str_limit($lymstyle->title, $limit = 60, $end= '...')}}
										</a>
										<br>
										<span id="favorite">
							        		@if(!Auth::check())
											<a href="" data-toggle="tooltip" data-placement="bottom" title="Ajouter &agrave; mes favories">
												<span class="icon ion-ios-star-outline"></span>
											</a>
											@else
												@if(Auth::user()->favorites()->where('post_id', $lymstyle->post->id)->first())
													@if(Auth::user()->favorites()->where('post_id', $lymstyle->post->id)->first()->favorite == 1)
													<a href="{{ route('notfavorite', ['id' => $lymstyle->post->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Retirer de mes favories">
												      	<span class="icon ion-ios-star"></span>
												    </a>
												    @else
												    <a href="{{ route('favorite', ['id' => $lymstyle->post->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Ajouter &agrave; mes favories">
												      	<span class="icon ion-ios-star-outline"></span>
												    </a>
												    @endif
											    @else
												<a href="{{ route('favorite', ['id' => $lymstyle->post->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Ajouter &agrave; mes favories">
											      	<span class="icon ion-ios-star-outline"></span>
											    </a>
											    @endif
											@endif
										</span>
									</h3>
								</div>
								<p id="post-lign"></p>
						        <div class="col-xs-12 text-right" id="actions">
						        	<span id="likes">
						        		@if(!Auth::check())
										<a href="">
											<span class="icon ion-android-favorite-outline" data-toggle="tooltip" data-placement="top" title="J'aime"></span>
											<span id="numbers">
												{{ $lymstyle->post->likes()->where('post_id', $lymstyle->post->id)->where('liked', true)->count() }}
											</span>
										</a>
										@else
											@if(Auth::user()->likes()->where('post_id', $lymstyle->post->id)->first())
												@if(Auth::user()->likes()->where('post_id', $lymstyle->post->id)->first()->liked == 1)
												<a href="{{ route('dislike', ['id' => $lymstyle->post->id]) }}">
											      	<span class="icon ion-android-favorite" data-toggle="tooltip" data-placement="top" title="Je n'aime plus"></span>
											      	<span id="numbers">
											      		{{ $lymstyle->post->likes()->where('post_id', $lymstyle->post->id)->where('liked', true)->count() }}
											      	</span>
											    </a>
											    @else
											    <a href="{{ route('like', ['id' => $lymstyle->post->id]) }}">
											      	<span class="icon ion-android-favorite-outline"  data-toggle="tooltip" data-placement="top" title="J'aime"></span>
											      	<span id="numbers">
											      		{{ $lymstyle->post->likes()->where('post_id', $lymstyle->post->id)->where('liked', true)->count() }}
											      	</span>
											    </a>
											    @endif
										    @else
											<a href="{{ route('like', ['id' => $lymstyle->post->id]) }}">
										      	<span class="icon ion-android-favorite-outline"  data-toggle="tooltip" data-placement="top" title="J'aime" id="like"></span>
										      	<span id="numbers">
										      		{{ $lymstyle->post->likes()->where('post_id', $lymstyle->post->id)->where('liked', true)->count() }}
										      	</span>
										    </a>
										    @endif
										@endif
									</span>
						        	<span id="comments">
										<a href="{{ route('singleLymstyle', ['slug' => $lymstyle->slug]) }}"> 
											<span class="icon ion-ios-chatbubble-outline"></span>
											<span id="comments-number">{{$lymstyle->post->comments()->count()}}</span>
										</a>
									</span>
						        </div>
						    </div>
					    </div>
					</div>
					@endif
				@endforeach
			</div>
		</div> -->
		<!-- End List posts -->

		<!-- Page Header -->
		<!-- <div id="profile_header" class="row">
			<h3 class="text-center">Mes L&eacute;gendes favorites. <br><small>un total regal</small></h3>
			<p id="lign-2"></p>
		</div> -->
		<!-- End Page Header -->

		<!-- Nothing to display -->
		<!-- <div class="col-xs-12 text-center" id="NothingToDisplay">
			<p><b><span class="icon ion-load-c"></span>&nbsp;&nbsp;Vous n'avez pas encore ajout&eacute; de L&eacute;gende &agrave; vos favories</b></p>
			<br>
		</div> -->
		<!-- End Nothing to display -->

		<!-- <div class="row text-center" id="loadMore">
			<a href="{{ route('legende') }}">
				<span id="text">Ajouter les l&eacute;gendes</span>
			</a>
		</div> -->

		<!-- List posts -->
		<!-- <div id="legendes" class="section">
			<div class="container">
				@foreach($legendes as $legende)
					@if(Auth::user()->favorites()->where('post_id', $legende->post->id)->where('favorite', true)->first())
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" class="legende">
						<div class="thumbnail " id="legende-thumbnail">
							<img src="{{ URL::to('../public/uploads/posts/').'/'.$legende->post->cover }}" alt="post-image" id="legende-img">
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
												<a href="" data-toggle="tooltip" data-placement="top" title="Ajouter &agrave; mes favories">
													<span class="icon ion-ios-star-outline"></span>
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
											<a href="">
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
					@endif
				@endforeach
			</div>
		</div> -->
		<!-- End List posts -->

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
@endsection