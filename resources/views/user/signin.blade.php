@extends('layouts.master')
@section('title')
 Sign In
@endsection

@section('content')

<div class="panel panel-default" style="margin-top: -12px;">
	
			<br>
			<br>

	<div class="panel-body">
		<div class="row">
		    <div class="col-md-6 col-md-6 col-md-offset-3">
		    <h3><b>Sign In Your Account</b></h3>
		        <form class="form-vertical" role="form" method="post" action="{{ route('user.signin') }}">
		            <div class="form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
		                <label for="email" class="control-label">Email</label>
		                <input type="text" name="email" class="form-control" id="email"
		                value="{{ Request::old('email') ?: '' }}">
		                @if ($errors->has('email'))
		                <span class="help-block">
		                    {{ $errors->first('email') }}
		                </span>
		                @endif
		            </div>
		            <div class="form-group{!! $errors->has('password') ? ' has-error' : '' !!}">
		                <label for="password" class="control-label">Password</label>
		                <input type="password" name="password" class="form-control" id="password">
		                @if ($errors->has('password'))
		                <span class="help-block">
		                    {{ $errors->first('password') }}
		                </span>
		                @endif
		            </div>
		            <div class="checkbox">
		                <label>
		                    <input type="checkbox" name="remember"> Remember me
		                </label>
		            </div>
		            <div class="form-group">
		                <button type="submit" class="btn btn-info">Sign in</button>
		            </div>
		           <input type="hidden" name="_token" value="{{ Session::token() }}">
		        </form>
		        <p>Don't have any account? <a href="{{ route('user.signup') }}">Sign Up</a></p>
		    </div>
		</div>
	</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>


	@include('partials.footer')			

</div>	
@endsection	