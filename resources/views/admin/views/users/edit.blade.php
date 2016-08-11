@extends('welcome')

@section('content')
	@include('admin.includes.top-page')
	
	<!-- nav-side -->
	@include('admin.includes.nav-side.equipe')
	<!-- End nav-side -->

	@include('admin.includes.nav-header')

	<!-- Page Content -->
	<div class="row clearfix" id="page-content">
       <div class="row clearfix" id="users">
       		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
       			<div class="panel panel-default">
       				<div class="panel-body">
						<h5>
							Mettre &agrave; jour l'agent
							<span class="icon ion-android-contact pull-right"></span>
						</h5>
						<p class="lign"></p>
						<form class="form-vertical" action="{{ route('post_edit_user_role', ['id' => $user_edit->id]) }}" method="Post" role="form">
							<div class="form-group">
								<p class="label label-default"  id="user-to-edit">{{ $user_edit->firstname }}&nbsp;{{ $user_edit->lastname }}</p>
								<br>
							</div>
							<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
						  		<select name="role[]" class="form-control">
						  			<option value="" disabled selected>Selectioner un role</option>
						  			@foreach($roles as $role)
									<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
								</select>
								@if ($errors->has('role'))
						            <span class="help-block">{{ $errors->first('role') }}</span>
						        @endif
						  	</div>

							<button class="btn btn-sm btn-default">Soumettre</button>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</form>
       				</div>
       			</div>
       		</div>
       		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
       			<div class="panel panel-default" id="panel-with-paging">
       				<div class="panel-body">
						<h5>
							Tous les agents
							<span class="icon ion-android-list pull-right"></span>
						</h5>
						<p class="lign"></p>

						<table class="table">
							<tr>
								<td>Photo</td>
								<td>Pr&eacute;nom</td>
								<td class="hidden-xs hidden-sm">Nom</td>
								<td class="hidden-xs hidden-sm">Email</td>
								<td class="text-center">Role</td>
								<td class="text-center">Actions</td>
							</tr>
							@foreach($users as $user)
								@if(!$user->isVisitor())
								<tr>
									<td>&nbsp;&nbsp;<img src="{{ URL::to('public/uploads/avatars/').'/'.$user->avatar }}" alt="user-image" id="user-photo"></td>
									<td>&nbsp;&nbsp;{{ $user->firstname}} </td>
									<td class="hidden-xs hidden-sm">&nbsp;&nbsp;{{$user->lastname}}</td>
									<td class="hidden-xs hidden-sm">&nbsp;&nbsp;{{$user->email}}</td>
									@foreach( $user->roles->lists('name') as $role)
									<td class="text-center">{{$role}}</td>
									@endforeach
									<td class="text-center">
										@if($user->id == Auth::user()->id)
											<a href="{{ route('profile', ['id' => Auth::user()->id ]) }}" type="button" disabled data-toggle="tooltip" data-placement="top" title="Editer">
												<span class="icon ion-edit"></span>
											</a>
										@else
											<a href="{{ route('edit_user_role', ['id' => $user->id ]) }}" type="button" disabled data-toggle="tooltip" data-placement="top" title="Editer">
												<span class="icon ion-edit"></span>
											</a>
										@endif
										@if(Auth::user()->email !== $user->email)
										<a href="{{ route('delete_User', ['id' => $user->id]) }}" type="button" data-toggle="tooltip" data-placement="top" title="Supprimer">
											<span class="icon ion-trash-b"></span>
										</a>
										@endif
									</td>
								</tr>
								@endif
							@endforeach
						</table>
						<hr>
						<small id="render">{!! $users->render() !!}</small>

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