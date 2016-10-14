@extends('layouts.master')

@section('title')
 Manage Category
@endsection

@section('content')
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
											<h3 class="text-center">Manage Category</h3>
										</div>
										<div class="row">
											<div class="col-md-8">
												@if (Session::has('category'))
												<div class="alert alert-danger" data-dismiss = "alert" role="alert">
												    {{ Session::get('category') }}
												</div>
												@endif
											</div>									
										</div>
										<hr>
										<table class="table table-hover">
								                    <thead>
								                      <tr class="bg-success">
								                        <th>Categories List</th>
								                        <th>Edit</th>
                        								<th>Delete</th>
								                      </tr>
								                    </thead>
								                    <tbody>
											@foreach($categories->chunk(1) as $categoryChunk)
												<tr class="bg-info">
													@foreach($categoryChunk as $category)
														<td>
							                        		 <b>{{ $category->name }}</b>
							                        	</td>
							                        	<td>
						                        			<a href="{{route('admin.editcategory', ['id'=> $category->id]) }}" class="btn btn-info btn-sm">
														  			Edit
															</a>
							                        	</td>
							                            <td>
							                      			<form action="{{route('admin.deletecategory', ['id'=> $category->id]) }}" method="post">
			                                 					<input type="submit" class="btn btn-danger btn-sm" value="Delete Category">
			                                 					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                                					</form> 
							                            </td>
													@endforeach
												</tr>
											@endforeach
													</tbody>
											</table>	
										{!!$categories->render()!!}
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