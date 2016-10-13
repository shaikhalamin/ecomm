@extends('layouts.master')

@section('title')
 My Ecommerce
@endsection

@section('content')
@if(Session::has('success'))
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<div id="charge-message" class="alert alert-success">
				{{ Session::get('success') }}
			</div>	
		</div>
	</div>
@endif


	<div class="row">
		<div class="col-md-12 col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="list-group">
								@foreach($categories as $category)
								  	<a href="#" class="list-group-item">
								  		<i class="fa fa-outdent" aria-hidden="true"></i>
									 	{{$category->name }}
									</a>
								@endforeach	
							</div>
						</div>

						<div class="col-md-9">
							@foreach($products->chunk(3) as $productChunk)
								<div class="row">
									@foreach($productChunk as $product)
										<div class="col-sm-4 col-md-4">
										    <div class="thumbnail">
										      <img src="/uploads/products/images/{{ $product->image }}" alt="{{ $product->title }}" class="img-responsive">
										      	<div class="caption">
											        <h3>{{ $product->title }}</h3>
											        <p class="description">{{ $product->description }}</p>

											        <div class="clearfix">
											        	<div class="pull-left price">${{ $product->price }}</div>
											<a href="{{ route('product.addtocart', ['id'=>$product->id]) }}" class="btn btn-info pull-right" role="button">Add to Cart</a>
											        </div>
										      	</div>
										    </div>
									  	</div>
									@endforeach
								</div>
							@endforeach
							{!!$products->render()!!}	
						</div>

					</div>
				</div>
				<div class="panel-footer default">
					<div class="row">
						<div class="col-md-4">
							<h3 class="text-center">Payment Method</h3>
							<img src="/uploads/payment/images/Payment-Methods.jpeg" width="350" height="200">
						</div>
						<div class="col-md-4">
							<h3 class="text-center">Useful Links</h3>
								<a href="#" class="list-group-item">
									<i class="fa fa-outdent" aria-hidden="true"></i>
										Home 	
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-outdent" aria-hidden="true"></i>
										Shopping Cart 	
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-outdent" aria-hidden="true"></i>
										Sign Up	
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-outdent" aria-hidden="true"></i>
										Sign In	
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-outdent" aria-hidden="true"></i>
										Profile
								</a>
								<a href="#" class="list-group-item">
									<i class="fa fa-outdent" aria-hidden="true"></i>
										Contact Us | +8801712341937
								</a>
						</div>
						<div class="col-md-4">
							<h3 class="text-center">Your Feedback</h3>
							<div class="row">
								<div class="col-md-12 col-md-12 col-md-offset-0">
									<form class="form-vertical" role="form" method="post" action="#">
										<input type="hidden" value="{{ csrf_token() }}" name="_token">
								            <div class="form-group{!! $errors->has('name') ? ' has-error' : '' !!}">
								            	<label>Name</label>
								                <input type="text" name="name" class="form-control" id="name"
								               	value="{{ Request::old('name') ?: '' }}">
					                            @if ($errors->has('name'))
					                              	<span class="help-block">
					                                  {{ $errors->first('name') }}
					                              	</span>
					                            @endif
								            </div>
								            <div class="form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
								            	<label>Email</label>
								                <input type="text" name="email" class="form-control" id="email"
								               	value="{{ Request::old('email') ?: '' }}">
					                            @if ($errors->has('email'))
					                              	<span class="help-block">
					                                  {{ $errors->first('email') }}
					                              	</span>
					                            @endif
								            </div>
								            <div class="form-group{!! $errors->has('description') ? ' has-error' : '' !!}">
							                      <label for="description" class="control-label">Your Message:</label>
							                      <textarea type="textarea" name="description" class="form-control" id="product-description"
							                      value="{{ Request::old('description') ?: '' }}"></textarea>
							                       @if ($errors->has('description'))
							                        <span class="help-block">
							                            {{ $errors->first('description') }}
							                        </span>
							                        @endif
							                </div>
								            <div class="form-group">
								            	<button type="submit" class="btn btn-sm btn-info">Inform Us</button>
								            </div>
							        </form>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<p class="text-center"> Copyright&copy; 2016 My E-Commerce Ltd</p>
					</div>
				</div>	
			</div>		
		</div>
	</div>
@endsection