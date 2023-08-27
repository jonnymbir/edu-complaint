<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!--  Title -->
	<title>{{ config('app.name') }} -  @yield('title', 'Enquiry Dashboard')</title>
	
	<!--  Required Meta Tag -->
	@if(app()->environment('production'))
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	@endif
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="handheld-friendly" content="true" />
	<meta name="MobileOptimized" content="width" />
	<meta name="description" content="GALOP-Ghana Accountability for Learning Outcomes Project" />
	<meta name="author" content="GALOP-Ghana Accountability for Learning Outcomes Project" />
	<meta name="keywords" content="GALOP,Ghana,Accountability for Learning,Outcomes, Project" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<!--  Favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('dist/images/favicon.png') }}" />
	<!-- Core Css -->
	<link  id="themeColors"  rel="stylesheet" href="{{asset('dist/css/style.min.css')}}" />
</head>
<body>
	<!-- Preloader -->
	<div class="preloader">
		<img src="{{ asset('dist/images/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
	</div>
	<!-- Preloader -->
	<div class="preloader">
		<img src="{{ asset('dist/images/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
	</div>
	
	@yield('content')

	<!--  Import Js Files -->
	<script src="{{asset('dist/libs/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
	<script src="{{asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
	<!--  core files -->
	<script src="{{asset('dist/js/app.min.js')}}"></script>
	<script src="{{asset('dist/js/app.init.js')}}"></script>
	<script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
	<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
	
	<script src="{{asset('dist/js/custom.js')}}"></script>
</body>

</html>