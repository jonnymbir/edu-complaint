<!-- sample modal content -->
<div wire:ignore.self id="addUnitModal" class="modal fade" tabindex="-1" aria-labelledby="addUnitModal"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="addUnitModalLabel">
					Create Unit
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form wire:submit.prevent="store">
				<div class="modal-body">
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="unit_name">Unit name</label>
								<input type="text" class="form-control" id="unit_name" placeholder="Unit name"
								       required wire:model="unit_name">
								
								@error('unit_name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="unit_email">Unit email</label>
								<input type="text" class="form-control" id="unit_email" placeholder="Unit name"
								       required wire:model="unit_email">
								
								@error('unit_email')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="unit_contact_person">Unit Contact Person</label>
								<input type="text" class="form-control" id="unit_contact_person" placeholder="Unit Contact Person"
								       required wire:model="unit_contact_person">
								
								@error('unit_contact_person')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="unit_contact_person_telephone">Contact Person Telephone</label>
								<input type="text" class="form-control" id="unit_contact_person_telephone" placeholder="Contact Person Telephone" wire:model="unit_contact_person_telephone">
								
								@error('unit_contact_person_telephone')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							<div class="col-md-12 mb-3">
								<label for="unit_cc">Unit CC</label>
								<textarea class="form-control" rows="5" id="unit_cc" placeholder="Unit CC" wire:model="unit_cc"></textarea>
								
								@error('unit_cc')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						
						</div>
					</div>
				
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
						Add Unit
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