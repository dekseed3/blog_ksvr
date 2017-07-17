@if(Session::has('success'))

	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>สำเร็จ! : </strong> {{ Session::get('success') }}
	</div>

@endif

@if(count($errors) > 0)

	<div class="alert alert-danger alert-dismissible" role = "alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

		<strong>ผิดพลาด : </strong>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>

		@endforeach
		</ul>
	</div>

@endif
