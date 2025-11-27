<!-- modals -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalTitle">
    <div class="modal-dialog modal-dialog-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalTitle">Ticket Review</h5>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body bg-body-tertiary">
                    <div class="row mb-3">

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
