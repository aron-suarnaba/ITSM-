<x-layouts.app>
    <x-slot:aside>
        @include('partials._aside')
    </x-slot:aside>

    <x-slot:header>
        @include('partials._header')
    </x-slot:header>

    <x-slot:content>
        @include('page.assignation')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>

</x-layouts.app>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const AssignmentModal = document.getElementById('AssignmentModal');


        if (AssignmentModal) {
            AssignmentModal.addEventListener('show.bs.modal', function (event) {
                // The button (table row) that triggered the modal
                const button = event.relatedTarget;

                // 1. Extract Data Attributes
                const first_name = button.getAttribute('data-first_name');
                const last_name = button.getAttribute('data-last_name');
                const department = button.getAttribute('data-department');
                const position = button.getAttribute('data-position');
                const site = button.getAttribute('data-site');
                // const id = button.getAttribute('data-id'); // Not displayed but extracted
                const created_at = button.getAttribute('data-created_at');
                const status = button.getAttribute('data-status');
                // const needed_date = button.getAttribute('data-needed_date'); // Not displayed in modal body
                const requested_cat = button.getAttribute('data-requested_cat');
                const request_type = button.getAttribute('data-request_type');
                const detailed_description = button.getAttribute('data-detailed_description');

                const requested_details = button.getAttribute('data-requested_details');
                const requested_date = button.getAttribute('data-requested_date');

                // 2. Locate Modal Elements
                const modalName = AssignmentModal.querySelector('#modal-assignment-name');
                const modalSite = AssignmentModal.querySelector('#modal-assignment-site');
                const modalPosition = AssignmentModal.querySelector('#modal-request-position');
                const modalDepartment = AssignmentModal.querySelector('#modal-approval-department');
                const modalCategory = AssignmentModal.querySelector('#modal-assignment-request-category');
                const modalType = AssignmentModal.querySelector('#modal-assignment-request-type');
                const modalStatus = AssignmentModal.querySelector('#modal-assignment-status');
                const modalRequestDetails = AssignmentModal.querySelector('#modal-assignment-request-details');
                const modalRequestedDate = AssignmentModal.querySelector('#modal-assignment-requested-date');
                const modalDetailedDescription = AssignmentModal.querySelector('#modal-assignment-detailed_description');


                if (modalName) {
                    modalName.innerText = `${first_name} ${last_name}`;
                }
                if (modalSite) {
                    modalSite.innerText = site || 'N/A';
                }
                if (modalPosition) {
                    modalPosition.innerText = position || 'N/A';
                }
                if (modalDepartment) {
                    modalDepartment.innerText = department || 'N/A';
                }
                if (modalCategory) {
                    modalCategory.innerText = requested_cat || 'N/A';
                }
                if (modalType) {
                    modalType.innerText = request_type || 'N/A';
                }
                if (modalStatus) {
                    modalStatus.innerText = status || 'N/A';
                }
                if (modalRequestDetails) {
                    // Using requested_details if available, otherwise defaulting
                    modalRequestDetails.innerText = requested_details || 'N/A';
                }
                if (modalRequestedDate) {
                    // Using the existing requested_date attribute from the table row
                    modalRequestedDate.innerText = requested_date || 'N/A';
                }
                if (modalDetailedDescription) {
                    // The detailed description is a <textarea>, so use .value
                    modalDetailedDescription.value = detailed_description || '';
                }

            });



        }





    });
</script>

@include('modals.assignmentVoidModals')
@include('modals.assignmentModals')
