<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="OmegaSL Programming">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
{{--	content security policy--}}
	@if(app()->environment('production'))
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	@endif
	
	<title>{{ config('app.name') }} -  @yield('title', 'Enquiry')</title>
	
	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
	
	<!--  Favicon -->
	<link rel="icon" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
	
	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/line-awesome.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
{{--	<link rel="stylesheet" href="{{asset('assets/css/jquery-te-1.4.0.css')}}">--}}
	<link rel="stylesheet" href="{{asset('assets/css/selectize.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<!-- end inject -->
	
	@livewireStyles
</head>
<body>

	<!-- start css load-loader -->
	<div id="preloader">
		<div class="loader">
			<svg class="spinner" viewBox="0 0 50 50">
				<circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
			</svg>
		</div>
	</div>
	<!-- end css load-loader -->
	
	@include('livewire.guest.shared.header')
	
	@yield('content')
	
	@include('livewire.guest.shared.footer')
	
	<!-- start back to top -->
	<div id="back-to-top" data-toggle="tooltip" data-placement="top" title="Return to top">
		<i class="la la-arrow-up"></i>
	</div>
	<!-- end back to top -->
	
	
	<!-- template js files -->
	<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
{{--	<script src="{{asset('assets/js/jquery-te-1.4.0.min.js')}}"></script>--}}
	<script src="{{asset('assets/js/selectize.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.multi-file.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.lazy.min.js')}}"></script>
	<script src="{{asset('assets/js/main.js')}}"></script>
	
	@livewireScripts
</body>

</html>