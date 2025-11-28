<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                @csrf
                <input type="hidden" name="request_id" id="modal-request-id" value="">

                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalTitle">Review Ticket: <span id="modal-request-type"
                            class="fw-bolder"></span></h5>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body bg-body-tertiary">

                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-12">
                            <h4 class="h5 text-primary">Applicant Information</h4>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>First Name:</strong> <span id="modal-first-name"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Last Name:</strong> <span id="modal-last-name"></span>
                        </div>
                    </div>

                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-12">
                            <h4 class="h5 text-primary">Request Details</h4>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Category:</strong> <span id="modal-requested-cat"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Status:</strong> <span id="modal-status" class="badge text-bg-warning"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Submitted On:</strong> <span id="modal-created-at"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Date Needed:</strong> <span id="modal-needed-date" class="fw-bold"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Requested Date:</strong> <span id="modal-requested-date"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Requested Details:</strong> <span id="modal-requested-details"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h4 class="h5 text-primary mb-2">Detailed Description</h4>
                            <textarea type="text" id="modal-detailed-description" class="container-fluid p-3 border rounded text-wrap"
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

                    <button type="submit" id="requestSubmitModalButton" class="btn btn-primary">
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
