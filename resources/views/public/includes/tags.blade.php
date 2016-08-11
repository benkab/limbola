<div class="row" id="list_tags">
	<div class="container">
		<h3 class="text-center">Les mots cl&eacute;s. <small>un total regal</small></h3>
		<p id="lign-2"></p>
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			<ul id="the_tag">
				@foreach( $tags->lists('description') as $tag)
				<li><span>#</span><a href="">{{ $tag }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			<ul id="the_tag">
				@foreach( $tags->lists('description') as $tag)
				<li><span>#</span><a href="">{{ $tag }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			<ul id="the_tag">
				@foreach( $tags->lists('description') as $tag)
				<li><span>#</span><a href="">{{ $tag }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			<ul id="the_tag">
				@foreach( $tags->lists('description') as $tag)
				<li><span>#</span><a href="">{{ $tag }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			<ul id="the_tag">
				@foreach( $tags->lists('description') as $tag)
				<li><span>#</span><a href="">{{ $tag }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			<ul id="the_tag">
				@foreach( $tags->lists('description') as $tag)
				<li><span>#</span><a href="">{{ $tag }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>