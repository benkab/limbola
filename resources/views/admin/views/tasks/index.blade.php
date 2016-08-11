@extends('welcome')

@section('content')
	@include('admin.includes.top-page')
	
	<!-- nav-side -->
	@include('admin.includes.nav-side.agenda')
	<!-- End nav-side -->
	
	@include('admin.includes.nav-header')

	<!-- Page Content -->
	<div class="row clearfix" id="page-content">
       <div class="row clearfix" id="tags">
       		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
       			<div class="panel panel-default">
       				<div class="panel-body">
						<h5>
							Nouvelle t&acirc;che
							<span class="icon ion-android-calendar pull-right"></span>
						</h5>
						<p class="lign"></p>
						<form class="form-vertical" action="{{ route('post_task') }}" method="Post" role="form">
							<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
								<textarea rows="3" name="description" class="form-control" placeholder="T&acirc;che" value="{{ Request::old('description') }}"></textarea>
								@if ($errors->has('description'))
						        <span class="help-block">{{ $errors->first('description') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
								<input type="date" name="date" id="date" class="form-control" placeholder="Date" value="{{ Request::old('date') }}">
								@if ($errors->has('date'))
						        <span class="help-block">{{ $errors->first('date') }}</span>
						        @endif
							</div>
							<div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
								<input type="time" name="time" id="time" class="form-control" placeholder="Heure" value="{{ Request::old('time') }}">
								@if ($errors->has('time'))
						        <span class="help-block">{{ $errors->first('time') }}</span>
						        @endif
							</div>
							<div class="checkbox">
							    <label>
							      <input type="checkbox" name="type" value="true"> Urgent
							    </label>
							</div>

							<button class="btn btn-sm btn-default">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
								
       				</div>
       			</div>
       		</div>
       		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
       			<div class="panel panel-default" id="tasks">
       				<div class="panel-body">
						<h5>
							Urgents
							<span class="icon ion-alert pull-right"></span>
						</h5>
						<p class="lign"></p>
						@foreach($tasks as $task)
							@if($task->type == 1 && (Auth::user()->id === $task->user_id))
							<div class="col-xs-9 text-left">
								<span id="description">{{ $task->description }}</span>
								<br>
								<span>Pour le <b>{{$task->date}}</b>&nbsp;</span>
								@if($task->time !== '00:00:00')
									<b><span> &acirc; &nbsp;{{$task->time}}</span></b>
								@endif
								<hr>
							</div>
							<div class="col-xs-3 text-right">
								<a href="{{ route('edit_task', ['id' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Editer">
									<span class="icon ion-edit"></span>
								</a>
								<a href="{{ route('delete_task', ['id' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Supprimer">
									<span class="icon ion-trash-b"></span>
								</a>
								<a href="{{ route('set_as_secondaire', ['id' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Marquer comme secondaire">
									<span class="icon ion-android-arrow-forward"></span>
								</a>
								<br>
								<span class="label label-danger">Urgent</span>
							</div>
							
							@endif
						@endforeach		
       				</div>
       			</div>
       		</div>
       		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
       			<div class="panel panel-default" id="tasks">
       				<div class="panel-body">
						<h5>
							Secondaires
							<span class="icon ion-ios-list pull-right"></span>
						</h5>
						<p class="lign"></p>
						@foreach($tasks as $task)
							@if($task->type == 0 && (Auth::user()->id === $task->user_id))
							<div class="col-xs-9 text-left">
								<span id="description">{{ $task->description }}</span>
								<br>
								<span>Pour le <b>{{$task->date}}</b>&nbsp;</span>
								@if($task->time !== '00:00:00')
									<b><span> &acirc; &nbsp;{{$task->time}}</span></b>
								@endif
								<hr>
							</div>
							<div class="col-xs-3 text-right">
								<a href="{{ route('edit_task', ['id' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Editer">
									<span class="icon ion-edit"></span>
								</a>
								<a href="{{ route('delete_task', ['id' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Supprimer">
									<span class="icon ion-trash-b"></span>
								</a>
								<a href="{{ route('set_as_urgent', ['id' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Marquer comme urgent">
									<span class="icon ion-android-arrow-back"></span>
								</a>
								<br>
								<span class="label label-default">Secondaire</span>
							</div>
							
							@endif
						@endforeach				
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