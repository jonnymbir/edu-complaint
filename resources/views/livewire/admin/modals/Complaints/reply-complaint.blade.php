<!-- sample modal content -->
<div wire:ignore.self id="replyComplaintModal" class="modal fade" tabindex="-1" aria-labelledby="replyComplaintModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="myModalLabel">
					Reply This Complaint
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form wire:submit.prevent="submitResponse">
				<div class="modal-body">
					
					@include('flash-message')
					
					<div class="card-body">
						<div class="row">
							@if($this->complaint)
								<div class="col-md-12 mb-3">
									<label for="comment">Response Channel</label>
									<input type="text" class="form-control" value="{{ $this->complaint->response_channel }}" disabled readonly />
								</div>
							@endif
							
							<div class="col-md-12 mb-3">
								<label for="response">Response</label>
								<textarea class="form-control" id="response" rows="10" cols="20" placeholder="Provide response to this Grievances" required wire:model="response"></textarea>
								
								@error('response')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
					
					</div>
				
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
						Submit Response
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