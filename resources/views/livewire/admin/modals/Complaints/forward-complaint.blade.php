<!-- sample modal content -->
<div wire:ignore.self id="forwardComplaintModal" class="modal fade" tabindex="-1" aria-labelledby="forwardComplaintModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="myModalLabel">
					Forward Complaint
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form wire:submit.prevent="forwardComplaint">
				<div class="modal-body">
					
					@include('flash-message')
					
					<div class="card-body">
						<div class="row">
{{--							<div class="col-md-6 mb-3">--}}
{{--								<label for="response_channel">Forward Type</label>--}}
{{--								<select class="form-control" id="concern" wire:model.lazy="response_channel">--}}
{{--									<option selected value="">Select Option</option>--}}
{{--									<option value="email">Email</option>--}}
{{--									<option value="telephone">Telephone</option>--}}
{{--									<option value="whatsapp">WhatsApp</option>--}}
{{--									<option value="field_visit">Field Visit</option>--}}
{{--									<option value="none">None</option>--}}
{{--								</select>--}}
{{--								--}}
{{--								@error('response_channel')--}}
{{--								<span class="text-danger">{{ $message }}</span>--}}
{{--								@enderror--}}
{{--							</div>--}}
						</div>
					</div>
				
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
						Forward Complaint
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