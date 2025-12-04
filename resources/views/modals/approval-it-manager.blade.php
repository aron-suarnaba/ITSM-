<div class="modal fade" id="ApprovalITManagerModal" tabindex="-1" aria-labelledby="ApprovalITManagerModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('approval.approve') }}" method="post">
                @csrf

                <input type="hidden" name="review_key" id="modal-review-key-input">
                <input type="hidden" name="request_category" id="modal-request-category-input">
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

                    <button type="button" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                        Reject
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-gavel">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M13 10l7.383 7.418c.823 .82 .823 2.148 0 2.967a2.11 2.11 0 0 1 -2.976 0l-7.407 -7.385" />
                            <path d="M6 9l4 4" />
                            <path d="M13 10l-4 -4" />
                            <path d="M3 21h7" />
                            <path
                                d="M6.793 15.793l-3.586 -3.586a1 1 0 0 1 0 -1.414l2.293 -2.293l.5 .5l3 -3l-.5 -.5l2.293 -2.293a1 1 0 0 1 1.414 0l3.586 3.586a1 1 0 0 1 0 1.414l-2.293 2.293l-.5 -.5l-3 3l.5 .5l-2.293 2.293a1 1 0 0 1 -1.414 0z" />
                        </svg>
                        Approve
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
