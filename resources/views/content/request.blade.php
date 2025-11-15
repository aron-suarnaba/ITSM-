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
                            <button type="button" class="btn btn-primary" id="TechSuppReqButton" data-bs-toggle="modal"
                                data-bs-target="#requestModal">Technical Support</button>
                            <button type="button" class="btn btn-primary" id="SoftwareAppRequest"
                                data-bs-toggle="modal">Software & Applications</button>
                            <button type="button" class="btn btn-primary" id="OtherReqButton"
                                data-bs-toggle="modal">Others</button>
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#requestModalTitle">Request</h5>
            </div>
            <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
            </button>
        </div>

        <div class="modal-body">

        </div>
        <div class="modal-footer"></div>
    </div>
</div>
