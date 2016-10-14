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
									<div class="col-md-6 col-md-6 col-md-offset-0">
										<form class="form-vertical" role="form" method="post" action="{{ route('user.profile') }}" enctype="multipart/form-data">
										<input type="hidden" value="{{ csrf_token() }}" name="_token">
								            
								                <input type="file" name="avatar" class="form-control" id="avatar" style="padding-bottom: 4px;margin-bottom: 4px;">
								            
								            
								            	<button type="submit" class="btn btn-sm btn-info">Upload Image</button>
								            
							            </form>
							        </div>    
								</div>
								<hr>	
							</div>

						</div>
				  </div>
				  <div class="panel-footer">{{ $user->location }}</div>
			</div>
	    </div>    
	</div>
@endsection	