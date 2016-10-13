<div class="row">
	<div class="col-md-6 col-md-6 col-md-offset-3">
		@if (Session::has('info'))
		<div class="alert alert-info" data-dismiss = "alert" role="alert">
		    {{ Session::get('info') }}
		</div>
		@endif
	</div>	
</div>
