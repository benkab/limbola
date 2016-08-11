@extends('welcome')

@section('content')
	@include('admin.includes.top-page')
	
	<!-- nav-side -->
	@include('admin.includes.nav-side.visitor')
	<!-- End nav-side -->

	@include('admin.includes.nav-header')

	<!-- Page Content -->
	<div class="row clearfix" id="page-content">
       <div class="row clearfix" id="tags">
       		<div class="col-xs-12">
       			<div class="panel panel-default" id="visitors">
       				<div class="panel-body">
						<h5>
							Les visiteurs
							<span class="icon ion-ios-people pull-right"></span>
						</h5>
						<p class="lign"></p>
						<table class="table">
							<tr>
								<td>Photo</td>
								<td>Pr&eacute;nom</td>
								<td class="hidden-xs hidden-sm">Nom</td>
								<td class="hidden-xs hidden-sm">Email</td>
								<td class="text-center">Status</td>
								<td class="text-center">Actions</td>
							</tr>
							@foreach($users as $user)
								@if($user->isVisitor())
								<tr>
									<td>&nbsp;&nbsp;<img src="{{ URL::to('public/uploads/avatars/').'/'.$user->avatar }}" alt="user-image" id="user-photo"></td>
									<td>&nbsp;&nbsp;{{ $user->firstname}} </td>
									<td class="hidden-xs hidden-sm">&nbsp;&nbsp;{{$user->lastname}}</td>
									<td class="hidden-xs hidden-sm">&nbsp;&nbsp;{{$user->email}}</td>
									@if($user->status == 1)
									<td class="text-center"><span class="label label-success">Actif</span></td>
									@else
									<td class="text-center"><span class="label label-default">Inactif</span></td>
									@endif
									<td class="text-center">
										@if($user->status == 0)
										<a href="{{ route('unblock', ['id' => $user->id]) }}" type="button" disabled data-toggle="tooltip" data-placement="top" title="Deblocker">
											<span class="icon ion-android-checkmark-circle"></span>
										</a>
										@else
										<a href="{{ route('block', ['id' => $user->id]) }}" type="button" disabled data-toggle="tooltip" data-placement="top" title="Blocker">
											<span class="icon ion-minus-circled"></span>
										</a>
										@endif
										<a href="{{ route('delete_User', ['id' => $user->id]) }}" type="button" disabled data-toggle="tooltip" data-placement="top" title="Supprimer">
											<span class="icon ion-android-delete"></span>
										</a>
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