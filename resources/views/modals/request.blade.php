<!-- modals -->
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalTitle">
    <div class="modal-dialog modal-dialog-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('tickets.submit') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="requestModalTitle">Request</h5>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body bg-body-tertiary">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Request Category</label>
                            <select class="form-select" name="reqCatSel" id="requestCategorySelect" required>
                                <option value="Technical Support">Technical Support</option>
                                <option value="Software & Applications">Software & Applications</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 d-none" id="requestDetailsContainer">
                            <label for="requestDetailSelect" class="form-label">Request Details</label>
                            <select class="form-select" name="reqDetSel" id="requestDetailSelect">
                                <option value="" disabled selected>Options</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3" id="requestTypeRow">
                        <div class="col-sm-12 col-md-8" id="requestTypeContainer">
                            <label for="RequestTypeSelect" class="form-label">Request Type</label>
                            <select class="form-select" name="reqTypeSel" id="RequestTypeSelect" required>
                                <option value="" disabled>Options</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label for="date_needed" class="form-label">Date Needed</label>
                            <input type="date" name="needed_date" id="date_need" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-12">
                            <label for="DetailedDescription" class="form-label">Detailed Description of Request</label>
                            <textarea name="detailed_desc" rows="8" id="DetailedDescription" class="form-control"
                                placeholder="Type Here" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" id="requestSubmitModalButton" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-1">
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Submit Request
                    </button>
                </div>
            </form>
        </div>


    </div>
</div>
