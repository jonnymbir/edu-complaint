<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!--  Title -->
	<title>{{ config('app.name') }} -  @yield('title', 'Enquiry')</title>
	<!--  Required Meta Tag -->
	@if(app()->environment('production'))
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	@endif
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="handheld-friendly" content="true" />
	<meta name="MobileOptimized" content="width" />
	<meta name="description" content="OmegaSL Programming" />
	<meta name="author" content="" />
	<meta name="keywords" content="OmegaSL Programming" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<!--  Favicon -->
	<link rel="icon" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
	<!-- Core Css -->
	<link  id="themeColors"  rel="stylesheet" href="{{asset('dist/css/style.min.css')}}" />
	
	@livewireStyles
	
	@yield('styles')
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
	
	@include('livewire/admin/shared/sidebar')
	<!--  Main wrapper -->
	<div class="body-wrapper">
		@include('livewire.admin.shared.header')
		
		<div class="container-fluid">
			@yield('content')
		</div>
	</div>
	<div class="dark-transparent sidebartoggler"></div>
	<div class="dark-transparent sidebartoggler"></div>
	
	<!--  Customizer -->
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
	<script src="{{asset('dist/libs/prismjs/prism.js')}}"></script>
	<!--  current page js files -->
	<script src="{{asset('dist/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
{{--	<script src="{{asset('dist/libs/apexcharts/dist/apexcharts.min.js')}}"></script>--}}
	<script src="{{asset('dist/js/dashboard.js')}}"></script>
	
	@livewireScripts

	@yield('scripts')

</body>

</html>