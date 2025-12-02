<x-layouts.app>
    <x-slot:aside>
        @include('partials._aside')
    </x-slot:aside>

    <x-slot:header>
        @include('partials._header')
    </x-slot:header>

    <x-slot:content>
        @include('page.it-manager-approval-page')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>

</x-layouts.app>

@include('modals.approval-it-manager');

<script>

    const approvalModal = document.getElementById('ApprovalITManagerModal');

    if (approvalModal) {
        approvalModal.addEventListener('show.bs.modal', function(event){

        const button = event.relatedTarget;


        const first_name = button.getAttribute('data-first_name');
        const last_name = button.getAttribute('data-last_name');
        const department = button.getAttribute('data-department');
        const position = button.getAttribute('data-position');
        const site = button.getAttribute('data-site');
        const manager_id = button.getAttribute('data-manager_id');
        const id = button.getAttribute('data-id');
        const created_at = button.getAttribute('data-created_at');
        const status = button.getAttribute('data-status');
        const needed_date = button.getAttribute('data-needed_date');
        const requested_cat = button.getAttribute('data-requested_cat');
        const requested_details = button.getAttribute('data-requested_details');
        const request_type = button.getAttribute('data-request_type');
        const detailed_description = button.getAttribute('data-detailed_description');
        const review_key = button.getAttribute('data-review_key');
        const review_at = button.getAttribute('data-review_at');
        const review_by_id = button.getAttribute('data-reviewed_by_id');
        const approve_key = button.getAttribute('data-approve-key');

        approvalModal.querySelector('#modal-approval-name').textContent = first_name + ' ' + last_name;
        approvalModal.querySelector('#modal-approval-site').textContent = site;
        approvalModal.querySelector('#modal-approval-position').textContent = position;
        approvalModal.querySelector('#modal-approval-department').textContent = department;
        approvalModal.querySelector('#modal-approval-requested_cat').textContent = requested_cat;
        approvalModal.querySelector('#modal-approval-requested_type').textContent = request_type;
        approvalModal.querySelector('#modal-approval-requested_details').textContent = requested_details;
        approvalModal.querySelector('#modal-approval-requested_date').textContent = created_at;
        approvalModal.querySelector('#modal-approval-needed_date').textContent = needed_date;

        approvalModal.querySelector('#modal-approval-review_by_id').textContent = review_by_id;
        approvalModal.querySelector('#modal-approval-review_at').textContent = review_at;
        approvalModal.querySelector('#modal-approval-detailed-description').value = detailed_description;
        approvalModal.querySelector('#modal-approval-approval-key').value = approve_key;
        approvalModal.querySelector('#modal-approval-review-key').value - review_key;
    });
    } else {
        console.error("Error: Modal element 'ApprovalITManagerModal' not found. ");
    };

</script>
