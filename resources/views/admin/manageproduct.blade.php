@extends('layouts.master')

@section('title')
 Manage Product
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-6 col-md-offset-3">
		@if (Session::has('success'))
		<div class="alert alert-info" data-dismiss = "alert" role="alert">
		    {{ Session::get('success') }}
		</div>
		@endif
	</div>	
</div>

	<div class="row">
		<div class="col-md-12 col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							@include('partials.adminleft')	
						</div>

						<div class="col-md-9">
							<div class="row">
								<div class="col-md-12 col-md-12 col-md-offset-0">
										<div class="row">
											<div class="col-md-6 col-md-6 col-md-offset-3">
												@if (Session::has('product'))
												<div class="alert alert-danger" data-dismiss = "alert" role="alert">
												    {{ Session::get('product') }}
												</div>
												@endif
											</div>	
										</div>
										<div class="row">
											<h3 class="text-center">Manage Product</h3>
										</div>
										<hr>
										<table class="table table-hover">
								                    <thead>
								                      <tr class="bg-success">
								                        <th>Title</th>
								                        <th>Description</th>
								                        <th>price</th>
								                        <th>availability</th>
								                        <th>Image</th>
								                        <th>Edit</th>
								                        <th>Delete</th>
								                      </tr>
								                    </thead>
								                    <tbody>
											@foreach($products->chunk(1) as $productChunk)
												<tr class="bg-info">
													@foreach($productChunk as $product)
							                            <td>
							                                <b>{{ $product->title }}</b>
							                            </td>
							                            <td>
							                                <b>{{ $product->description }}</b>
							                            </td>
							                            <td>
							                            	<b>{{ $product->price }}</b>
							                                
							                            </td>
							                            <td>
							                                <b>{{ $product->availability}}</b>
							                            </td>
							                            <td>
							                                <b>{{ $product->image }}</b>
							                            </td>
							                            <td>
							                            	<a href="{{route('admin.editProduct', ['id'=> $product->id]) }}">Edit
															</a>
														</td>
							                            <td>
							                                <form action="{{ route('admin.deleteProduct') }}" method="post">
			                                 					<input type="submit" value="Delete">
			                                 					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                					</form>  
							                            </td>
													@endforeach
												</tr>
											@endforeach
													</tbody>
											</table>	
										{!!$products->render()!!}
								</div>
							</div>
											
						</div>

					</div>
				</div>
				@include('partials.footer')

			</div>		
		</div>
	</div>
@endsection