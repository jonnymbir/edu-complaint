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
							<div class="col-md-12 mb-3">
								<label for="forward_type">Forward Type</label>
								<select class="form-control" id="forward_type" wire:model.lazy="forward_type">
									<option selected value="">Select Option</option>
									<option value="division">Division</option>
									<option value="unit">Unit</option>
								</select>
								
								@error('forward_type')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							@if($this->forward_type === 'division')
								<div class="col-md-6 mb-3">
									<label for="division">Divisions</label>
									<select class="form-control" id="division" wire:model.lazy="division">
										<option selected value="">Select Option</option>
										@foreach($divisions as $division)
											<option value="{{ $division->id }}">{{ $division->div_name }}</option>
										@endforeach
									</select>
									
									@error('division')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							
								<div class="col-md-6 mb-3">
									<label for="div_email">Division Email</label>
									<input type="text" class="form-control" id="div_email" disabled readonly placeholder="Email for this Division" wire:model.lazy="div_email">
									
									@error('div_email')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							@endif
							
							@if($this->forward_type === 'unit')
								<div class="col-md-6 mb-3">
									<label for="unit">Units</label>
									<select class="form-control" id="unit" wire:model.lazy="unit">
										<option selected value="">Select Option</option>
										@foreach($units as $unit)
											<option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
										@endforeach
									</select>
									
									@error('unit')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								
								<div class="col-md-6 mb-3">
									<label for="unit_email">Unit Email</label>
									<input type="text" class="form-control" id="unit_email" disabled readonly placeholder="Email for this Unit" wire:model.lazy="unit_email">
									
									@error('unit_email')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
							@endif
							
							<div class="col-md-12 mb-3">
								<label for="cc">CC</label>
								<input type="text" class="form-control" id="cc" placeholder="CC" wire:model="cc">
								<small class="text-muted">Separate emails with comma</small>
								
								@error('cc')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-12 mb-3">
								<label for="note">Additional Information</label>
								<textarea class="form-control" rows="5" name="note" id="note" placeholder="note" wire:model="note"></textarea>
								<small class="text-muted">Provide additional information to the recipient </small>
								
								@error('note')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
						</div>
					</div>
				
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit" wire:loading.class.remove="disabled">
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