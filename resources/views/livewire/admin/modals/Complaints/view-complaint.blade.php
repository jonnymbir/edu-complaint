<!-- sample modal content -->
<div wire:ignore.self id="viewComplaintModal" class="modal fade" tabindex="-1" aria-labelledby="viewComplaintModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="myModalLabel">
					Complaint ID: <strong>{{ $this->ticket_number }}</strong>
					<span class="ms-2">
						@if($this->status === 'pending')
							<span class="badge bg-warning">{{ $this->status }}</span>
						@elseif($this->status === 'closed')
							<span class="badge bg-info">{{ $this->status }}</span>
						@elseif($this->status === 'resolved')
							<span class="badge bg-success">{{ $this->status }}</span>
						@elseif($this->status === 'open')
							<span class="badge bg-danger">{{ $this->status }}</span>
						@elseif($this->status === 'forwarded')
							<span class="badge bg-primary">{{ $this->status }}</span>
						@elseif($this->status === 'overdue')
							<span class="badge bg-danger">{{ $this->status }}</span>
						@endif
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
				<div class="card-body">
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="first_name">First name</label>
							<input type="text" class="form-control" id="first_name" placeholder="First name" disabled readonly wire:model="first_name">
						</div>
						<div class="col-md-4 mb-3">
							<label for="first_name">Middle name</label>
							<input type="text" class="form-control" id="middle_name" placeholder="Middle name" disabled readonly wire:model="middle_name">
						</div>
						<div class="col-md-4 mb-3">
							<label for="last_name">Last name</label>
							<input type="text" class="form-control" id="last_name" placeholder="Last name" disabled readonly wire:model="last_name">
						</div>
						
						<div class="col-md-4 mb-3">
							<label for="email_address">Email Address</label>
							<input type="text" class="form-control" id="email_address" placeholder="Email Address" disabled readonly wire:model="email_address">
						</div>
						<div class="col-md-4 mb-3">
							<label for="telephone">Telephone</label>
							<input type="text" class="form-control" id="telephone" placeholder="Telephone" disabled readonly wire:model="telephone">
						</div>
						<div class="col-md-4 mb-3">
							<label for="sex">Sex</label>
							<input type="text" class="form-control" id="sex" placeholder="Sex" disabled readonly wire:model="sex">
						</div>
						
						<div class="col-md-6 mb-3">
							<label for="last_name">Region</label>
							<input type="text" class="form-control" id="region" placeholder="Region" disabled readonly wire:model="region">
						</div>
						<div class="col-md-6 mb-3">
							<label for="last_name">District</label>
							<input type="text" class="form-control" id="district" placeholder="District" disabled readonly wire:model="district">
						</div>
						
						<div class="col-md-6 mb-3">
							<label for="last_name">Stakeholder Type</label>
							<input type="text" class="form-control" id="stakeholder_type" placeholder="Stakeholder Type" disabled readonly wire:model="stakeholder_type">
						</div>
						<div class="col-md-6 mb-3">
							<label for="last_name">Concern</label>
							<input type="text" class="form-control" id="concern" placeholder="Concern" disabled readonly wire:model="concern">
						</div>
						
						<div class="col-md-12 mb-3">
							<label for="last_name">Details</label>
							<textarea class="form-control" id="details" placeholder="Details" disabled readonly wire:model="details"></textarea>
						</div>
						
						<div class="col-md-4 mb-3">
							<label for="response_channel">Response Channel</label>
							<input type="text" class="form-control" id="response_channel" placeholder="Response Channel" disabled readonly wire:model="response_channel">
						</div>
						<div class="col-md-4 mb-3">
							<label for="is_anonymous">Is Anonymous</label>
							<input type="text" class="form-control" id="is_anonymous" disabled readonly wire:model="is_anonymous">
						</div>
						<div class="col-md-4 mb-3">
							<label for="age_range">Age Range</label>
							<input type="text" class="form-control" id="age_range" disabled readonly wire:model="age_range">
						</div>
						
						@include('flash-message')
						<div class="col-md-12 mb-3">
							<label for="complaint_category">Assign Category</label>
							<select class="form-control" id="complaint_category" wire:model.lazy="complaint_category">
								<option value="">Select Category</option>
								@foreach($complaint_categories as $key => $complaint_category)
									<option value="{{ $complaint_category->id }}">{{ $complaint_category->name }}</option>
								@endforeach
							</select>
						</div>
						
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 mb-3">
							<h3>Comments</h3>
							
							@if($this->complaint)
								@forelse($this->complaint->comments as $key => $response)
									<div class="card mb-3">
										<div class="card-body">
											<h5 class="card-title">{{ $response->user?->name }}</h5>
											<p class="card-text">{{ $response->comment }}</p>
											<p class="card-text">
												<small class="text-muted">{{ date('dS M, Y', strtotime($response->updated_at)) }}</small>
											</p>
										</div>
									</div>
								@empty
									<div class="card mb-3">
										<div class="card-body">
											<h5 class="card-title">No Responses</h5>
										</div>
									</div>
								@endforelse
							@endif
							
						</div>
					</div>
					
					@can('complaints.comment')
						@include('flash-message')
						
						<form wire:submit.prevent="submitComment">
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="comment">Comment</label>
									<textarea class="form-control" id="comment" rows="10" cols="20" placeholder="Comment your reply here!" required wire:model="comment"></textarea>
									
									@error('comment')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
							
							<button class="btn btn-info rounded-pill px-4 mt-3" type="submit" >
								Submit Comment
							</button>
						</form>
					@endcan
				
				</div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger rounded-pill px-4 mt-3" data-bs-dismiss="modal">
					Close
				</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>