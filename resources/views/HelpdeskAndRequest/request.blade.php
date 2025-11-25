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
                    <div class="card-body d-block px-5">
                        <div class="mb-3">
                            <input type="text" name="search" id="" class="form-control" placeholder="Search">
                        </div>
                        <div class="btn-group-vertical d-block px-5" role="group" aria-label="Vertical button group">
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
                                        <th> <span class="badge bg-azure text-azure-fg">Approved</span></th>
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


@if (session('success'))
    <script>
        $('#requestModal').modal('hide');

        toastr.success("{{ session('success') }}", 'Success');
    </script>
@endif
