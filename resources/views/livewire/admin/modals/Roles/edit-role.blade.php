<!-- sample modal content -->
<div wire:ignore.self class="modal fade" id="editRoleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editRoleModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="editRoleModalLabel">
					Edit Role
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetFields"></button>
			</div>
			<div class="modal-body">
				
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="name">Role name</label>
							<input type="text" class="form-control" id="name" placeholder="Role name"
							       required wire:model="name">
							
							@error('name')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					
					</div>
				</div>
				
				<label>Permissions:
					<span class="bg bg-info text-white rounded-pill px-2 py-1">
						{{ count($selectedPermissions) }}
					</span>
				</label>
				<hr>
				<label class="form-group" title="Select all" style="width: 250px;">
					<input type="checkbox" name="permission[]" value="all" wire:model.lazy="selectAllPermissions">
					Select all
				</label>
				<hr>
				@foreach($permissions->groupBy(fn($permission) => $words = explode('.', $permission->name)[0]) as $firstWord => $permissionsByFirstWord)
					<h6>{{ Str::headline($firstWord) }}</h6>
					<ul>
						@forelse($permissionsByFirstWord as $permission)
							<label class="checkbox m-1" title="{{ $permission->name }}" style="width: 250px;">
								<input type="checkbox" multiple name="permission[]" value="{{ $permission->name }}"
								       class="check_invoice"
								       wire:model.lazy="selectedPermissions" {{ in_array($permission->name, $this->selectedPermissions, true) ? 'checked' : '' }}>
								<span></span>
								@php
									$_action = explode('.', $permission->name);
									if (empty($_action[0])) {
										continue;
									}
									$name = end($_action);
								@endphp
								{{ $name . ' ' . str_replace('_', ' ', $firstWord) }} {{ in_array($permission->name, $this->selectedPermissions, true) ? '(selected)' : '' }}
							</label>
						@empty
							<li>No permissions found</li>
						@endforelse
					</ul>
				@endforeach
			</div>
			<div class="modal-footer">
				<button class="btn btn-info rounded-pill px-4 mt-3" type="button" wire:click.prevent="update">
					Save Changes
				</button>
				<button type="button" class="btn btn-danger rounded-pill px-4 mt-3" data-bs-dismiss="modal" wire:click.prevent="resetFields">
					Close
				</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>