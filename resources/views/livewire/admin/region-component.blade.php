@section('title', 'List Regions/Districts')

<div>
	
	<div class="container-fluid">
		<!-- --------------------------------------------------- -->
		<!--  Form Basic Start -->
		<!-- --------------------------------------------------- -->
		@component('components.admin.bread-crum-component')
			@slot('title')
				List Regions/Districts
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
										
										<!-- Button ========================= -->
										<div class="col-auto d-flex align-items-center ml-auto form-group">
											<button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#addRegionModal">
												Add Region
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
									<th scope="col">Region Name</th>
									<th scope="col">Region Code</th>
									<th scope="col">Number Of Districts</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($regions as $key => $region)
									<tr wire:key="{{ $key }}">
										<th scope="row">{{ $key + 1 }}</th>
										<td>{{ $region->name }}</td>
										<td>{{ $region->code }}</td>
										<td>{{ $region->districts_count }}</td>
										<td>
											<div class="d-flex">
												<button class="btn btn-sm btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editRegionModal" wire:click="edit({{ $region->id }})">
													<i class="fa fa-pencil-alt"></i>
												</button>
												<button class="btn btn-sm btn-danger shadow btn-xs sharp" onclick="confirm('Are you sure you want to delete this region?') || event.stopImmediatePropagation()"
												        wire:click="delete({{ $region->id }})">
													<i class="fa fa-trash"></i>
												</button>
											</div>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
							
							<div class="mt-3">
								{{ $regions->links() }}
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</section>
		
		@include('livewire.admin.modals.Regions.create-region')
		@include('livewire.admin.modals.Regions.edit-region')
	
	</div>
	
</div>
