<!-- Modal -->
<div wire:ignore.self class="modal fade" id="viewActivityModal" data-backdrop="static" data-keyboard="false"
     tabindex="-1" aria-labelledby="viewActivityModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewActivityModalLabel">View activity</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='resetFields'></button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header">
						Causer
					</div>
					<div class="card-body">
						<input type="text" class="form-control" value="User" disabled readonly wire:model='causer_type'>
						<br>
						<input type="text" class="form-control" value="Something Here" disabled readonly wire:model='causer_id'>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						Subject
					</div>
					<div class="card-body">
						<input type="text" class="form-control" value="User" disabled readonly wire:model='subject_type'>
						@if ($this->subject_id)
							<br>
							<input type="text" class="form-control" value="Something Here" disabled readonly wire:model='subject_id'>
						@endif
					</div>
				</div>
				
				<div class="form-group">
					<textarea class="form-control" cols="10" rows="5" disabled readonly wire:model='description'></textarea>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-6 table-responsive">
						<h5>Attributes</h5>
						<table class="table table-bordered">
							<thead class="thead-light">
							<tr>
								<th>Key</th>
								<th>Value</th>
							</tr>
							</thead>
							<tbody>
							@if ($this->properties && isset($this->properties['attributes']))
								@foreach (array_slice($this->properties['attributes'], 0, 9) as $key => $value)
									<tr>
										<td>{{ $key }}</td>
										<td>{{ $value }}</td>
									</tr>
								@endforeach
							@endif
							</tbody>
						</table>
					</div>
					<div class="col-6 table-responsive">
						<h5>Old</h5>
						<table class="table table-bordered">
							<thead class="thead-light">
							<tr>
								<th>Key</th>
								<th>Value</th>
							</tr>
							</thead>
							<tbody>
							@if ($this->properties && isset($this->properties['old']))
								@foreach (array_slice($this->properties['old'], 0, 9) as $key => $value)
									<tr>
										<td>{{ $key }}</td>
										<td>{{ $value }}</td>
									</tr>
								@endforeach
							@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click='resetFields'>Close</button>
			</div>
		</div>
	</div>
</div>