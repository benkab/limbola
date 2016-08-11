<nav class="navbar navbar-default navbar-2">
  <div class="container">
    <div class="navbar-header">
    	<a href="{{ route('home') }}" id="logo-container">
            <img src="{{ URL::to('public/uploads/logo.jpg') }}" alt="logo" id="logo">
        </a>
    </div>

    <ul class="nav navbar-nav navbar-right hidden-md hidden-sm hidden-xs">
        <li>
            <a href="" id="search">
                <span class="icon ion-android-search"></span>
            </a>
        </li>
        <li><a href="{{ route('home') }}" class="active-link">Accueil</a></li>
        <li><a href="{{ route('legende') }}">L&eacute;gendes</a></li>
        <li><a href="{{ route('lymstyles') }}">LimStyle</a></li>
        <li>
          <a href="">LimCrush&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="">Promotion</a></li>
            <li><a href="">Let's Talk</a></li>
            <li><a href="">Focus</a></li>
          </ul>
        </li>
        <li><a href="{{ route('contacts') }}">Qui sommes - nous ?</a></li>
    </ul>

    <div class="mobile hidden-lg">
        <ul class="text-right">
            <li>
                <a href="" id="search">
                    <span class="icon ion-android-search"></span>
                </a>
            </li>
            <li id="menu">
                <a>
                    <span id="menu-text">MENU</span>
                    <span class="icon ion-navicon"></span>
                </a>
            </li>
        </ul>
    </div>
  </div><!-- /.container-fluid -->
</nav>

<!-- FULLSCREEN MODAL CODE (.fullscreen) -->
    <div class="modal fade fullscreen" id="menuModal"  tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="color:#fff;">
                <div class="modal-header" style="border:0;">
                        <button type="button" class="close btn btn-link" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close fa-lg" style="color:#999;"></i></button> 
                        <h4 class="modal-title text-center"><span class="sr-only">main navigation</span></h4>
                </div>
                <div class="modal-body text-center">
                    <ul style="list-style-type:none;">
                        <li><a href="#" class="big">Hello</a></li>
                        <li><a href="#" class="big">A Menu Item</a></li>
                        <li><a href="#" class="big">Another Item</a></li>
                        <li><a href="#" class="big">This One Too!!</a></li>
                        <li><a href="http://meagency.com" class="big">me.agency</a></li>
                    </ul>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.fullscreen -->
