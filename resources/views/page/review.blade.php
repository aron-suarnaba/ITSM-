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
                            <a href="#">Request Review</a>
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
            <div class="col-sm-12 col-md-9">
                <div class="card">
                    <div class="card-body p-0">
                        <div id="table-review" class="table-responsive rounded">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><button class="table-sort" data-sort="requestor">Requestor</button></th>
                                        <th><button class="table-sort" data-sort="category">Request Category</button>
                                        </th>
                                        <th><button class="table-sort" data-sort="request-time">Request Date and
                                                Time</button></th>
                                        <th><button class="table-sort" data-sort="date-needed">Date Needed</button></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody list">

                                    @forelse($requests as $request)
                                        <tr class="fw-bold clickable-row" data-bs-toggle="modal"
                                            data-bs-target="#reviewModal" data-last_name="{{ $request->last_name }}"
                                            data-first_name="{{ $request->first_name }}"
                                            data-requested_cat="{{ $request->requested_cat }}"
                                            data-created_at="{{ $request->created_at }}"
                                            data-needed_date="{{ $request->needed_date }}"
                                            data-requested_date="{{ $request->requested_date }}"
                                            data-requested_details="{{ $request->requested_details }}"
                                            data-request_type="{{ $request->request_type }}"
                                            data-status="{{ $request->status }}"
                                            data-detailed_description="{{ $request->detailed_description }}">

                                            <td><span class="requestor">{{ $request->last_name }},
                                                    {{ $request->first_name }}</span></td>

                                            <td><span class="category">{{ $request->requested_cat }}</span></td>

                                            <td><span
                                                    class="request-time">{{ $request->created_at->format('F j, Y | g:i A') }}</span>
                                            </td>

                                            <td><span
                                                    class="date-needed">{{ $request->needed_date->format('F j, Y') }}</span>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Request</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <div class="card">

                </div>
            </div>
        </div>

    </div>
</div>
