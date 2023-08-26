@section('title', 'Divisions')

<div>
	
	<div class="container-fluid">
		<!-- --------------------------------------------------- -->
		<!--  Form Basic Start -->
		<!-- --------------------------------------------------- -->
		@component('components.admin.bread-crum-component')
			@slot('title')
				List Divisions
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
										</div>
										
										@can('divisions.create')
											<!-- Button ========================= -->
											<div class="col-auto d-flex align-items-center ml-auto form-group">
												<button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#addDivisionModal">
													Add Division
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
									<th scope="col">Division Name</th>
									<th scope="col">Division Email</th>
									<th scope="col">Contact Person</th>
									@if(auth()->user()->can('divisions.edit') || auth()->user()->can('divisions.delete'))
										<th scope="col">Action</th>
									@endif
								</tr>
								</thead>
								<tbody>
								@foreach($divisions as $key => $division)
									<tr wire:key="{{ $key }}">
										<th scope="row">{{ $key + 1 }}</th>
										<td>{{ $division->div_name }}</td>
										<td>{{ $division->div_email }}</td>
										<td>{{ $division->div_contact_person }}</td>
										@if(auth()->user()->can('divisions.edit') || auth()->user()->can('divisions.delete'))
											<td>
												<div class="d-flex">
													@can('divisions.edit')
														<button class="btn btn-sm btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editDivisionModal" wire:click="edit({{ $division->id }})">
															<i class="fa fa-pencil-alt"></i>
														</button>
													@endcan
													
													@can('divisions.delete')
														<button class="btn btn-sm btn-danger shadow btn-xs sharp" onclick="confirm('Are you sure you want to delete this division?') || event.stopImmediatePropagation()"
														        wire:click="delete({{ $division->id }})">
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
								{{ $divisions->links() }}
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</section>
		
		@can('divisions.create')
			@include('livewire.admin.modals.Divisions.create-division')
		@endcan
		
		@can('divisions.edit')
			@include('livewire.admin.modals.Divisions.edit-division')
		@endcan
	
	</div>
	
</div>
