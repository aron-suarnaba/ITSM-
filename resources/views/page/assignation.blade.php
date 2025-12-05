<div class="page-header d-print-none" aria-label="Page header">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <ol class="breadcrumb" aria-label="breadcrumbs">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#">Assignation</a>
                        </li>
                    </ol>
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">My Approvals</div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-vcenter card-center mb-4">
                                <thead>
                                    <tr>
                                        <th>Ticket No.</th>
                                        <th>Requested By</th>
                                        <th>Requested Date</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($approves as $approve)
                                        <tr class="fw-bold clickable-row" data-bs-target="#AssignmentModal"
                                            data-bs-toggle="modal" data-id="{{ $approve->id }}"
                                            data-created_at="{{ $approve->created_at }}"
                                            data-status="{{ $approve->status }}"
                                            data-requested_date="{{ $approve->requested_date }}"
                                            data-requested_by_id="{{ $approve->requested_by_id }}"
                                            data-needed_date="{{ $approve->needed_date }}"
                                            data-requested_cat="{{ $approve->requested_cat }}"
                                            data-request_type="{{ $approve->request_type }}"
                                            data-detailed_description="{{ $approve->detailed_description }}"
                                            data-reject_on_approval_notes="{{ $approve->reject_on_approval_notes }}"
                                            data-reject_at="{{ $approve->reject_at }}"
                                            data-review_key="{{ $approve->review_key }}"
                                            data-ticket_number="{{ $approve->ticket_number }}"
                                            data-approved_by_id="{{ $approve->approved_by_id }}"
                                            data-approval_rejected_notes="{{ $approve->approval_rejected_notes }}"
                                            data-void_at="{{ $approve->void_at }}"
                                            data-employee_id="{{ $approve->employee_id }}"
                                            data-first_name="{{ $approve->first_name }}"
                                            data-last_name="{{ $approve->last_name }}"
                                            data-manager_id="{{ $approve->manager_id }}"
                                            data-position="{{ $approve->position }}"
                                            data-department="{{ $approve->department }}">
                                            <td>{{ $approve->ticket_number }}</td>
                                            <td>{{ $approve->last_name ?? 'N/A' }}, {{ $approve->first_name ?? 'N/A' }}</td>
                                            <td>{{ $approve->requested_date ?? 'N/A' }}</td>
                                            <td>{{ $approve->requested_cat ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge bg-blue text-blue-fg">
                                                    {{ $approve->status ?? 'N/A' }}
                                                </span>
                                            </td>


                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No approval records found.</td>
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
