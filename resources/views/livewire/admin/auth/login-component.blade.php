@section('title', 'Login')

<div>
	
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
		<div class="position-relative overflow-hidden radial-gradient min-vh-100">
			<div class="position-relative z-index-5">
				<div class="row">
					<div class="col-xl-7 col-xxl-8">
						<a href="/" class="text-nowrap logo-img d-block px-4 py-9 w-100">
							<img src="{{ asset('dist/images/favicon.png') }}" width="100" alt="">
						</a>
						<div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
							<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
						</div>
					</div>
					<div class="col-xl-5 col-xxl-4">
						<div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
							<div class="col-sm-8 col-md-6 col-xl-9">
								<h2 class="mb-3 fs-7 fw-bolder">Welcome to {{ config('app.name') }}</h2>
								<p class=" mb-9">Your Admin Dashboard</p>
								<form>
									<div class="mb-3">
										<label for="email" class="form-label">Email Address</label>
										<input type="email" class="form-control" id="email" aria-describedby="emailHelp" wire:model="email">
										
										@error("email")
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
									<div class="mb-4">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control" id="password" wire:model="password">
										
										@error("password")
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
									<div class="d-flex align-items-center justify-content-between mb-4">
										<div class="form-check">
											<input class="form-check-input primary" type="checkbox" value="" id="remember_me"  wire:model="remember_me">
											<label class="form-check-label text-dark" for="remember_me">
												Remember this Device
											</label>
										</div>
{{--										<a class="text-primary fw-medium" href="authentication-forgot-password.html">Forgot Password ?</a>--}}
									</div>
									<a href="#" class="btn btn-primary w-100 py-8 mb-4 rounded-2" wire:loading.remove wire:click.prevent="login">Sign In</a>
									<a href="#" style="pointer-events: none" class="btn btn-primary w-100 py-8 mb-4 rounded-2" wire:loading wire:target="login">Processing...</a>
{{--									<div class="d-flex align-items-center justify-content-center">--}}
{{--										<p class="fs-4 mb-0 fw-medium">New to Modernize?</p>--}}
{{--										<a class="text-primary fw-medium ms-2" href="authentication-register.html">Create an account</a>--}}
{{--									</div>--}}
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>
	
</div>
