@extends('layouts.master')
@section('title')
 User Profile
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12 col-md-12 col-md-offset-0">

	    	<div class="panel panel-info">
				  <div class="panel-heading">
				    <h2 class="panel-title">{{ $user->username }}'s Profile</h2>
				  </div>
				  	<div class="row">
						<div class="col-md-8">
							@if (Session::has('profile'))
							<div class="alert alert-success" data-dismiss = "alert" role="alert">
							    {{ Session::get('profile') }}
							</div>
							@endif
						</div>									
					</div>
				  <div class="panel-body">
						<div class="row">
							<div class="col-md-3 userpanel-left">
								@include('partials.userleft')	
							</div>
							<div class="col-md-9 userpanel-right">
								<div class="row">
									<div class="col-md-2 user-image">
										<img src="/uploads/avatars/{{ $user->avatar }}" style="width: 90px;height: 90px;">
									</div>
									<div class="col-md-10 user-name">
										<h3 class="">{{ $user->firstname }} {{ $user->lastname }}</h3><p class="">{{ $user->email }}</p>
									</div>
								</div>
								<hr>
								<div class="row user-detail">
									<div class="col-md-6 col-md-6 col-md-offset-2">
										<p>User Name: {{ $user->username }}</p>
										<p>First Name: {{ $user->firstname }}</p>
										<p>Last Name: {{ $user->lastname }}</p>
										<p>Email: {{ $user->email }}</p>
										<p>Location: {{ $user->location }}</p>
									
							        </div>    
								</div>
								
							</div>

						</div>
				  </div>
				  <div class="panel-footer">{{ $user->location }}</div>
			</div>
	    </div>    
	</div>
@endsection	