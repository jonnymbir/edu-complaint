@section('title', 'List Users')

<div>
	<div class="container-fluid">
		<!-- --------------------------------------------------- -->
		<!--  Form Basic Start -->
		<!-- --------------------------------------------------- -->
		@component('components.admin.bread-crum-component')
			@slot('title')
				List Users
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
									<div class="form-row d-flex justify-content-between">
										<!-- Search Field ========================= -->
										<div class="col-sm-3 col-md-3 form-group">
											<label for="search">Search</label>
											<input type="text" class="form-control" placeholder="Search available parameters here" wire:model.live.debounce.550ms="search" />
{{--											<button class="btn btn-danger btn-sm float-end" wire:click="$set('search', '')">--}}
{{--												<i class="fa fa-times"></i>--}}
{{--											</button>--}}
										</div>
										
										<!-- Button ========================= -->
										<div class="col-auto d-flex align-items-center ml-auto form-group">
											<button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#addUserModal">
												Add User
											</button>
										</div>
									
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
									<th scope="col">Full Name</th>
									<th scope="col">Email</th>
									<th scope="col">Roles</th>
									<th scope="col">Creation Date</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($users as $key => $user)
									<tr wire:key="{{ $key }}">
										<th scope="row">{{ $key + 1 }}</th>
										<td>{{ $user->full_name }}</td>
										<td>{{ $user->email }}</td>
										<td>
											@foreach($user->roles as $role)
												<span class="mb-1 badge bg-primary">{{ Str::headline($role->name) }}</span>
											@endforeach
										</td>
										<td>{{ $user->created_at->format('dS M, Y') }}</td>
										<td>
											<div class="d-flex">
												<button class="btn btn-sm btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editUserModal" wire:click="edit({{ $user->id }})">
													<i class="fa fa-pencil-alt"></i>
												</button>
												<button class="btn btn-sm btn-danger shadow btn-xs sharp" onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()"
												        wire:click="delete({{ $user->id }})">
													<i class="fa fa-trash"></i>
												</button>
											</div>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
							<div class="mt-3">
								{{ $users->links() }}
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		
		@include('livewire.admin.modals.Users.create-user')
		@include('livewire.admin.modals.Users.edit-user')
		
	</div>
</div>
