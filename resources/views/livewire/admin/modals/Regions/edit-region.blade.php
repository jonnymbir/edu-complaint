<!-- sample modal content -->
<div wire:ignore.self
     class="modal fade"
     id="editRegionModal"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="editRegionModal"
     aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header d-flex align-items-center">
				<h4 class="modal-title" id="myModalLabel">
					Create Region
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
				<div class="modal-body">
					<div class="card-body">
							<div class="row">
								<div class="col-md-12 mb-3">
									<label for="first_name">Region name</label>
									<input type="text" class="form-control" id="first_name" placeholder="Region name" required wire:model="region_name">
									
									@error('region_name')
									<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								
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
												
												@isset($this->districts)
													{{-- loop through district for this region and add option for adding new one and remove old and new --}}
													@foreach($this->districts as $key => $district)
														<div class="col-md-12 mb-3">
															<label for="first_name">District name</label>
															<input type="text" class="form-control" id="district_name" placeholder="District name" readonly disabled value="{{ $district->name }}">
														</div>
														{{-- remove button for each newly added inputs --}}
														<div class="col-md-12 mb-3">
															<button class="btn btn-danger btn-sm" wire:click.prevent="deleteDistrict({{ $district->id }})">
																<i class="fa fa-minus"></i>
															</button>
														</div>
													@endforeach
													
													{{-- add new district --}}
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
															{{-- remove button for each newly added inputs --}}
															<div class="col-md-12 mb-3">
																<button class="btn btn-danger btn-sm" wire:click.prevent="removeDistrict({{ $i }})">
																	<i class="fa fa-minus"></i>
																</button>
															</div>
														@endfor
													@endif
													
													<div class="col-md-12 mb-3">
														<button class="btn btn-primary btn-sm" wire:click.prevent="addDistrict">
															<i class="fa fa-plus"></i>
														</button>
													</div>
												@endisset
												
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info rounded-pill px-4 mt-3" wire:click.prevent="update">
						Save Changes
					</button>
					<button type="button" class="btn btn-danger rounded-pill px-4 mt-3" data-bs-dismiss="modal">
						Close
					</button>
				</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>