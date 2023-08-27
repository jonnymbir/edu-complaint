@section('title', 'Complaints')

@section('styles')
@endsection

<div>
	
	<div class="container-fluid">
		<!-- --------------------------------------------------- -->
		<!--  Form Basic Start -->
		<!-- --------------------------------------------------- -->
		@component('components.admin.bread-crum-component')
			@slot('title')
				List of Complaints
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
											<input type="text" class="form-control"
											       placeholder="Search by Complaint ID"
											       wire:model.live.debounce.550ms="search"/>
										</div>
										<div class="col-sm-3 col-md-3 form-group">
											<label for="search_category">Filter By Category</label>
											<select class="form-control" wire:model.lazy="search_category">
												<option value="">Select Category</option>
												@foreach($complaint_categories as $complaint_category)
													<option value="{{ $complaint_category->id }}">{{ $complaint_category->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="col-sm-3 col-md-3 form-group">
											<br>
											<button class="btn btn-danger btn-block" wire:click="resetFilters" title="Reset Filters">
												<i class="fa fa-redo-alt"></i>
											</button>
										</div>
										
										@can('complaints.create')
											<!-- Button ========================= -->
											<div class="col-auto d-flex align-items-center ml-auto form-group">
												<button class="btn btn-primary btn-block" data-bs-toggle="modal"
												        data-bs-target="#addComplaintModal" wire:click="resetForm">
													Add New Complaint
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
									<th scope="col">Complaint ID</th>
									<th scope="col">Full Name</th>
									<th scope="col">Telephone</th>
									<th scope="col">Gender</th>
									<th scope="col">Status</th>
									<th scope="col">Creation Date</th>
									@if(auth()->user()->can('complaints.view') || auth()->user()->can('complaints.reply') || auth()->user()->can('complaints.forward'))
										<th scope="col">Action</th>
									@endif
								</tr>
								</thead>
								<tbody>
								@foreach($complaints as $key => $complaint)
									<tr wire:key="{{ $key }}">
										<th scope="row">{{ $key + 1 }}</th>
										<td>{{ $complaint->ticket_number }}</td>
										<td>{{ $complaint->full_name }}</td>
										<td>{{ $complaint->telephone }}</td>
										<td>{{ $complaint->sex }}</td>
										<td>
											<p class="fs-3 text-dark mb-0">
												@if($complaint->status === 'pending')
													<span class="badge fw-semibold py-1 w-85 bg-light-warning text-warning">
													{{ $complaint->status }}
												</span>
												@elseif($complaint->status === 'resolved')
													<span class="badge fw-semibold py-1 w-85 bg-light-success text-success">
													{{ $complaint->status }}
												</span>
												@elseif($complaint->status === 'closed')
													<span class="badge fw-semibold py-1 w-85 bg-light-danger text-danger">
													{{ $complaint->status }}
												</span>
												@elseif($complaint->status === 'forwarded')
													<span class="badge fw-semibold py-1 w-85 bg-light-primary text-primary">
													{{ $complaint->status }}
												</span>
												@elseif($complaint->status === 'overdue')
													<span class="badge fw-semibold py-1 w-85 bg-light-danger text-danger">
													{{ $complaint->status }}
												</span>
												@else
													<span class="badge fw-semibold py-1 w-85 bg-light-info text-info">
													{{ $complaint->status }}
												</span>
												@endif
											</p>
										</td>
										<td>{{ $complaint->created_at->format('dS M, Y') }}</td>
										@if(auth()->user()->can('complaints.view') || auth()->user()->can('complaints.reply') || auth()->user()->can('complaints.forward'))
											<td>
												<div class="d-flex">
													@can('complaints.view')
														<button class="btn btn-sm btn-primary shadow btn-xs sharp me-1"
														        data-bs-toggle="modal" data-bs-target="#viewComplaintModal" title="View Complaint"
														        wire:click="view({{ $complaint->id }})">
															<i class="fa fa-eye"></i>
														</button>
													@endcan
													
													@can('complaints.reply')
														<button class="btn btn-sm btn-warning shadow btn-xs sharp me-1" title="Reply Complaint"
														        data-bs-toggle="modal" data-bs-target="#replyComplaintModal"
														        wire:click="showCommentForm({{ $complaint->id }})">
															<i class="fa fa-reply"></i>
														</button>
													@endcan
													
													@can('complaints.forward')
{{--														@if(!$complaint->is_forwarded)--}}
															<button class="btn btn-sm btn-dark shadow btn-xs sharp me-1" title="Forward Complaint"
															        data-bs-toggle="modal" data-bs-target="#forwardComplaintModal"
															        wire:click="showCommentForm({{ $complaint->id }})">
																<i class="fa fa-forward"></i>
															</button>
{{--														@endif--}}
													@endcan
												</div>
											</td>
										@endif
									</tr>
								@endforeach
								</tbody>
							</table>
							<div class="mt-3">
								{{ $complaints->links() }}
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</section>
		
		@can('complaints.create')
			@include('livewire.admin.modals.Complaints.create-complaint')
		@endcan
		
		@can('complaints.view')
			@include('livewire.admin.modals.Complaints.view-complaint')
		@endcan
		
		@can('complaints.reply')
			@include('livewire.admin.modals.Complaints.reply-complaint')
		@endcan
		
		@can('complaints.forward')
			@include('livewire.admin.modals.Complaints.forward-complaint')
		@endcan
	
	</div>

</div>

@section('scripts')
@endsection