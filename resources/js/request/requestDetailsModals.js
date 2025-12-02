document.addEventListener("DOMContentLoaded", function () {
    const requestDetailsModal = document.getElementById("requestDetailsModal");
    const requestModal = document.getElementById("requestModal");
    const RequestCatSelect = document.getElementById("requestCategorySelect");
    const RequestCatButton = document.querySelectorAll(".RequestCatButton");
    const requestDetailSelect = document.getElementById("requestDetailSelect");
    const requestDetailsContainer = document.getElementById("requestDetailsContainer");
    const RequestTypeSelect = document.getElementById("RequestTypeSelect");
    const RequestTypeContainer = document.getElementById("requestTypeContainer");

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
                requestedCat,
                createdAt,
                neededDate,
                requestedDetails,
                requestType,
                status, // Status data attribute value
                detailedDescription,
            } = button.dataset;

            // ... (Other fields remain textContent) ...
            requestDetailsModal.querySelector("#modal-details-request-type").textContent = requestType || "N/A";
            requestDetailsModal.querySelector("#modal-request-requested-cat").textContent = requestedCat || "N/A";

            // ✅ FIX 2: Use innerHTML and getStatusBadgeHtml for the status
            requestDetailsModal.querySelector("#modal-request-status").innerHTML = getStatusBadgeHtml(status);

            const dateOptions = {
                year: "numeric",
                month: "long",
                day: "numeric",
            };

            if (createdAt) {
                requestDetailsModal.querySelector("#modal-request-created-at").textContent = new Date(createdAt).toLocaleDateString(
                    "en-US",
                    {
                        ...dateOptions,
                        hour: "2-digit",
                        minute: "2-digit",
                    }
                );
            }

            // NOTE: You are missing the 'Requested Date' field from the modal HTML here.
            // If you have a data attribute for 'requestedDate', you should map it here as well.

            if (neededDate) {
                requestDetailsModal.querySelector("#modal-request-needed-date").textContent = new Date(neededDate).toLocaleDateString(
                    "en-US",
                    dateOptions
                );
            }

            requestDetailsModal.querySelector("#modal-request-requested-details").textContent = requestedDetails || "None";

            // Fix for textarea display (remove extra whitespace from the template)
            requestDetailsModal.querySelector("#modal-request-detailed-description").textContent = detailedDescription ? detailedDescription.trim() : "No description provided";
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
