@extends('layouts.master')
@section('title')
 Sign Up
@endsection

@section('content')
<div class="panel panel-default" style="margin-top: -12px;">

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-6 col-md-offset-3">
                        <h3><b>Sign Up For Your Account</b></h3>
                        <form class="form-vertical" role="form" method="post" action="{{route('user.signup')}}">
                            <div class="form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
                                <label for="email" class="control-label">Your email address</label>
                                <input type="text" name="email" class="form-control" id="email" 
                                value="{{ Request::old('email') ?: '' }}" placeholder="Enter Your Email">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group{!! $errors->has('username') ? ' has-error' : '' !!}
                ">
                                <label for="username" class="control-label">Choose a username</label>
                                <input type="text" name="username" class="form-control" id="username" 
                                value="{{ Request::old('username') ?: '' }}" placeholder="Enter Your Username">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('username') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group{!! $errors->has('first_name') ? ' has-error' : '' !!}
                ">
                                <label for="first_name" class="control-label">Choose a first name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" 
                                value="{{ Request::old('first_name') ?: '' }}" placeholder="Enter Your First Name">
                                @if ($errors->has('first_name'))
                                <span class="help-block">
                                    {{ $errors->first('first_name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group{!! $errors->has('last_name') ? ' has-error' : '' !!}
                ">
                                <label for="last_name" class="control-label">Choose a lastname</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" 
                                value="{{ Request::old('last_name') ?: '' }}" placeholder="Enter Your Last Name">
                                @if ($errors->has('last_name'))
                                <span class="help-block">
                                    {{ $errors->first('last_name') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group{!! $errors->has('location') ? ' has-error' : '' !!}
                ">
                                <label for="location" class="control-label">Enter your location</label>
                                <input type="text" name="location" class="form-control" id="location" 
                                value="{{ Request::old('location') ?: '' }}" placeholder="Enter Your Location">
                                @if ($errors->has('location'))
                                <span class="help-block">
                                    {{ $errors->first('location') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group{!! $errors->has('password') ? ' has-error' : '' !!}">
                                <label for="password" class="control-label">Choose a password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Sign up</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>


    @include('partials.footer')  


</div>
@endsection