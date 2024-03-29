<!-- sample modal content -->
<div wire:ignore.self id="replyComplaintModal" class="modal fade" tabindex="-1" aria-labelledby="replyComplaintModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			
			@if($this->complaint)
				<div class="modal-header d-flex align-items-center">
					<h4 class="modal-title" id="myModalLabel">
						Reply Concern <strong>{{ $this->complaint->ticket_number }}</strong>
						<span class="ms-2">
							@if($this->complaint->status === 'pending')
								<span class="badge bg-warning">{{ $this->complaint->status }}</span>
							@elseif($this->complaint->status === 'closed')
								<span class="badge bg-info">{{ $this->complaint->status }}</span>
							@elseif($this->complaint->status === 'resolved')
								<span class="badge bg-success">{{ $this->complaint->status }}</span>
							@elseif($this->complaint->status === 'open')
								<span class="badge bg-danger">{{ $this->complaint->status }}</span>
							@elseif($this->complaint->status === 'forwarded')
								<span class="badge bg-primary">{{ $this->complaint->status }}</span>
							@elseif($this->complaint->status === 'overdue')
								<span class="badge bg-danger">{{ $this->complaint->status }}</span>
						@endif
					</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="resetForm"></button>
				</div>
				<form wire:submit.prevent="submitResponse">
					<div class="modal-body">
						
						@include('flash-message')
						
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="comment">Response Channel ({{ $this->complaint->telephone }})</label>
									<input type="text" class="form-control" value="{{ $this->complaint->response_channel }}" disabled readonly />
								</div>
								
								@can('complaints.update_status')
									<div class="col-md-12 mb-3">
										<label for="comment">Response Status</label>
										<select class="form-control" wire:model="status" required>
											<option value="">Select Status</option>
											<option value="pending">Pending</option>
											<option value="responded">Responded</option>
											<option value="resolved">Resolved</option>
											<option value="closed">Closed</option>
											<option value="forwarded">Forwarded</option>
											<option value="overdue">Overdue</option>
										</select>
									</div>
								@endcan
								
								<div class="col-md-12 mb-3">
									<label for="response">Response</label>
									<textarea class="form-control" id="response" rows="10" cols="20" placeholder="Provide response to this Concern" required wire:model="response"></textarea>
									
									@error('response')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							</div>
						
						</div>
					
					</div>
					<div class="modal-footer">
						<button class="btn btn-info rounded-pill px-4 mt-3" type="submit" wire:loading.remove wire:target="submitResponse">
							Submit Response
						</button>
						<button class="btn btn-info rounded-pill px-4 mt-3" type="button" disabled wire:loading wire:target="submitResponse">
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
							<span class="visually-hidden">Loading...</span> &nbsp; Submitting...
						</button>
						<button type="button" class="btn btn-danger rounded-pill px-4 mt-3" wire:click="resetForm" data-bs-dismiss="modal">
							Close
						</button>
					</div>
				</form>
			@else
				<div class="modal-body">
					<div class="card-body">
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary" role="status">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>