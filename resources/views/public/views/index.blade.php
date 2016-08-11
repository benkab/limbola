@extends('welcome')

@section('title')
	Accueil | Limbola - Magazine
@endsection

@section('content')
	<div class="row" id="page-background">
		<header>
			<nav class="navbar navbar-default">
			  <div class="container">
			    <div class="row">
			    	<div class="col-xs-3 text-left navbar-side">
			    		<a href="">
			    			<i class="icon ion-search"></i>
			    		</a>
			    	</div>
			    	<div class="col-xs-6 text-center">
			    		<a href="{{ route('home') }}" id="logo-container">
				            <img src="{{ URL::to('public/uploads/monlogo.jpg') }}" alt="logo" id="logo">
				        </a>
			    	</div>
			    	<div class="col-xs-3 text-right navbar-side">
			    		<ul class="social-networks">
							<li>
				    			<a href=""><span class="icon ion-social-facebook" id="social-networks" data-toggle="tooltip" data-placement="left" title="Partager sur Facebook"></span></a>
				    		</li>
				    		<li>
				    			<a href=""><span class="icon ion-social-twitter" id="social-networks" data-toggle="tooltip" data-placement="left" title="Partager sur Twitter"></span></a>
				    		</li>
				    		<li>
				    			<a href=""><span class="icon ion-social-googleplus" id="social-networks" data-toggle="tooltip" data-placement="left" title="Partager sur Google-Plus"></span></a>
				    		</li>
						</ul>
			    	</div>
			    </div>
			    <div class="row text-center navlinks">
			    	<ul>
			    		<li>
			    			<a href="" class="active-navlink">ACCUEIL</a>
			    		</li>
			    		<li>
			    			<a href="">LIMSTYLE</a>
			    		</li>
			    		<li>
			    			<a href="">LEGENDES</a>
			    		</li>
			    		<li>
			    			<a href="">LIMCRUSH</a>
			    		</li>
			    		<li>
			    			<a href="">PROMOTION</a>
			    		</li>
			    		<li>
			    			<a href="">LET'S TALK</a>
			    		</li>
			    		<li>
			    			<a href="">CONTACTS</a>
			    		</li>
			    	</ul>
			    </div>
			  </div><!-- /.container-fluid -->
			</nav>
		</header>
		<section class="first-group">
			<div class="container">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 first_header">
					<div class="thumbnail">
						<img src="{{ URL::to('public/2.jpg') }}" alt="post-image">
						<div class="thumbnail-text">
							<p class="postLinks text-left">
								<a href="">
									<i class="icon ion-android-more-vertical"></i>
								</a>

								<a href="">
									<i class="icon ion-ios-heart liked"></i>
								</a>
								<a href="">
									<i class="icon ion-ios-heart unliked"></i>
								</a>
								<small>22</small>
								<span class="pull-right">
									0 Commentaires
								</span>
							</p>
							<p class="type">LIMSTYLE</p>
							<p class="type-underlign"></p>
							<p class="title text-left">
								<a href="">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem veniam expedita 
									saepe.
								</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 timeline">
					<div class="thumbnail">
						<p class="popular">
							LES PLUS POPULAIRES
						</p>
						<div class="content">
							<ul>
								<li>
									<a href="">
										Lorem ipsum dolor sit amet,g elit. Fugiat similique quia 
									</a>
									<br>
									<small>7 hours ago</small>
								</li>
								<li>
									<a href="">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									</a>
									<br>
									<small>7 hours ago</small>
								</li>
								<li>
									<a href="">
										Yyeye t amet, consectetur adipisicing elit. Fugiat similique quia 
									</a>
									<br>
									<small>7 hours ago</small>
								</li>
								<li>
									<a href="">
										Lorem ipsum dolor sit amet,g elit. Fugiat similique quia 
									</a>
									<br>
									<small>7 hours ago</small>
								</li>
								<li>
									<a href="">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
									</a>
									<br>
									<small>7 hours ago</small>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="second-group">
			<div class="container">
				<div class="col-lg-4 col-md-4">
					<div class="thumbnail">
						<img src="{{ URL::to('public/4.jpg') }}" alt="post-image">
						<div class="thumbnail-text">
							<p class="postLinks text-left">
								<a href="">
									<i class="icon ion-android-more-vertical"></i>
								</a>

								<a href="">
									<i class="icon ion-ios-heart liked"></i>
								</a>
								<a href="">
									<i class="icon ion-ios-heart unliked"></i>
								</a>
								<small>22</small>
								<span class="pull-right">
									0 Commentaires
								</span>
							</p>
							<p class="type">LEGENDE</p>
							<p class="type-underlign"></p>
							<p class="legende-title text-left">
								<a href="">
									Beni Kabona.
								</a>
								<br>
								<small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </small>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="thumbnail">
						<img src="{{ URL::to('public/4.jpg') }}" alt="post-image">
						<div class="thumbnail-text">
							<p class="postLinks text-left">
								<a href="">
									<i class="icon ion-android-more-vertical"></i>
								</a>

								<a href="">
									<i class="icon ion-ios-heart liked"></i>
								</a>
								<a href="">
									<i class="icon ion-ios-heart unliked"></i>
								</a>
								<small>22</small>
								<span class="pull-right">
									0 Commentaires
								</span>
							</p>
							<p class="type">LEGENDE</p>
							<p class="type-underlign"></p>
							<p class="legende-title text-left">
								<a href="">
									Beni Kabona.
								</a>
								<br>
								<small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </small>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="thumbnail">
						<img src="{{ URL::to('public/4.jpg') }}" alt="post-image">
						<div class="thumbnail-text">
							<p class="postLinks text-left">
								<a href="">
									<i class="icon ion-android-more-vertical"></i>
								</a>

								<a href="">
									<i class="icon ion-ios-heart liked"></i>
								</a>
								<a href="">
									<i class="icon ion-ios-heart unliked"></i>
								</a>
								<small>22</small>
								<span class="pull-right">
									0 Commentaires
								</span>
							</p>
							<p class="type">LEGENDE</p>
							<p class="type-underlign"></p>
							<p class="legende-title text-left">
								<a href="">
									Beni Kabona.
								</a>
								<br>
								<small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="third-group">
			<div class="container">
				<div class="col-lg-3 col-md-3">
					<p class="video-title">
						Lorem ipsum dolor sit amet, consectetur adipisicing 
					</p>
					<div class="thumbnail">
						<img src="{{ URL::to('public/3.jpg') }}" alt="post-image">
					</div>
					<p class="video-description">
						<small class="pull-left">20 Vues
						</small>
						<small class="pull-right">10/09/2016</small>
					</p>
				</div>
				<div class="col-lg-3 col-md-3">
					<p class="video-title">
						Lorem ipsum dolor sit amet, consectetur adipisicing 
					</p>
					<div class="thumbnail">
						<img src="{{ URL::to('public/3.jpg') }}" alt="post-image">
					</div>
					<p class="video-description">
						<small class="pull-left">20 Vues
						</small>
						<small class="pull-right">10/09/2016</small>
					</p>
				</div>
				<div class="col-lg-3 col-md-3">
					<p class="video-title">
						Lorem ipsum dolor sit amet, consectetur adipisicing 
					</p>
					<div class="thumbnail">
						<img src="{{ URL::to('public/3.jpg') }}" alt="post-image">
					</div>
					<p class="video-description">
						<small class="pull-left">20 Vues
						</small>
						<small class="pull-right">10/09/2016</small>
					</p>
				</div>
				<div class="col-lg-3 col-md-3">
					<p class="video-title">
						Lorem ipsum dolor sit amet, consectetur adipisicing 
					</p>
					<div class="thumbnail">
						<img src="{{ URL::to('public/3.jpg') }}" alt="post-image">
					</div>
					<p class="video-description">
						<small class="pull-left">20 Vues
						</small>
						<small class="pull-right">10/09/2016</small>
					</p>
				</div>
			</div>
		</section>
	</div>
@endsection
