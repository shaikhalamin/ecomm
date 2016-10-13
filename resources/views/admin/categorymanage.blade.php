@extends('layouts.master')
@section('title')
 Admin
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12 col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h2 class="panel-title">Manage Product Category</h2>
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
										@if (Session::has('category'))
										<div class="alert alert-danger" data-dismiss = "alert" role="alert">
										    {{ Session::get('category') }}
										</div>
										@endif
									</div>									
								</div>


								<div class="row user-detail">
									<div class="col-md-6 col-md-6 col-md-offset-2">
										<h3>All Product Category</h3>
										<hr>
										<div class="row">
											<table class="table table-hover">
                    							<thead>
                      								<tr>
                        								<th>Categories List</th>
                        								<th>Delete</th>
                      								</tr>
                    							</thead>
                    							<tbody>
	                     							@foreach ($categories as $category)
	                        						<tr>
	                            						<td>
	                                						<b><span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span> {{ $category->name }}</b>
	                            						</td>

	                            						<td>
		                                					<form action="{{route('admin.deletecategory', ['id'=> $category->id]) }}" method="post">
			                                 					<input type="submit" class="btn btn-danger btn-sm" value="Delete Category">
			                                 					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                					</form> 
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