<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 display-cell" id="content">
   <div class="row">
       <header id="nav-header" class="clearfix">
           <div class="col-xs-5">
               <a href="{{ route('home') }}" class="hidden-xs hidden-sm">
                   <img src="{{ URL::to('public/uploads/avatars/monlogo.jpg') }}" alt="logo" id="logo">
               </a>
               <a href="" id="nav-toggle" class="hidden-lg">
                 <span class="icon ion-navicon"></span>
               </a>
           </div>
           <div class="col-xs-7">
               <ul class="pull-right">
                   <li id="names">
                       <a href="{{ route('profile', ['id' => Auth::user()->id ]) }}" style="position:relative">
                           <img src="{{ URL::to('public/uploads/avatars/').'/'.Auth::user()->avatar }}" alt="user-image" id="user-avatar">
                           @if(Auth::user())
                            <span id="user-names">&nbsp;{{ Auth::user()->firstname . " " . Auth::user()->lastname}}</span>
                            @endif
                       </a>
                   </li>
                   <li id="deconnection">
                       <a href="{{ route('logout') }}">
                           <span class="glyphicon glyphicon-log-out"></span>
                           <span class="hidden-sm hidden-xs">&nbsp;Deconnexion</span>
                       </a>
                   </li>
               </ul>  
           </div>
       </header>
   </div>

