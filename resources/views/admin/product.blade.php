@extends('layouts.master')
@section('title')
 Admin
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12 col-md-12 col-md-offset-0">
			<div class="panel panel-info">
				<div class="panel-heading">
				    <h2 class="panel-title">Create Product</h2>
				</div>
				<div class="panel-body">
				  	<div class="row">
				  		<div class="col-md-4 product-left">
				  			@include('partials.adminleft')	
						</div>
						<div class="col-md-8 product-right">
							<div class="row">
								<div class="row category-form">
									<div class="col-md-8 col-md-8 col-md-offset-1">
										<div class="row">
											<div class="col-md-8">
												@if (Session::has('product'))
												<div class="alert alert-success" data-dismiss = "alert" role="alert">
												    {{ Session::get('product') }}
												</div>
												@endif
											</div>									
										</div>

										<h3>Create Product</h3>
										<hr>
											<form class="form-vertical" role="form" method="post" action="{{  route('admin.createProduct') }}" enctype="multipart/form-data">
								                <div class="form-group">
							    	              {{ Form::label('category_id', 'Category') }}
							    						    {{ Form::select('category_id',$categories, null, ['class' => 'form-control']) }}
							    				      </div>

							                  <div class="form-group{!! $errors->has('title') ? ' has-error' : '' !!}">
							                      <label for="title" class="control-label">Product Title:</label>
							                      <input type="text" name="title" class="form-control" id="product-title"
							                      value="{{ Request::old('title') ?: '' }}">
							                       @if ($errors->has('title'))
							                        <span class="help-block">
							                            {{ $errors->first('title') }}
							                        </span>
							                        @endif
							                  </div>
							                  <div class="form-group{!! $errors->has('description') ? ' has-error' : '' !!}">
							                      <label for="description" class="control-label">Product Description:</label>
							                      <textarea type="textarea" name="description" class="form-control" id="product-description"
							                      value="{{ Request::old('description') ?: '' }}"></textarea>
							                       @if ($errors->has('description'))
							                        <span class="help-block">
							                            {{ $errors->first('description') }}
							                        </span>
							                        @endif
							                  </div>
							                  <div class="form-group{!! $errors->has('price') ? ' has-error' : '' !!}">
							                      <label for="price" class="control-label">Product price:</label>
							                      <input type="text" name="price" class="form-control" id="product-price"
							                      value="{{ Request::old('price') ?: '' }}">
							                       @if ($errors->has('price'))
							                        <span class="help-block">
							                            {{ $errors->first('price') }}
							                        </span>
							                        @endif
							                  </div>


							                  <div class="form-group">
								               {{ Form::label('availability', 'Availability') }}
													    {{ Form::select('availability', ['1'=>'In Stock', '0'=>'Out Of stock'], null, ['class' => 'form-control']) }}

											        </div>

							                <div class="form-group{!! $errors->has('image') ? ' has-error' : '' !!}">
							                      <label for="image" class="control-label">Upload image:</label>
							                      <input type="file" name="image" class="form-control" id="product-image"
							                      value="{{ Request::old('image') ?: '' }}">
							                       @if ($errors->has('image'))
							                        <span class="help-block">
							                            {{ $errors->first('image') }}
							                        </span>
							                        @endif
							                  </div>
							                  <div class="form-group">
							                      <button type="submit" class="btn btn-info">Create Product</button>
							                  </div>
							                  <input type="hidden" name="_token" value="{{ Session::token() }}">
							            	</form>
							        </div>    
								</div>
							</div>
						</div>
				  	</div>
				</div>
				<div class="panel-footer default">
					<h5>Admin panel | Create Product</h5>
				</div>

			</div>
		</div>
	</div>
@endsection