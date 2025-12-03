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
                            <a href="#">Request</a>
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

            <div class="col-sm-12 col-md-3" style="max-height: 230px;">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Request Catalog
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2" role="group" aria-label="Request Categories">
                            <button type="button" class="btn btn-primary text-wrap RequestCatButton"
                                id="TechSuppReqButton" data-bs-toggle="modal" data-bs-target="#requestModal">Technical
                                Support</button>
                            <button type="button" class="btn btn-primary text-wrap RequestCatButton"
                                id="SoftwareAppRequest" data-bs-toggle="modal" data-bs-target="#requestModal">Software &
                                Applications</button>
                            <button type="button" class="btn btn-primary text-wrap RequestCatButton" id="OtherReqButton"
                                data-bs-toggle="modal" data-bs-target="#requestModal">Others</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Recently Ticket Request</div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-center mb-4">
                                <thead>
                                    <tr>
                                        <th>Date and Time Requested</th>
                                        <th>Request Category</th>
                                        <th>Request Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- *** CHANGE $request to $item here *** --}}
                                    @forelse ($requests as $item)
                                        <tr class="fw-bold clickable-row" data-bs-toggle="modal"
                                            data-bs-target="#requestDetailsModal"
                                            data-created-at="{{ $item->created_at->toDateTimeString() }}"
                                            data-needed-date="{{ $item->needed_date }}"
                                            data-requested-cat="{{ $item->requested_cat }}"
                                            data-requested-details="{{ $item->requested_details }}"
                                            data-request-type="{{ $item->request_type }}"
                                            data-detailed-description="{{ $item->detailed_description }}"
                                            data-status="{{ $item->status }}">

                                            {{-- Table Cells (td) for Request History --}}
                                            <td>{{ $item->created_at->format('g:i A, F j, Y ') }}</td>
                                            <td>{{ $item->requested_cat }}</td>
                                            <td>{{ $item->request_type }}</td>
                                            <td>
                                                {{-- Status Badge Logic Here --}}
                                                @if ($item->status == 'For Review')
                                                    <span class="badge bg-orange text-orange-fg">{{ $item->status }}</span>
                                                @elseif ($item->status == 'For Approval')
                                                    <span class="badge bg-cyan text-cyan-fg">{{ $item->status }}</span>
                                                @endif
                                                {{-- ... other status conditions ... --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No activity tables</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="row g-2 justify-content-center justify-content-sm-between mb-3">
                                {{-- This call is now safe, referring to the collection passed from the controller --}}
                                {{ $requests->links('pagination::bootstrap-5') }}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
