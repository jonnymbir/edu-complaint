
<!--  Body Wrapper -->
<div class="page-wrapper mini-sidebar" id="main-wrapper" data-theme="blue_theme"  data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
	<!-- Sidebar Start -->
	<aside class="left-sidebar">
		<!-- Sidebar scroll-->
		<div>
			
			<div class="brand-logo d-flex align-items-center justify-content-between">
				<a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
					<img src="{{ asset('dist/images/favicon.png') }}" class="dark-logo" width="150" alt="" />
					<img src="{{ asset('dist/images/favicon.png') }}" class="light-logo"  width="150" alt="" />
				</a>
				<div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
					<i class="ti ti-x fs-8 text-muted"></i>
				</div>
			</div>
			
			<!-- Sidebar navigation-->
			<nav class="sidebar-nav scroll-sidebar" data-simplebar>
				<ul id="sidebarnav">
					<!-- ============================= -->
					<!-- Home -->
					<!-- ============================= -->
					@if(auth()->user()->can('dashboard.view'))
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Home</span>
						</li>
						<!-- =================== -->
						<!-- Dashboard -->
						<!-- =================== -->
						<li class="sidebar-item">
							<a class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : ''}}" href="{{ route('dashboard') }}" aria-expanded="false">
				              <span>
				                <i class="ti ti-activity-heartbeat"></i>
				              </span>
								<span class="hide-menu">General</span>
							</a>
						</li>
					@endif
					<!-- ============================= -->
					<!-- Apps -->
					<!-- ============================= -->
					@if(auth()->user()->can('users.list') || auth()->user()->can('roles.list'))
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">User Management</span>
						</li>
						@if(auth()->user()->can('users.list'))
							<li class="sidebar-item">
								<a class="sidebar-link {{ request()->routeIs('users') ? 'active' : ''}}" href="{{ route('users') }}" aria-expanded="false">
				                  <span>
				                    <i class="ti ti-user-circle"></i>
				                  </span>
									<span class="hide-menu">Users</span>
								</a>
							</li>
						@endif
					
						@if(auth()->user()->can('roles.list'))
							<li class="sidebar-item">
								<a class="sidebar-link {{ request()->routeIs('roles') ? 'active' : ''}}" href="{{ route('roles') }}" aria-expanded="false">
					                  <span>
					                    <i class="ti ti-layout-kanban"></i>
					                  </span>
									<span class="hide-menu">Roles</span>
								</a>
							</li>
						@endif
					@endif
					<!-- ============================= -->
					<!-- PAGES -->
					<!-- ============================= -->
					@if(auth()->user()->can('regions.list') || auth()->user()->can('complaints.list') || auth()->user()->can('divisions.list') || auth()->user()->can('units.list'))
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">PAGES</span>
						</li>
						
						@if(auth()->user()->can('complaints.list'))
							<li class="sidebar-item">
								<a class="sidebar-link {{ request()->routeIs('complaints') ? 'active' : ''}}" href="{{ route('complaints') }}" aria-expanded="false">
					              <span>
					                <i class="ti ti-question-mark"></i>
					              </span>
									<span class="hide-menu">Complaints</span>
								</a>
							</li>
						@endif
					
						@if(auth()->user()->can('divisions.list'))
							<li class="sidebar-item">
								<a class="sidebar-link {{ request()->routeIs('divisions') ? 'active' : ''}}" href="{{ route('divisions') }}" aria-expanded="false">
					              <span>
					                <i class="ti ti-category"></i>
					              </span>
									<span class="hide-menu">Divisions</span>
								</a>
							</li>
						@endif
						
						@if(auth()->user()->can('units.list'))
							<li class="sidebar-item">
								<a class="sidebar-link {{ request()->routeIs('units') ? 'active' : ''}}" href="{{ route('units') }}" aria-expanded="false">
					              <span>
					                <i class="ti ti-category-2"></i>
					              </span>
									<span class="hide-menu">Unit</span>
								</a>
							</li>
						@endif
					@endif
					
					@if(auth()->user()->can('regions.list'))
						<li class="sidebar-item">
							<a class="sidebar-link {{ request()->routeIs('regions') ? 'active' : ''}}" href="{{ route('regions') }}" aria-expanded="false">
				              <span>
				                <i class="ti ti-location"></i>
				              </span>
								<span class="hide-menu">Regions/Districts</span>
							</a>
						</li>
					@endif
					
					<!-- ============================= -->
					<!-- PAGES -->
					<!-- ============================= -->
					@if(auth()->user()->can('activity_logs.list'))
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Logs</span>
						</li>
						
						@if(auth()->user()->can('activity_logs.list'))
							<li class="sidebar-item">
								<a class="sidebar-link {{ request()->routeIs('activity_logs') ? 'active' : ''}}" href="{{ route('activity_logs') }}" aria-expanded="false">
					              <span>
					                <i class="ti ti-activity"></i>
					              </span>
									<span class="hide-menu">Activity Logs</span>
								</a>
							</li>
						@endif
					@endif
				</ul>
			</nav>
			
			<div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
				<div class="hstack gap-3">
					<div class="john-img">
						<img src="{{asset('dist/images/profile/user-13.png')}}" class="rounded-circle" width="40" height="40" alt="">
					</div>
					<div class="john-title">
						<h6 class="mb-0 fs-4 fw-semibold">{{ auth()->user()->name }}</h6>
						<span class="fs-2 text-dark">{{ auth()->user()->roles?->first()->name ?? 'No Role Assigned' }}</span>
					</div>
					<button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
						<i class="ti ti-power fs-6"></i>
					</button>
				</div>
			</div>
			<!-- End Sidebar navigation -->
		</div>
		<!-- End Sidebar scroll-->
	</aside>
	<!--  Sidebar End -->
{{--</div>--}}

