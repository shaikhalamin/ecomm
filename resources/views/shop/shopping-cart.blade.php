@extends('layouts.master')

@section('title')
 Laravel shoping cart
@endsection

@section('content')
<div class="panel panel-default" style="margin-top: -12px;">
	<div class="panel-body">
			@if(Session::has('cart'))
				<div class="row">
					<div class="col-md-6 col-md-6 col-md-offset-3 col-sm-offset-3">
						<ul class="list-group">
							@foreach($products as $product)
									<li class="list-group-item">
										<span class="badge">{{ $product['qty'] }}</span>
										<strong>{{ $product['item']['title'] }}</strong>
										<span class="label label-success">{{ $product['price'] }}</span>
										<div class="button-group">
											<button type="submit" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
											<ul class="dropdown-menu">
												<li><a href="{{ route('product.reduceByOne',['id' => $product['item']['id'] ]) }}">Reduce by 1</a></li>
												<li><a href="{{ route('product.remove',['id' => $product['item']['id'] ]) }}">Reduce All</a></li>
											</ul>
										</div>
									</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-6 col-md-offset-3 col-sm-offset-3">
						<strong>Total $ {{ $totalPrice }}</strong>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6 col-md-6 col-md-offset-3 col-sm-offset-3">
						<a href="{{ route('checkout') }}" type="submit" class="btn btn-success">Checkout</a>
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-md-6 col-md-6 col-md-offset-3 col-sm-offset-3">
						<h1>No items in cart!</h1>
					</div>
				</div>
			@endif
	</div>
		<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
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