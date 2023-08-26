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
										
										<!-- Button ========================= -->
										<div class="col-auto d-flex align-items-center ml-auto form-group">
											<button class="btn btn-primary btn-block" data-bs-toggle="modal"
											        data-bs-target="#addComplaintModal" wire:click="resetForm">
												Add New Complaint
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
									<th scope="col">Complaint ID</th>
									<th scope="col">Full Name</th>
									<th scope="col">Telephone</th>
									<th scope="col">Gender</th>
									<th scope="col">Stakeholder Type</th>
									<th scope="col">Creation Date</th>
									<th scope="col">Action</th>
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
										<td>{{ $complaint->stakeholder_type }}</td>
										<td>{{ $complaint->created_at->format('dS M, Y') }}</td>
										<td>
											<div class="d-flex">
												<button class="btn btn-sm btn-primary shadow btn-xs sharp me-1"
												        data-bs-toggle="modal" data-bs-target="#viewComplaintModal"
												        wire:click="view({{ $complaint->id }})">
													<i class="fa fa-eye"></i>
												</button>
												<button class="btn btn-sm btn-warning shadow btn-xs sharp me-1"
												        data-bs-toggle="modal" data-bs-target="#replyComplaintModal"
												        wire:click="showCommentForm({{ $complaint->id }})">
													<i class="fa fa-reply"></i>
												</button>
												@if(!$complaint->is_forwarded)
													<button class="btn btn-sm btn-dark shadow btn-xs sharp me-1"
													        data-bs-toggle="modal" data-bs-target="#forwardComplaintModal"
													        wire:click="showCommentForm({{ $complaint->id }})">
														<i class="fa fa-forward"></i>
													</button>
												@endif
											</div>
										</td>
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
		
		@include('livewire.admin.modals.Complaints.create-complaint')
		@include('livewire.admin.modals.Complaints.view-complaint')
		@include('livewire.admin.modals.Complaints.reply-complaint')
		@include('livewire.admin.modals.Complaints.forward-complaint')
	
	</div>

</div>

@section('scripts')
@endsection