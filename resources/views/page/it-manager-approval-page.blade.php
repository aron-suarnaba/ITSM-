<div class="page-header d-print-none" aria-label="Page header">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-title">
                    <div class="ol breadcrumb" aria-label="breadcrumbs">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <div class="breadcrumb-item active">
                            <a href="#">Approval</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-12 col-md-9">

                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Recently Ticket Request</div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive rounded">
                                <table class="table table-vcenter mb-4 table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Department</th>
                                            <th>Requested At</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr class="fw-bold clickable-row"
                                            data-site="{{ $user->site }}"
                                            data-site="{{ $user->site }}"
                                            data-first_name="{{ $user->first_name }}"
                                            data-last_name="{{ $user->last_name }}"
                                            data-department="{{ $user->department }}"
                                            data-position="{{ $user->position }}"
                                            data-manager_id="{{ $user->manager_id }}"
                                            data-id="{{ $user->id }}" data-created_at="{{ $user->created_at }}"
                                            data-status="{{ $user->status }}" data-needed_date="{{ $user->needed_date }}"
                                            data-requested_cat="{{ $user->requested_cat }}" data-requested_details="{{ $user->requested_details }}"
                                            data-request_type="{{ $user->request_type }}" data-detailed_description="{{ $user->detailed_description }}"
                                            data-review_key="{{ $user->review_key }}"
                                            data-bs-toggle="modal" data-bs-target="#ApprovalITManagerModal"
                                            >
                                                <td>{{ $user->last_name }}, {{ $user->first_name }}</td>
                                                <td>{{ $user->position }}</td>
                                                <td>{{ $user->department }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->requested_cat }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Approval Request</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
