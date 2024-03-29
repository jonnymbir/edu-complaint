@section('title', 'List Roles')

<div>
	<div class="container-fluid">
		<!-- --------------------------------------------------- -->
		<!--  Form Basic Start -->
		<!-- --------------------------------------------------- -->
		@component('components.admin.bread-crum-component')
			@slot('title')
				List Roles
			@endslot
		@endcomponent
		
		<section>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<!-- Filter ============================================= -->
							<div class="row">
								<div class="col">
									<div class="form-row d-flex justify-content-end">
										<!-- Search Field ========================= -->
{{--										<div class="col-sm-3 col-md-3 form-group">--}}
{{--											<label for="search">Search</label>--}}
{{--											<input type="text" class="form-control" placeholder="Search available parameters here" wire:model.live.debounce.550ms="search" />--}}
{{--										</div>--}}
										
										@can('roles.create')
											<!-- Button ========================= -->
											<div class="col-auto d-flex align-items-center ml-auto form-group">
												<button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#addRoleModal">
													Add Role
												</button>
											</div>
										@endcan
									
									</div>
								</div>
							</div>
							<!-- Filter End -->
						</div>
						<div class="card-body">
							
							<table class="table mb-0">
								<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Role Name</th>
									<th scope="col">Guard Name</th>
									@if(auth()->user()->can('roles.edit') || auth()->user()->can('roles.delete'))
										<th scope="col">Action</th>
									@endif
								</tr>
								</thead>
								<tbody>
								@foreach($roles as $key => $role)
									<tr wire:key="{{ $key }}">
										<th scope="row">{{ $key + 1 }}</th>
										<td>{{ Str::headline($role->name) }}</td>
										<td>{{ $role->guard_name }}</td>
										@if(auth()->user()->can('roles.edit') || auth()->user()->can('roles.delete'))
											<td>
												<div class="d-flex">
													@can('roles.edit')
														<button class="btn btn-sm btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editRoleModal" wire:click="edit({{ $role->id }})">
															<i class="fa fa-pencil-alt"></i>
														</button>
													@endcan
													
													@can('roles.delete')
														<button class="btn btn-sm btn-danger shadow btn-xs sharp" onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()"
														        wire:click="delete({{ $role->id }})">
															<i class="fa fa-trash"></i>
														</button>
													@endcan
												</div>
											</td>
										@endif
									</tr>
								@endforeach
								</tbody>
							</table>
							<div class="mt-3">
								{{ $roles->links() }}
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</section>
		
		@can('roles.create')
			@include('livewire.admin.modals.Roles.create-role')
		@endcan
		
		@can('roles.edit')
			@include('livewire.admin.modals.Roles.edit-role')
		@endcan
	
	</div>
</div>
