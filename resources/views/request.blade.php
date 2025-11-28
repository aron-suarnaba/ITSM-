<x-layouts.app>
    <x-slot:aside>
        @include('partials._aside')
    </x-slot:aside>

    <x-slot:header>
        @include('partials._header')
    </x-slot:header>

    <x-slot:content>
        @include('page.request-user-page')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>

</x-layouts.app>

@include('modals.requestDetailsModals')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Target the correct Modal ID
        const requestDetailsModal = document.getElementById("requestDetailsModal");

        if (requestDetailsModal) {
            requestDetailsModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // --- 1. Extract necessary data attributes ---
                const requested_cat = button.getAttribute('data-requested_cat');
                const created_at = button.getAttribute('data-created_at');
                const needed_date = button.getAttribute('data-needed_date');
                const requested_date = button.getAttribute('data-requested_date');
                const requested_details = button.getAttribute('data-requested_details');
                const request_type = button.getAttribute('data-request_type');
                const status = button.getAttribute('data-status');
                const detailed_description = button.getAttribute('data-detailed_description');

                // --- 2. Populate the Modal Elements ---

                // Modal Header/Title - Targets the span inside the title
                requestDetailsModal.querySelector('#modal-details-request-type').textContent = request_type;

                // Request Details & Dates (Targets the correct IDs)
                requestDetailsModal.querySelector('#modal-request-requested-cat').textContent = requested_cat;
                requestDetailsModal.querySelector('#modal-request-status').textContent = status;

                // Date formatting logic
                if (created_at) {
                    requestDetailsModal.querySelector('#modal-request-created-at').textContent = new Date(created_at).toLocaleDateString("en-US", {
                        year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
                    });
                }
                if (needed_date) {
                    requestDetailsModal.querySelector('#modal-request-needed-date').textContent = new Date(needed_date).toLocaleDateString("en-US", {
                        year: 'numeric', month: 'long', day: 'numeric'
                    });
                }
                if (requested_date) {
                    requestDetailsModal.querySelector('#modal-request-requested-date').textContent = new Date(requested_date).toLocaleDateString("en-US", {
                        year: 'numeric', month: 'long', day: 'numeric'
                    });
                }

                if (requestDetailsModal){
                    requestDetailsModal.querySelector('#modal-request-requested-details').textContent = requested_details;
                } else {
                    requestDetailsModal.querySelector('#modal-request-requested-details').textContent = "None";
                }

                // Populate the Textarea element
                const descriptionArea = requestDetailsModal.querySelector('#modal-request-detailed-description');
                descriptionArea.textContent = detailed_description;
            });
        }
    });
</script>
