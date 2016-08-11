<div class="menu-navigation">
	<div class="row" id="icons">
		<div class="col-xs-6 text-left">
			<ul id="social-networkss">
				<li>
	    			<a href=""><span class="icon ion-social-facebook" id="social-networks" data-toggle="tooltip" data-placement="bottom" title="Partager sur Facebook"></span></a>
	    		</li>
	    		<li>
	    			<a href=""><span class="icon ion-social-twitter" id="social-networks" data-toggle="tooltip" data-placement="bottom" title="Partager sur Twitter"></span></a>
	    		</li>
	    		<li>
	    			<a href=""><span class="icon ion-social-googleplus" id="social-networks" data-toggle="tooltip" data-placement="bottom" title="Partager sur Google-Plus"></span></a>
	    		</li>
			</ul>
		</div>
		<div class="col-xs-6">
			<a href="" id="close-menu" class="pull-right">
				<span class="icon ion-ios-close-empty"></span>
			</a>
		</div>
	</div>
	<div class="row text-center">
		@if(Auth::user())
		<a href="{{ route('visitor_profile', ['id' => Auth::user()->id])}}" data-toggle="tooltip" data-placement="right" title="Voir mon profil">
			<img src="{{ URL::to('public/uploads/avatars/').'/'.Auth::user()->avatar }}" alt="user-image" id="visitor-avatar">
		</a>
        <p id="user-names">
        	{{ Auth::user()->firstname . " " . Auth::user()->lastname}}
        	<a href="{{route('logout_visitor')}}" id="logout">
				<span class="glyphicon glyphicon-log-out" data-toggle="tooltip" data-placement="right" title="D&eacute;connexion"></span>
			</a>
        </p>
        @endif
        <p id="lign-2"></p>
        @if(Auth::check())
            @if(Auth::user()->isAdmin() || Auth::user()->isRedactor())
            <div class="row text-center" id="admin-link">
                <a href="{{ route('view_lymstyle_page') }}">Admin</a>
            </div>
            @endif
        @endif
        <ul id="links">
        	<li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('legende') }}">L&eacute;gendes</a></li>
            <li><a href="{{ route('lymstyles') }}">LimStyle</a></li>
            <li><a>LimCrush&nbsp;<span class="caret"></span></a></li>
                <ul class="sub-menu">
                    <li><a href="" id="sub-menu-link">Promotion</a></li>
                    <li><a href="" id="sub-menu-link">Let's Talk</a></li>
                    <li><a href="" id="sub-menu-link">Focus</a></li>
                </ul>
            <li><a href="{{ route('contacts') }}">Qui sommes - nous ?</a></li>
        </ul>
        <p id="lign-2"></p>
	</div>
    
</div>