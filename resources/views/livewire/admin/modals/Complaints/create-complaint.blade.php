<!-- sample modal content -->
<div wire:ignore.self id="addComplaintModal" class="modal fade" tabindex="-1" aria-labelledby="addComplaintModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="myModalLabel">
					Create New Complaint
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form wire:submit.prevent="createComplaint">
				<div class="modal-body">
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 mb-3">
								<label for="first_name">First name</label>
								<input type="text" class="form-control" id="first_name" placeholder="First name" wire:model="first_name">
								
								@error('first_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label for="first_name">Middle name</label>
								<input type="text" class="form-control" id="middle_name" placeholder="Middle name" wire:model="middle_name">
								
								@error('middle_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label for="last_name">Last name</label>
								<input type="text" class="form-control" id="last_name" placeholder="Last name" wire:model="last_name">
								
								@error('last_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-4 mb-3">
								<label for="email_address">Email Address</label>
								<input type="email" class="form-control" id="email_address" placeholder="Email Address" wire:model="email_address">
								
								@error('email_address')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label for="telephone">Telephone</label>
								<input type="number" class="form-control" id="telephone" placeholder="Telephone" wire:model="telephone">
								
								@error('telephone')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="col-md-4 mb-3">
								<label for="sex">Sex</label>
								<select class="form-control" id="sex" wire:model.lazy="sex">
									<option value="">Choose</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
								
								@error('sex')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="region">Region</label>
								<select class="form-control" id="region" wire:model.lazy="region">
									<option value="">Choose</option>
									@foreach($regions as $region)
										<option value="{{ $region->id }}">{{ $region->name }}</option>
									@endforeach
								</select>
								
								@error('region')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="col-md-6 mb-3">
								<label for="district">District</label>
								<select class="form-control" id="district" wire:model.lazy="district">
									<option value="">Choose</option>
									@foreach($districts as $district)
										<option value="{{ $district->id }}">{{ $district->name }}</option>
									@endforeach
								</select>
								
								@error('district')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="stakeholder_type">Stakeholder Type</label>
								<select class="form-control" id="stakeholder_type" wire:model.lazy="stakeholder_type">
									<option value="student">Student</option>
									<option value="parent">Parent</option>
									<option value="staff">Staff</option>
									<option value="public">Public</option>
								</select>
								
								@error('stakeholder_type')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="col-md-6 mb-3">
								<label for="concern">Concern</label>
								<select class="form-control" id="concern" wire:model.lazy="concern">
									<option selected value="">Select a Concerns</option>
									<option value="feedback">Feedback</option>
									<option value="grievance">Grievance</option>
									<option value="recommendation">Recommendation</option>
									<option value="complaint">Complaint</option>
								</select>
								
								@error('concern')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-12 mb-3">
								<label for="details">Details</label>
								<textarea class="form-control" id="details" placeholder="Details" rows="5" cols="30" wire:model="details"></textarea>
								
								@error('details')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-4 mb-3">
								<label for="response_channel">Response Channel</label>
								<select class="form-control" id="concern" wire:model.lazy="response_channel">
									<option selected value="">Select Option</option>
									<option value="email">Email</option>
									<option value="telephone">Telephone</option>
									<option value="whatsapp">WhatsApp</option>
									<option value="field_visit">Field Visit</option>
									<option value="none">None</option>
								</select>
								
								@error('response_channel')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-4 mb-3">
								<label for="age_range">Age Range</label>
								<input type="text" class="form-control" id="age_range" wire:model="age_range">
								<small class="text-muted">e.g 18-25</small>
								
								@error('age_range')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-4 mb-3">
								<label for="last_name">Is Anonymous</label> <br>
								<input type="checkbox" class="form-check-input" id="is_anonymous" wire:model="is_anonymous">
								<label class="" for="is_anonymous">
									Do you want this anonymized?
								</label>
								
								@error('is_anonymous')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						
						</div>
					
					</div>
				
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit" wire:loading.attr="disabled">
						Add Complaint
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