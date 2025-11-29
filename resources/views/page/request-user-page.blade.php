<div class="page-header d-print-none" aria-label="Page header">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Ticket Request</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <div class="col-sm-12 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Request Catalog
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="text" name="search" id="" class="form-control" placeholder="Search">
                        </div>
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
                            <table class="table table-vcenter table-nowrap card-center mb-4">
                                <thead>
                                    <tr>
                                        <th>Date and Time Requested</th>
                                        <th>Needed Date</th>
                                        <th>Request Category</th>
                                        <th>Request Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($requests as $request)
                                        <tr class="fw-bold clickable-row" data-bs-toggle="modal"
                                            data-bs-target="#requestDetailsModal" {{-- REMOVED: data-last_name and data-first_name
                                            --}} {{-- DATE/TIME DATA REMAINS --}}
                                            data-created_at="{{ $request->created_at->toDateTimeString() }}"
                                            data-needed_date="{{ $request->needed_date }}"
                                            data-requested_cat="{{ $request->requested_cat }}"
                                            data-requested_details="{{ $request->requested_details }}"
                                            data-request_type="{{ $request->request_type }}"
                                            data-detailed_description="{{ $request->detailed_description }}"
                                            data-status="{{ $request->status }}">
                                            {{-- Table Cells (td) for Request History --}}
                                            <td>{{ $request->created_at->format('g:i A, F j, Y ') }}</td>
                                            <td>{{ $request->needed_date->format('F j, Y') }}</td>
                                            <td>{{ $request->requested_cat }}</td>
                                            <td>{{ $request->request_type }}</td>
                                            <td>
                                                {{-- Status Badge Logic Here --}}
                                                @if ($request->status == 'For Review')
                                                    <span class="badge bg-orange text-orange-fg">{{ $request->status }}</span>
                                                @elseif ($request->status == 'For Approval')
                                                    <span class="badge bg-cyan text-cyan-fg">{{ $request->status }}</span>
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
                                {{ $requests->links('pagination::bootstrap-5') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

