<!-- sample modal content -->
<div wire:ignore.self id="addUserModal" class="modal fade" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="myModalLabel">
					Create User
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form wire:submit.prevent="store">
				<div class="modal-body">
					
					<div class="card-body">
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="first_name">First name</label>
									<input type="text" class="form-control" id="first_name" placeholder="First name" value="Mark" required wire:model="first_name">
									
									@error('first_name')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-6 mb-3">
									<label for="last_name">Last name</label>
									<input type="text" class="form-control" id="last_name" placeholder="Last name" value="Otto" required wire:model="last_name">
									
									@error('last_name')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-6 mb-3">
									<label for="name">Username</label>
									<div class="input-group">
										<input type="text" class="form-control" id="name" placeholder="Username" required wire:model="name">
										
										@error('name')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<label for="validationDefaultUsername">Email Address</label>
									<div class="input-group">
										<span class="input-group-text" id="email">@</span>
										<input type="email" class="form-control" id="email" placeholder="Email" aria-describedby="email" required wire:model="email">
										
										@error('email')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" placeholder="Enter Password" required wire:model="password">
									<small>Default password is <strong>changeme</strong></small>
									
									@error('password')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="col-md-6 mb-3">
									<label for="roles">Role</label>
									<select class="form-select" id="roles" required wire:model="role" multiple>
										<option selected readonly value="">Choose user roles</option>
										@foreach($roles as $role)
											<option value="{{ $role->name }}">{{ Str::headline($role->name) }}</option>
										@endforeach
									</select>
								</div>
							</div>
						
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
						Add User
					</button>
					<button type="button" class="btn btn-danger rounded-pill px-4 mt-3" data-bs-dismiss="modal">
						Close
					</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>