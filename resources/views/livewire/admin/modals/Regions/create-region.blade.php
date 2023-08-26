<!-- sample modal content -->
<div wire:ignore.self id="addRegionModal" class="modal fade" tabindex="-1" aria-labelledby="addRegionModal"
     aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="myModalLabel">
					Create Region
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form wire:submit.prevent="store">
				<div class="modal-body">
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="first_name">Region name</label>
								<input type="text" class="form-control" id="first_name" placeholder="Region name"
								       required wire:model="region_name">
								
								@error('region_name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							
							@can('districts.list')
								<div class="accordion" id="accordionExample">
								<div class="accordion-item">
									<h2 class="accordion-header" id="headingOne">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
											Districts
										</button>
									</h2>
									<div id="collapseOne"
									     class="accordion-collapse collapse show"
									     aria-labelledby="headingOne"
									     data-bs-parent="#accordionExample" >
										<div class="accordion-body">
											
											{{--one input and a plus button to add more input for district--}}
											<div class="col-md-12 mb-3">
												<label for="first_name">District name</label>
												<input type="text" class="form-control" id="first_name" placeholder="District name"
												       required wire:model="district_name.0">
												
												@error('district_name.0')
												<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
											
											@if(count($district_name) > 1)
												@for($i = 1,$iMax = count($district_name); $i < $iMax; $i++)
													<div class="col-md-12 mb-3">
														<label for="first_name">District name</label>
														<input type="text" class="form-control" id="first_name"
														       placeholder="District name" required wire:model="district_name.{{ $i }}">
														
														@error('district_name.'.$i)
														<span class="text-danger">{{ $message }}</span>
														@enderror
													</div>
												
													@can('districts.delete')
														{{-- remove button for each newly added inputs --}}
														<div class="col-md-12 mb-3">
															<button class="btn btn-danger btn-sm" wire:click.prevent="removeDistrict({{ $i }})">
																<i class="fa fa-minus"></i>
															</button>
														</div>
													@endcan
												@endfor
											@endif
											
											@can('districts.create')
												<div class="col-md-12 mb-3">
													<button class="btn btn-primary btn-sm" wire:click.prevent="addDistrict">
														<i class="fa fa-plus"></i>
													</button>
												</div>
											@endcan
											
										</div>
									</div>
								</div>
							</div>
							@endcan
							
						</div>
					</div>
				
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
						Add Region
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