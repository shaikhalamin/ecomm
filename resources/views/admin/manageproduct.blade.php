@extends('layouts.master')
@section('title')
 Admin
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12 col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h2 class="panel-title">Manage Product</h2>
				</div>
				<div class="panel-body">
				  	<div class="row">
				  		<div class="col-md-3 product-left">
				  			@include('partials.adminleft')	
						</div>
						<div class="col-md-9 product-right">
							<div class="row">
								<div class="row">
									<div class="col-md-8">
										@if (Session::has('product'))
										<div class="alert alert-danger" data-dismiss = "alert" role="alert">
										    {{ Session::get('product') }}
										</div>
										@endif
									</div>									
								</div>


								<div class="row user-detail">
									<div class="col-md-9 col-md-9 col-md-offset-1">
										<h3>Manage All Product</h3>
										<hr>
										<div class="row">
											<table class="table table-hover">
											                    <thead>
											                      <tr class="bg-success">
											                        <th>Products List</th>
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
											                     @foreach ($products as $product)
											                        <tr class="bg-warning">
											                        	<td>
											                        		 <b>{{ $product->id }}</b>
											                        	</td>
											                            <td>
											                                <b>{{ $product->title }}</b>
											                            </td>
											                            <td>
											                                <b>{{ $product->description }}</b>
											                            </td>
											                            <td>
											                                <b>{{ $product->availability}}</b>
											                            </td>
											                            <td>
											                                <b>{{ $product->price }}</b>
											                            </td>
											                            <td>
											                                <b>{{ $product->image }}</b>
											                            </td>
											                            <td>Edit</td>
											                            <td>
											                                <p>Delete</p>
											                            </td>

											                        </tr>
											                        @endforeach
											                    </tbody>
											</table>  
										</div>
							        </div>    
								</div>
							</div>
						</div>
				  	</div>
				</div>
				<div class="panel-footer default">
					<h5>Admin panel | Manage Category</h5>
				</div>

			</div>
		</div>
	</div>
@endsection