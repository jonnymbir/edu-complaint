<div>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-primary shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-primary d-flex align-items-center justify-content-center">
                            <i class="fas fa-database text-white fs-7" title="BTC"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Total Concerns</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{ $total_complaints }}</h3>
                        <span class="fw-bold">
                            <a href="{{ route('complaints') }}" class="text-primary">
                                View Details
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-danger shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-danger d-flex align-items-center justify-content-center">
                            <i class="fas fa-comment text-white fs-7" title="ETH"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Concerns Addressed</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{ $complaints_addressed }}</h3>
                        <span class="fw-bold">
                            <a href="{{ route('complaints', ['filter' => 'resolved']) }}" class="text-primary">
                                View Details
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-success shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-success d-flex align-items-center justify-content-center">
                            <i class="fas fa-forward text-white fs-7" title="LTC"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Concerns Forwarded</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{ $complaints_forwarded }}</h3>
                        <span class="fw-bold">
                            <a href="{{ route('complaints', ['filter' => 'forwarded']) }}" class="text-primary">
                                View Details
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-warning shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-warning d-flex align-items-center justify-content-center">
                            <i class="fas fa-user text-white fs-7" title="XRP"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Concerns Overdue</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{ $complaints_overdue }}</h3>
                        <span class="fw-bold">
                            <a href="{{ route('complaints', ['filter' => 'overdue']) }}" class="text-primary">
                                View Details
                            </a>
                        </span>
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
                            <h5 class="card-title fw-semibold">Recent Concerns</h5>
                            <p class="card-subtitle mb-0">List of recent concerns</p>
                        </div>
                        <div>
                            <select class="form-select" wire:model.live="date_search">
                                {{--									show all the month and year for this year --}}
                                {{--									<option value="">Select Month</option> --}}
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
                                @foreach ($months as $key => $month)
                                    <option value="{{ $month }}" {{ $month == $date_search ? 'selected' : '' }}>
                                        {{ $month }} {{ date('Y') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr class="text-muted fw-semibold">
                                    <th scope="col" class="ps-0">Full Name</th>
                                    <th scope="col" class="ps-0">Telephone</th>
                                    <th scope="col">Concern</th>
                                    <th scope="col">Category's Assigned</th>
                                    <th scope="col">Response Channel</th>
                                    <th scope="col">Status</th>
                                    {{--								<th scope="col">Creation Date</th> --}}
                                </tr>
                            </thead>
                            <tbody class="border-top">
                                @foreach ($recent_complaints as $key => $recent_complaint)
                                    <tr wire:key="{{ $key }}">
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 pe-1">
                                                    <img src="{{ asset('dist/images/profile/user-13.png') }}"
                                                        class="rounded-circle" width="40" height="40"
                                                        alt="" />
                                                </div>
                                                <div>
                                                    <h6 class="fw-semibold mb-1">{{ $recent_complaint->full_name }}
                                                    </h6>
                                                    <p class="fs-2 mb-0 text-muted">
                                                        {{ $recent_complaint->stakeholder_type }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fs-3">{{ $recent_complaint->telephone }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 fs-3">{{ $recent_complaint->concern }}</p>
                                        </td>
                                        <td>
                                            @if ($recent_complaint->complaintCategory)
                                                <p class="mb-0 fs-3">
                                                    {{ $recent_complaint->complaintCategory->name }},
                                                </p>
                                            @endif
                                            {{-- <p class="mb-0 fs-3">{{ $recent_complaint->complaintCategory?->name ?? 'Not Specified' }}</p> --}}
                                            @foreach ($recent_complaint->categories->take(1) as $category)
                                                <p class="mb-0 fs-3">
                                                    {{ $category->name }}
                                                    {{ count($recent_complaint->categories) > 1 && $loop->last ? ' & ' . count($recent_complaint->categories) - 1 . ' more' : '' }}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge fw-semibold py-1 w-85 bg-light-primary text-primary">
                                                {{ $recent_complaint->response_channel }}
                                            </span>
                                        </td>
                                        <td>
                                            <p class="fs-3 text-dark mb-0">
                                                @if ($recent_complaint->status === 'pending')
                                                    <span
                                                        class="badge fw-semibold py-1 w-85 bg-light-warning text-warning">
                                                        {{ $recent_complaint->status }}
                                                    </span>
                                                @elseif($recent_complaint->status === 'resolved')
                                                    <span
                                                        class="badge fw-semibold py-1 w-85 bg-light-success text-success">
                                                        {{ $recent_complaint->status }}
                                                    </span>
                                                @elseif($recent_complaint->status === 'closed')
                                                    <span
                                                        class="badge fw-semibold py-1 w-85 bg-light-danger text-danger">
                                                        {{ $recent_complaint->status }}
                                                    </span>
                                                @elseif($recent_complaint->status === 'forwarded')
                                                    <span
                                                        class="badge fw-semibold py-1 w-85 bg-light-primary text-primary">
                                                        {{ $recent_complaint->status }}
                                                    </span>
                                                @elseif($recent_complaint->status === 'overdue')
                                                    <span
                                                        class="badge fw-semibold py-1 w-85 bg-light-danger text-danger">
                                                        {{ $recent_complaint->status }}
                                                    </span>
                                                @else
                                                    <span class="badge fw-semibold py-1 w-85 bg-light-info text-info">
                                                        {{ $recent_complaint->status }}
                                                    </span>
                                                @endif
                                            </p>
                                        </td>
                                        {{--									<td> --}}
                                        {{--										<p class="mb-0 fs-3">{{ date('dS F, Y', strtotime($recent_complaint->created_at)) }}</p> --}}
                                        {{--									</td> --}}
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
