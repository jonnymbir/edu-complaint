@section('title', 'Activity Logs')

<div>
	
	<div class="container-fluid">
		<!-- --------------------------------------------------- -->
		<!--  Form Basic Start -->
		<!-- --------------------------------------------------- -->
		@component('components.admin.bread-crum-component')
			@slot('title')
				List of Activity Logs
			@endslot
		@endcomponent
		
		<section>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<!-- Filter ============================================= -->
							<div class="row">
								<div class="col">
									<div class="form-row d-flex justify-content-end">
{{--										<!-- Search Field ========================= -->--}}
{{--										<div class="col-sm-3 col-md-3 form-group">--}}
{{--											<label for="search">Search</label>--}}
{{--											<input type="text" class="form-control" placeholder="Search available parameters here" wire:model.live.debounce.550ms="search" />--}}
{{--										</div>--}}
										
										@can('activity_logs.clear')
											<!-- Button ========================= -->
											<div class="col-auto d-flex align-items-center ml-auto form-group">
												<button class="btn btn-danger btn-block" onclick="confirm('Are you sure you want to clear this logs?') || event.stopImmediatePropagation()" wire:click="clearAllLogs" >
													<i class="fa fa-trash"></i> Clear Logs
												</button>
											</div>
										@endcan
									</div>
								</div>
							</div>
							<!-- Filter End -->
						</div>
						<div class="card-body">
							
							<table class="table mb-0">
								<thead>
								<tr>
									<th>ID</th>
									<th>Log Name</th>
									<th>Description</th>
									<th>Created at</th>
									@if(auth()->user()->can('activity_logs.view'))
										<th scope="col">Action</th>
									@endif
								</tr>
								</thead>
								<tbody>
								@forelse ($activity_logs as $activity_log)
									<tr>
										<td>{{ $activity_log->id }}</td>
										<td>{{ $activity_log->log_name }}</td>
										<td>{{ Str::limit($activity_log->description, 50, '...') }}</td>
										<td>{{ $activity_log->created_at->format('M d, Y H:i A') }}</td>
										@if(auth()->user()->can('activity_logs.view'))
											<td>
												<button class="btn btn-sm btn-primary shadow btn-xs sharp me-1"
												        data-bs-toggle="modal" data-bs-target="#viewActivityModal"
												        wire:click="viewActivityLog({{ $activity_log->id }})">
													<i class="fa fa-eye"></i>
												</button>
											</td>
										@endif
									</tr>
								@empty
									<tr>
										<td colspan="5" class="text-center">No activity logs found</td>
									</tr>
								@endforelse
								</tbody>
							</table>
							
							<div class="mt-3">
								{{ $activity_logs->links() }}
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</section>
		
		@can('activity_logs.view')
			@include('livewire.admin.modals.ActivityLogs.view-activity-log')
		@endcan
	
	</div>

</div>
