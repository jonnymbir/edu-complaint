<div>
	
		<!--  Owl carousel -->
		<div class="owl-carousel counter-carousel owl-theme" wire:ignore>
{{--			<div class="item">--}}
{{--				<div class="card border-0 zoom-in bg-light-primary shadow-none">--}}
{{--					<div class="card-body">--}}
{{--						<div class="text-center">--}}
{{--							<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="" />--}}
{{--							<p class="fw-semibold fs-3 text-primary mb-1">Total Users </p>--}}
{{--							<h5 class="fw-semibold text-primary mb-0">{{ $count_users }}</h5>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
			<div class="item">
				<div class="card border-0 zoom-in bg-light-warning shadow-none">
					<div class="card-body">
						<div class="text-center">
							<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="" />
							<p class="fw-semibold fs-3 text-warning mb-1">Total Grievances</p>
							<h5 class="fw-semibold text-warning mb-0">{{ $total_complaints }}</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card border-0 zoom-in bg-light-info shadow-none">
					<div class="card-body">
						<div class="text-center">
							<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="" />
							<p class="fw-semibold fs-3 text-info mb-1">Grievances Addressed</p>
							<h5 class="fw-semibold text-info mb-0">{{ $complaints_addressed }}</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="card border-0 zoom-in bg-light-danger shadow-none">
					<div class="card-body">
						<div class="text-center">
							<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="" />
							<p class="fw-semibold fs-3 text-danger mb-1">Grievances Forwarded</p>
							<h5 class="fw-semibold text-danger mb-0">{{ $complaints_forwarded }}</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  Row 3 -->
		<div class="row">
			<!-- Top Performers -->
			<div class="col-lg-12 d-flex align-items-strech">
				<div class="card w-100">
					<div class="card-body">
						<div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
							<div class="mb-3 mb-sm-0">
								<h5 class="card-title fw-semibold">Recent Complaints</h5>
								<p class="card-subtitle mb-0">List of recent complaints</p>
							</div>
							<div>
								<select class="form-select" wire:model.live="date_search">
{{--									show all the month and year for this year--}}
{{--									<option value="">Select Month</option>--}}
									@php
										$months = [
											'01' => 'January',
											'02' => 'February',
											'03' => 'March',
											'04' => 'April',
											'05' => 'May',
											'06' => 'June',
											'07' => 'July',
											'08' => 'August',
											'09' => 'September',
											'10' => 'October',
											'11' => 'November',
											'12' => 'December',
										];
									 @endphp
									@foreach($months as $key => $month)
										<option value="{{ $month }}" {{ $month == $date_search ? 'selected' : '' }}>
											{{ $month }} {{ date('Y') }}
										</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table align-middle text-nowrap mb-0">
								<thead>
								<tr class="text-muted fw-semibold">
									<th scope="col" class="ps-0">Full Name</th>
									<th scope="col">Concern</th>
									<th scope="col">Response Channel</th>
									<th scope="col">Status</th>
								</tr>
								</thead>
								<tbody class="border-top">
								@foreach($recent_complaints as $key => $recent_complaint)
									<tr>
										<td class="ps-0">
											<div class="d-flex align-items-center">
												<div class="me-2 pe-1">
													<img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="" />
												</div>
												<div>
													<h6 class="fw-semibold mb-1">{{ $recent_complaint->full_name }}</h6>
													<p class="fs-2 mb-0 text-muted">{{ $recent_complaint->stakeholder_type }}</p>
												</div>
											</div>
										</td>
										<td>
											<p class="mb-0 fs-3">{{ $recent_complaint->concern }}</p>
										</td>
										<td>
											<span class="badge fw-semibold py-1 w-85 bg-light-primary text-primary">
												{{ $recent_complaint->response_channel }}
											</span>
										</td>
										<td>
											<p class="fs-3 text-dark mb-0">
												@if($recent_complaint->status === 'pending')
													<span class="badge fw-semibold py-1 w-85 bg-light-warning text-warning">
														{{ $recent_complaint->status }}
													</span>
												@elseif($recent_complaint->status === 'resolved')
													<span class="badge fw-semibold py-1 w-85 bg-light-success text-success">
														{{ $recent_complaint->status }}
													</span>
												@elseif($recent_complaint->status === 'closed')
													<span class="badge fw-semibold py-1 w-85 bg-light-danger text-danger">
														{{ $recent_complaint->status }}
													</span>
												@elseif($recent_complaint->status === 'forwarded')
													<span class="badge fw-semibold py-1 w-85 bg-light-primary text-primary">
														{{ $recent_complaint->status }}
													</span>
												@else
													<span class="badge fw-semibold py-1 w-85 bg-light-info text-info">
														{{ $recent_complaint->status }}
													</span>
												@endif
											</p>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	
</div>
