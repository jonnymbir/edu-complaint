@if(session()->has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
		<strong>Well done!</strong> {{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif

@if(session()->has('error'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
		<strong>Oh snap!</strong> {{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif

@if(session()->has('warning'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert" id="myAlert">
		<strong>Warning!</strong> {{ session('warning') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif

@if(session()->has('info'))
	<div class="alert alert-info alert-dismissible fade show" role="alert" id="myAlert">
		<strong>Heads up!</strong> {{ session('info') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif