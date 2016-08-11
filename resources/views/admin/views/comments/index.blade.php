@extends('welcome')

@section('content')
	@include('admin.includes.top-page')

	<!-- nav-side -->
	@include('admin.includes.nav-side.comment')
	<!-- End nav-side -->

	@include('admin.includes.nav-header')

	<!-- Page Content -->
	<div class="row clearfix" id="page-content">
       <div class="row clearfix" id="tags">
       		<div class="col-xs-12">
       			<div class="panel panel-default" id="comments">
       				<div class="panel-body">
						<h5>
							Les commentaires
							<span class="icon ion-chatbox-working pull-right"></span>
						</h5>
						<p class="lign"></p>
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active">
						    	<a href="#all" aria-controls="all" role="tab" data-toggle="tab" id="tab_links">
						    		<span>Commentaires en ligne</span>
						    		<span>&nbsp;</span>
						    		<span class="icon ion-android-checkmark-circle"></span>
						    	</a>
						    </li>
						    <li role="presentation">
						    	<a href="#approved" aria-controls="approved" role="tab" data-toggle="tab" id="tab_links">
						    		<span>Commentaires signal&eacute;s<span>
						    		<span>&nbsp;</span>
						    		<span class="icon ion-flag"></span>
						    	</a>
						    </li>
						    <li role="presentation">
						    	<a href="#blocked" aria-controls="blocked" role="tab" data-toggle="tab" id="tab_links">
						    		<span>Commentaires block&eacute;s<span>
						    		<span>&nbsp;</span>
						    		<span class="icon ion-ios-minus"></span>
						    	</a>
						    </li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="all">
								@foreach($comments as $comment)
							    	<div class="row comment-row">
						              <div class="col-xs-12 col-sm-12 col-md-12">
						                <div class="row">
						                  <div class="col-xs-9 col-sm-10 col-md-9">
						                    <b>{{$comment->user->firstname}}&nbsp;{{$comment->user->lastname}}</b> a publi&eacute; dans 
						                    @if($comment->post->lymstyle)
											<b>{{$comment->post->lymstyle->title}}</b>
						                    @elseif($comment->post->legende)
											<b>{{$comment->post->legende->firstname}}&nbsp;{{$comment->post->legende->lastname}}</b> - {{$comment->post->legende->title}}
						                    @endif
						                    <br>
											<span class="icon ion-calendar"></span><small>{{ date('d/M/Y', strtotime($comment->created_at)) }}</small>
						                  </div>
						                  <div class="col-xs-3 col-sm-2 col-md-3">
						                    <div class="clearfix">
						                      <div class="pull-right comment-difftime">
						                        {{$comment->created_at->diffForHumans()}}
						                      </div>
						                    </div>
						                  </div>
						                </div>
						                <div class="row">
						                	<div class="user-image col-lg-1 hidden-md hidden-xs hidden-sm text-left">
						                		<img src="{{ URL::to('public/uploads/avatars/').'/'.$comment->user->avatar }}">
						                	</div>
						                	<div class="well well-sm comment-well col-lg-11 col-md-12 col-xs-12 col-sm-12">
							                  	{{$comment->body}}
							                </div>
						                </div>
						                <div class="clearfix">
						                  <div class="text-right" id="actions">
						                    <a href="{{ route('report_comment', ['id' => $comment->id]) }}" data-toggle="tooltip" data-placement="top" title="Signaler">
						                      <span class="icon ion-flag"></span> 
						                    </a>
						                    <a href="{{ route('block_comment', ['id' => $comment->id]) }}" data-toggle="tooltip" data-placement="top" title="Bloquer">
						                      <span class="icon ion-ios-minus"></span> 
						                    </a>
						                  </div>
						                </div>
						                <hr>
						              </div>
						            </div>
								@endforeach
								<div class="row text-center">
					            	{!! $comments->render() !!}
					            </div>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="approved">
					            @foreach($reported as $comment)
								    <div class="row comment-row">
							            <div class="col-xs-12 col-sm-12 col-md-12">
							                <div class="row">
							                  <div class="col-xs-9 col-sm-10 col-md-9">
							                    <b>{{$comment->user->firstname}}&nbsp;{{$comment->user->lastname}}</b> a publi&eacute; dans 
							                    @if($comment->post->lymstyle)
												<b>{{$comment->post->lymstyle->title}}</b>
							                    @elseif($comment->post->legende)
												<b>{{$comment->post->legende->firstname}}&nbsp;{{$comment->post->legende->lastname}}</b> - {{$comment->post->legende->title}}
							                    @endif
							                    <br>
							                    <span class="icon ion-calendar"></span><small>{{ date('d/M/Y', strtotime($comment->created_at)) }}</small>
							                  </div>
							                  <div class="col-xs-3 col-sm-2 col-md-3">
							                    <div class="clearfix">
							                      <div class="pull-right comment-difftime">
							                        {{$comment->created_at->diffForHumans()}}
							                      </div>
							                    </div>
							                  </div>
							                </div>
								            <div class="row">
							                	<div class="user-image col-lg-1 hidden-md hidden-xs hidden-sm text-left">
							                		<img src="{{ URL::to('public/uploads/avatars/').'/'.$comment->user->avatar }}">
							                	</div>
							                	<div class="well well-sm comment-well col-lg-11 col-md-12 col-xs-12 col-sm-12">
								                  	{{$comment->body}}
								                </div>
							                </div>
							                <div class="clearfix">
							                  <div class="text-right" id="actions">
							                    <a href="{{ route('block_comment', ['id' => $comment->id]) }}" data-toggle="tooltip" data-placement="top" title="Bloquer">
							                      <span class="icon ion-ios-minus"></span> 
							                    </a>
							                    <a href="{{ route('delete_comment', ['id' => $comment->id]) }}" data-toggle="tooltip" data-placement="top" title="Supprimer">
							                      <span class="icon ion-android-delete"></span> 
							                    </a>
							                  </div>
							                </div>
											<hr>
										</div>
						            </div>
								@endforeach
						    </div>
						    <div role="tabpanel" class="tab-pane" id="blocked">
						    	@foreach($blocked as $comment)
							    	<div class="row comment-row">
						              <div class="col-xs-12 col-sm-12 col-md-12">
											<div class="row">
							                  	<div class="col-xs-9 col-sm-10 col-md-9">
								                    <b>{{$comment->user->firstname}}&nbsp;{{$comment->user->lastname}}</b> a publi&eacute; dans 
								                    @if($comment->post->lymstyle)
													<b>{{$comment->post->lymstyle->title}}</a></b>
								                    @elseif($comment->post->legende)
													<b>{{$comment->post->legende->firstname}}&nbsp;{{$comment->post->legende->lastname}}</b> - {{$comment->post->legende->title}}
								                    @endif
								                    <br>
								                    <span class="icon ion-calendar"></span><small>{{ date('d/M/Y', strtotime($comment->created_at)) }}</small>
							                  	</div>
								                  <div class="col-xs-3 col-sm-2 col-md-3">
								                    <div class="clearfix">
								                      <div class="pull-right comment-difftime">
								                        {{$comment->created_at->diffForHumans()}}
								                      </div>
								                    </div>
								                  </div>
							                </div>
								            <div class="row">
							                	<div class="user-image col-lg-1 hidden-md hidden-xs hidden-sm text-left">
							                		<img src="{{ URL::to('public/uploads/avatars/').'/'.$comment->user->avatar }}">
							                	</div>
							                	<div class="well well-sm comment-well col-lg-11 col-md-12 col-xs-12 col-sm-12">
								                  	{{$comment->body}}
								                </div>
							                </div>
							                <div class="clearfix">
							                  <div class="text-right" id="actions">
							                    <a href="{{ route('unblock_comment', ['id' => $comment->id]) }}" data-toggle="tooltip" data-placement="top" title="Reapprouver">
							                      <span class="icon ion-android-checkmark-circle"></span> 
							                    </a>
							                    <a href="{{ route('delete_comment', ['id' => $comment->id]) }}" data-toggle="tooltip" data-placement="top" title="Supprimer">
							                      <span class="icon ion-android-delete"></span> 
							                    </a>
							                  </div>
							                </div>
							                <hr>
						              </div>
						            </div>
						        @endforeach
							</div>		
	       				</div>
	       			</div>
	       		</div>
       		</div>
       </div>
       <div class="row">
       		<p id="hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi dicta illo ad a, quas numquam, eius perspiciatis amet eos possimus dolor! 
		       	Magnam temporibus dolore ullam consectetur distinctio minus elit. Sequi dicta illo ad a, quas numquam, eius perspiciatis amet eos p
		    </p>
       </div>
       
    </div>
	<!-- End Page Content -->

	@include('admin.includes.bottom-page')
@endsection