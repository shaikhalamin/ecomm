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
								  	<a href="{{ route('product.getProduct',['id'=> $category->id]) }}" class="list-group-item">
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
				@include('partials.footer')

			</div>		
		</div>
	</div>
@endsection