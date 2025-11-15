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
                    <div class="card-body d-block mx-auto px-5">
                        <div class="mb-3">
                            <input type="text" name="search" id="" class="form-control" placeholder="Search">
                        </div>
                        <div class="btn-group-vertical px-5" role="group" aria-label="Vertical button group">
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
                        <div class="card-title">History</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" st>
                            <table class="table table-vcenter table-nowrap card-center">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ticket Type</th>
                                        <th>Ticket No.</th>
                                        <th>Request Type</th>
                                        <th>Date Requested</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>Software & Applications</th>
                                        <th>JR-S1125-S0001</th>
                                        <th>ERP</th>
                                        <th>2025-11-15</th>
                                        <th><span class="badge text-bg-info">Approved</span></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<!-- modals -->
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#requestModalTitle">Request</h5>
            </div>
            <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
            </button>
        </div>

        <div class="modal-body bg-body-tertiary">
            <div class="row mb-3">
                <div class="col-sm-12 col-md-6">
                    <div class="form-label" required>Request Category</div>
                    <select class="form-select" id="requestCategorySelect">
                        <option value="Technical Support">Technical Support</option>
                        <option value="Software & Applications">Software & Applications</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="RequestDetails" class="form-label" required>Request Details</label>
                    <select class="form-select" id="requestDetailsSelect">
                        <option value="">Options</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12">
                    <label for="RequestType" class="form-label" required>Request Type</label>
                    <input type="text" id="RequestType" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-6">
                    <label for="TicketNo" class="form-label">Ticket No.</label>
                    <input type="text" id="TicketNo" class="form-control" required>
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="TicketNo" class="form-label">Date Needed</label>
                    <input type="date" id="TicketNo" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12">
                    <label for="DetailedDescription" class="form-label">Detailed Description of Request</label>
                    <textarea name="" rows="5" id="DetailedDescription" class="form-control"
                        placeholder="Type Here"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                Cancel </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-1">
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                Generate Ticket
            </a>
        </div>
    </div>
</div>
