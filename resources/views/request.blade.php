<x-layouts.app>
    <x-slot:aside>
        @include('partials._aside')
    </x-slot:aside>

    <x-slot:header>
        @include('partials._header')
    </x-slot:header>

    <x-slot:content>
        @include('page.request-user-page')
        @include('modals.request')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>
</x-layouts.app>



@if (session('success'))
    <script>
        $(document).ready(function () {
            Toastify({
                text: '{{ session('success') }}',
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                stopOnFocus: true,
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        });
    </script>
@endif

@push('scripts')
    @vite([
        'resources/js/request/request.js',
        'resources/js/request/request-real-time-data.js'
    ])
@endpush

<script>
    function getStatusBadgeHtml(status) {
        if (!status) return `<span class="badge bg-secondary">Unknown</span>`;

        const s = status.toLowerCase();
        let badgeClass = "bg-secondary";

        const statusMap = {
            "for review": "bg-orange text-orange-fg",
            "rejected on review": "bg-red text-red-fg",
            "for approval": "bg-cyan text-cyan-fg",
            "rejected on approval": "bg-red text-red-fg",
            "for checking": "bg-yellow text-yellow-fg",
            "void": "bg-dark text-dark-fg",
            "open ticket": "bg-blue text-blue-fg",
            "working on ticket": "bg-purple text-purple-fg",
            "complete": "bg-green text-green-fg",
        };

        for (const key in statusMap) {
            if (s.includes(key)) {
                badgeClass = statusMap[key];
                break;
            }
        }

        return `<span class="badge ${badgeClass}">${status}</span>`;
    }

    // Make it globally available on window
    window.getStatusBadgeHtml = getStatusBadgeHtml;

    document.addEventListener("DOMContentLoaded", function () {
        const requestDetailsModal = document.getElementById("requestDetailsModal");
        const requestModal = document.getElementById("requestModal");
        const RequestCatSelect = document.getElementById("requestCategorySelect");
        const RequestCatButton = document.querySelectorAll(".RequestCatButton");
        const requestDetailSelect = document.getElementById("requestDetailSelect");
        const requestDetailsContainer = document.getElementById(
            "requestDetailsContainer"
        );
        const RequestTypeSelect = document.getElementById("RequestTypeSelect");
        const RequestTypeContainer = document.getElementById(
            "requestTypeContainer"
        );

        const TechnicalSupportReqDet = [
            "Programs/Application Installation/Re-Install",
            "Peripheral Devices/Replacement",
            "Desktop Computer/Replacement",
            "Active Directory Users and Computers",
            "No Internet/New Network Connections",
            "New Email/Email Concern",
            "Files Backup/Restore/Access/Transfer",
            "Anti-virus",
            "Printer/Scanner",
            "Wifi Connection",
            "Others",
        ];

        const SoftwareDeveloperReqDet = [
            "ERP Syteline System",
            "HRIS",
            "TRE",
            "New Report",
            "SFMS",
            "Others",
        ];
        const SoftwareDeveloperReqServ = [
            "Modification/Enhancement",
            "Maintenance/System Error",
            "New Project",
            "Others",
        ];

        function clearAndResetSelect(selectElement, placeholder) {
            selectElement.innerHTML = `<option value="" disabled selected>${placeholder}</option>`;
        }

        // --- VIEW DETAILS MODAL LOGIC ---
        if (requestDetailsModal) {
            requestDetailsModal.addEventListener("show.bs.modal", function (event) {
                const button = event.relatedTarget;
                const {
                    createdAt,
                    neededDate,
                    requestedCat,
                    requestedDetails,
                    requestType,
                    status,
                    detailedDescription,
                } = button.dataset;

                requestDetailsModal.querySelector(
                    "#modal-request-requested-cat"
                ).textContent = requestedCat || "N/A";
                requestDetailsModal.querySelector(
                    "#modal-request-status"
                ).innerHTML = getStatusBadgeHtml(status);
                requestDetailsModal.querySelector(
                    "#modal-request-requested-details"
                ).textContent = requestedDetails || "None";
                requestDetailsModal.querySelector(
                    "#modal-details-request-type"
                ).textContent = requestType || "N/A";

                const dateOptions = {
                    year: "numeric",
                    month: "long",
                    day: "numeric",
                };
                if (createdAt) {
                    requestDetailsModal.querySelector(
                        "#modal-request-created-at"
                    ).textContent = new Date(createdAt).toLocaleDateString(
                        "en-US",
                        { ...dateOptions, hour: "2-digit", minute: "2-digit" }
                    );
                }

                if (neededDate) {
                    requestDetailsModal.querySelector(
                        "#modal-request-requested-date"
                    ).textContent = new Date(neededDate).toLocaleDateString(
                        "en-US",
                        dateOptions
                    );
                }

                // populate textarea (do NOT clear it immediately)
                const descEl = requestDetailsModal.querySelector(
                    "#modal-request-detailed-description"
                );
                if (descEl)
                    descEl.value = detailedDescription
                        ? detailedDescription.trim()
                        : "No description provided";
            });

            requestDetailsModal.addEventListener("hidden.bs.modal", function () {
                // Clear all modal fields (use .value for textarea)
                requestDetailsModal.querySelector(
                    "#modal-request-requested-cat"
                ).textContent = "";
                requestDetailsModal.querySelector(
                    "#modal-request-status"
                ).innerHTML = "";
                requestDetailsModal.querySelector(
                    "#modal-request-requested-details"
                ).textContent = "";
                requestDetailsModal.querySelector(
                    "#modal-details-request-type"
                ).textContent = "";
                requestDetailsModal.querySelector(
                    "#modal-request-created-at"
                ).textContent = "";
                requestDetailsModal.querySelector(
                    "#modal-request-needed-date"
                ).textContent = "";
                const descEl = requestDetailsModal.querySelector(
                    "#modal-request-detailed-description"
                );
                if (descEl) descEl.value = "";
            });
        }

        // --- CREATE REQUEST MODAL LOGIC (Reset/Setup) ---
        // ... (Your requestModal and category logic is fine and remains here) ...
        if (requestModal) {
            requestModal.addEventListener("hidden.bs.modal", function () {
                const form = requestModal.querySelector("form");
                if (form) form.reset();

                RequestCatSelect.value = "";
                RequestCatSelect.dispatchEvent(new Event("change"));

                clearAndResetSelect(requestDetailSelect, "Select Request Detail");
                clearAndResetSelect(RequestTypeSelect, "Select Request Type");

                // Ensure visibility is reset
                requestDetailsContainer.classList.add("d-none");
                RequestTypeContainer.classList.remove("d-none");
                RequestTypeSelect.setAttribute("required", true);
            });
        }

        // --- CATEGORY BUTTONS ---
        RequestCatButton.forEach((btn) => {
            btn.addEventListener("click", function () {
                RequestCatSelect.value = btn.textContent.trim();
                RequestCatSelect.dispatchEvent(new Event("change"));
            });
        });

        // --- CATEGORY SELECT CHANGE HANDLER ---
        RequestCatSelect.addEventListener("change", function () {
            const value = this.value;

            clearAndResetSelect(requestDetailSelect, "Select Request Detail");
            clearAndResetSelect(RequestTypeSelect, "Select Request Type");

            // Default visibility and required state
            RequestTypeContainer.classList.remove("d-none");
            RequestTypeSelect.setAttribute("required", true);
            requestDetailSelect.removeAttribute("required");
            requestDetailsContainer.classList.add("d-none");

            // Helper to append options safely
            const appendOptions = (select, items) => {
                const fragment = document.createDocumentFragment();
                items.forEach((item) => {
                    const option = document.createElement("option");
                    option.value = item;
                    option.textContent = item;
                    fragment.appendChild(option);
                });
                select.appendChild(fragment);
            };

            if (value === "Software & Applications") {
                requestDetailsContainer.classList.remove("d-none");
                requestDetailSelect.setAttribute("required", true);

                appendOptions(requestDetailSelect, SoftwareDeveloperReqDet);
                appendOptions(RequestTypeSelect, SoftwareDeveloperReqServ);
            } else if (value === "Technical Support") {
                requestDetailsContainer.classList.add("d-none");

                // For Tech Support, RequestTypeSelect uses the detail list
                appendOptions(RequestTypeSelect, TechnicalSupportReqDet);
            } else if (value === "Others") {
                requestDetailsContainer.classList.add("d-none");

                // For 'Others', Request Type is not required/hidden
                RequestTypeContainer.classList.add("d-none");
                RequestTypeSelect.removeAttribute("required");
            }
        });

        // Initial state setup (if no category is selected on load)
        requestDetailsContainer.classList.add("d-none");
        if (RequestCatSelect.value === "") {
            RequestTypeContainer.classList.add("d-none");
        }
    });

</script>

@include('modals.requestDetailsModals')
