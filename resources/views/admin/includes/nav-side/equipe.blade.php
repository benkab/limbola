<!-- nav-side -->
<div class="col-lg-2 hidden-md hidden-sm hidden-xs display-cell" id="nav-side">
    <ul>
        <li class="link">
            <a href="">
                <span class="icon ion-ios-keypad hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-ios-keypad hidden-lg"  data-toggle="tooltip" data-placement="right" title="Home" id="visible-on-small-device"></span>
                <span id="text" class="hidden-md hidden-sm hidden-xs">Home</span>
            </a>
        </li>
        <li class="link" id="accordion" role="tablist">
            <a role="tab" id="headingOne" ole="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span class="icon ion-ios-paper hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-ios-paper hidden-lg"  data-toggle="tooltip" data-placement="right" title="Articles" id="visible-on-small-device"></span>
                <span id="text">Articles</span>
                <small class="label label-default pull-right hidden-md hidden-sm hidden-xs">30</small>
            </a>
        </li>
        <ul id="collapseOne" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingOne">
            <li>
                <a href="{{ route('view_lymstyle_page') }}">LimStyle</a>
            </li>
            <li>
                <a href="{{ route('view_legendes_page') }}">Légendes</a>
            </li>
            <li>
                <a href="">Promotion</a>
            </li>
            <li>
                <a href="">LimCrush</a>
            </li>
        </ul>
        <li class="link active-link-2">
            <a href="{{ route('view_users') }}">
                <span class="icon ion-android-people hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-android-people hidden-lg"  data-toggle="tooltip" data-placement="right" title="L'Equipe" id="visible-on-small-device"></span>
                <span id="text" class="hidden-md hidden-sm hidden-xs">L'Equipe</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('view_visitors') }}">
                <span class="icon ion-ios-people hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-ios-people hidden-lg"  data-toggle="tooltip" data-placement="right" title="Visiteurs" id="visible-on-small-device"></span>
                <span id="text" class="hidden-md hidden-sm hidden-xs">Visiteurs</span>
                <small class="label label-default pull-right hidden-md hidden-sm hidden-xs">30</small>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('view_comments') }}">
                <span class="icon ion-chatbox-working hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-chatbox-working hidden-lg"  data-toggle="tooltip" data-placement="right" title="Commentaires" id="visible-on-small-device"></span>
                <span id="text" class="hidden-md hidden-sm hidden-xs">Commentaires</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('view_tags') }}">
                <span class="icon ion-link hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-link hidden-lg"  data-toggle="tooltip" data-placement="right" title="Mots cl&eacute;s" id="visible-on-small-device"></span>
                <span id="text" class="hidden-md hidden-sm hidden-xs">Mots cl&eacute;s</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('view_tasks') }}">
                <span class="icon ion-android-calendar hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-android-calendar hidden-lg"  data-toggle="tooltip" data-placement="right" title="Agenda" id="visible-on-small-device"></span>
                <span id="text" class="hidden-md hidden-sm hidden-xs">Agenda</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('profile', ['id' => Auth::user()->id ]) }}">
                <span class="icon ion-android-contact hidden-md hidden-xs hidden-sm"></span>
                <span class="icon ion-android-contact hidden-lg"  data-toggle="tooltip" data-placement="right" title="Mon profil" id="visible-on-small-device"></span>
                <span id="text" class="hidden-md hidden-sm hidden-xs">Mon profil</span>
            </a>
        </li>
    </ul>
</div>
<!-- End nav-side -->