<div class="modal fade" id="ApprovalITManagerModal" tabindex="-1" aria-labelledby="ApprovalITManagerModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="ApprovalITManagerModalTitle">Review Request
                    </h5>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body bg-body-tertiary">

                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-12">
                            <h4 class="h5 text-primary">Requestor Details</h4>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Name:</strong> <span id="modal-approval-name"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Site:</strong> <span id="modal-approval-site"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Position:</strong> <span id="modal-approval-position"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Department:</strong> <span id="modal-approval-department"></span>
                        </div>
                    </div>

                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-12">
                            <h4 class="h5 text-primary">Request</h4>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Category:</strong> <span id="modal-approval-requested_cat"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Type:</strong> <span id="modal-approval-requested_type"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Details:</strong> <span id="modal-approval-requested_details"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Requested Date:</strong> <span id="modal-approval-requested_date"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Needed Date:</strong> <span id="modal-approval-needed_date"></span>
                        </div>
                    </div>

                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-12">
                            <h1 class="h5 text-primary">
                                Review
                            </h1>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Reviewed By:</strong> <span id="modal-approval-review_by_id"></span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            <strong>Reviewed Date:</strong> <span id="modal-approval-review_at"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h4 class="h5 text-primary mb-2">Detailed Description</h4>
                            <textarea type="text" id="modal-approval-detailed-description"
                                class="container-fluid p-3 border rounded text-wrap"
                                style="white-space: pre-wrap; min-height: 100px;" rows="7" disabled>
                            </textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
