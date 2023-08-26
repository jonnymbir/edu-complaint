<!-- sample modal content -->
<div wire:ignore.self id="addDivisionModal" class="modal fade" tabindex="-1" aria-labelledby="addDivisionModal"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="addDivisionModalLabel">
					Create Division
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form wire:submit.prevent="store">
				<div class="modal-body">
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="div_name">Division name</label>
								<input type="text" class="form-control" id="div_name" placeholder="Division name"
								       required wire:model="div_name">
								
								@error('div_name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="div_email">Division email</label>
								<input type="text" class="form-control" id="div_email" placeholder="Division name"
								       required wire:model="div_email">
								
								@error('div_email')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						
							<div class="col-md-6 mb-3">
								<label for="div_contact_person">Division Contact Person</label>
								<input type="text" class="form-control" id="div_contact_person" placeholder="Division Contact Person"
								       required wire:model="div_contact_person">
								
								@error('div_contact_person')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="div_contact_person_telephone">Contact Person Telephone</label>
								<input type="text" class="form-control" id="div_contact_person_telephone" placeholder="Contact Person Telephone" wire:model="div_contact_person_telephone">
								
								@error('div_contact_person_telephone')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-12 mb-3">
								<label for="div_cc">Division CC</label>
								<textarea class="form-control" rows="5" id="div_cc" placeholder="Division CC" wire:model="div_cc"></textarea>
								
								@error('div_cc')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						
						</div>
					</div>
				
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
						Add Division
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