<div class="modal fade" id="AssignmentVoidModal" tabindex="-1" aria-labelledby="AssignmentVoidModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="#" method="post">
                @csrf
                <input type="hidden" name="assignment_id" id="modal-void-assignment-id" value="">

                <div class="modal-header">
                    <h5 class="modal-title" id="AssignmentVoidModalTitle">Confirm Void</h5>
                    <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p class="text-danger mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icon-tabler-alert-triangle me-1">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v4" />
                            <path d="M10.363 3.591l-8.032 14.286a.917 .917 0 0 0 .822 1.343h15.694a.917 .917 0 0 0 .822 -1.343l-8.032 -14.286a.925 .925 0 0 0 -1.644 0z" />
                            <path d="M12 16h.01" />
                        </svg>
                        <strong>Warning:</strong> Are you sure you want to **VOID** this ticket? This action cannot be undone.
                    </p>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <div>
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-x me-1">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>
                            Confirm Void
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
