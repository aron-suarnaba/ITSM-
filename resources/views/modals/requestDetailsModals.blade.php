<div class="modal fade" id="requestDetailsModal" tabindex="-1" aria-labelledby="reviewDetailsModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('request.submit') }}" method="post">
                @csrf
                <input type="hidden" name="request_details_id" id="modal-request-details-id" value="">

                <div class="modal-header">
                    <h5 class="modal-title" id="requestDetailsModalTitle">Review Request
                    </h5>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body bg-body-tertiary">

                    <div class="row mb-3 pb-3 border-bottom">
                        <div class="col-12">
                            <h4 class="h5 text-primary">Request Details</h4>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Category:</strong> <span id="modal-request-requested-cat"></span>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Status:</strong> <span id="modal-request-status"
                                class="badge text-bg-warning"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Requested Details:</strong> <span id="modal-request-requested-details"></span>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Date Needed:</strong> <span id="modal-request-needed-date" class="fw-bold"></span>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Request Type:</strong> <span id="modal-details-request-type"
                                class="fw-bolder"></span>
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Requested Date:</strong> <span id="modal-request-requested-date"></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong>Submitted On:</strong> <span id="modal-request-created-at"></span>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h4 class="h5 text-primary mb-2">Detailed Description</h4>
                            <textarea type="text" id="modal-request-detailed-description"
                                class="container-fluid p-3 border rounded text-wrap"
                                style="white-space: pre-wrap; min-height: 100px;" rows="7" disabled>
                            </textarea>
                        </div>
                    </div>

                    <div class="row" hidden>
                        <div class="col-sm-12 col-md-12">
                            <h4 class="h5 text-primary mb-2">Notes</h4>
                            <textarea type="text" id="modal-request-rejection-notes"
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
