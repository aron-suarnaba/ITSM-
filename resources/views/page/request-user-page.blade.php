<div class="page-header d-print-none" aria-label="Page header">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Request</h2>
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
                            <button type="button" class="btn btn-primary RequestCatButton" id="TechSuppReqButton"
                                data-bs-toggle="modal" data-bs-target="#requestModal">Technical Support</button>
                            <button type="button" class="btn btn-primary RequestCatButton" id="SoftwareAppRequest"
                                data-bs-toggle="modal" data-bs-target="#requestModal">Software & Applications</button>
                            <button type="button" class="btn btn-primary RequestCatButton" id="OtherReqButton"
                                data-bs-toggle="modal" data-bs-target="#requestModal">Others</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Recently Requested Ticket</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-nowrap card-center">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Request Category</th>
                                        <th>Request Type</th>
                                        <th>Date and Time Requested</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                        <tr>
                                            <th>{{ $request->id }}</th>
                                            <th>{{ $request->requested_cat }}</th>
                                            <th>{{ $request->request_type }}</th>
                                            <th>{{ $request->requested_date }}</th>
                                            <th>
                                                @if ($request->status == 'For Review')
                                                    <span class="badge bg-cyan text-cyan-fg">{{ $request->status }}</span>
                                                @elseif ($request->status == 'For Approval')
                                                    <span class="badge bg-orange text-orange-fg">{{ $request->status }}</span>
                                                @elseif ($request->status == 'Rejected')
                                                    <span class="badge bg-red text-red-fg">{{ $request->status }}</span>
                                                @endif
                                            </th>
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
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
