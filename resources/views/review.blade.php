<x-layouts.app>
    <x-slot:aside>
        @include('partials._aside')
    </x-slot:aside>

    <x-slot:header>
        @include('partials._header')
    </x-slot:header>

    <x-slot:content>
        @include('page.review')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>

</x-layouts.app>

@include('modals.review')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reviewModal = document.getElementById("reviewModal");

        reviewModal.addEventListener('show.bs.modal', function(event) {
            // Get the element that triggered the modal (the clicked <tr>)
            const button = event.relatedTarget;

            // --- 1. Extract all data attributes from the clicked row ---
            const last_name = button.getAttribute('data-last_name');
            const first_name = button.getAttribute('data-first_name');
            const requested_cat = button.getAttribute('data-requested_cat');
            const created_at = button.getAttribute('data-created_at');
            const needed_date = button.getAttribute('data-needed_date');
            const requested_date = button.getAttribute('data-requested_date');
            const requested_details = button.getAttribute('data-requested_details');
            const request_type = button.getAttribute('data-request_type');
            const status = button.getAttribute('data-status');

            // --- 2. Populate the Modal Elements ---

            // Modal Header/Title
            reviewModal.querySelector('#reviewModalTitle span').textContent = request_type;

            // Applicant Information
            reviewModal.querySelector('#modal-first-name').textContent = first_name;
            reviewModal.querySelector('#modal-last-name').textContent = last_name;

            // Request Details & Dates
            reviewModal.querySelector('#modal-requested-cat').textContent = requested_cat;
            reviewModal.querySelector('#modal-status').textContent = status;
            reviewModal.querySelector('#modal-created-at').textContent = new Date(created_at).toLocaleDateString("en-US", {
                year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
            });
            reviewModal.querySelector('#modal-needed-date').textContent = new Date(needed_date).toLocaleDateString("en-US", {
                year: 'numeric', month: 'long', day: 'numeric'
            });
            reviewModal.querySelector('#modal-requested-date').textContent = new Date(requested_date).toLocaleDateString("en-US", {
                year: 'numeric', month: 'long', day: 'numeric'
            });

            // Main Details
            reviewModal.querySelector('#modal-requested-details').textContent = requested_details;

            // OPTIONAL: Update the form action if your review/submit process needs the request ID
            // You would need to add data-request-id="$request->id" to your <tr>
            // const requestId = button.getAttribute('data-request-id');
            // reviewModal.querySelector('form').action = '/requests/review/' + requestId;
        });
    });
</script>
