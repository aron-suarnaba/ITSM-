import "./bootstrap";
import * as bootstrap from "bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.js";
import "@tabler/core/dist/js/tabler.min.js";
import toastr from "toastr";
import "toastr/build/toastr.min.css";
import $ from "jquery";

window.toastr = toastr;
window.bootstrap = bootstrap;

// toastr.options = {
//   "closeButton": false,
//   "debug": false,
//   "newestOnTop": true,
//   "progressBar": false,
//   "positionClass": "toast-top-center",
//   "preventDuplicates": false,
//   "onclick": null,
//   "showDuration": "300",
//   "hideDuration": "1000",
//   "timeOut": "1000",
//   "extendedTimeOut": "1000",
//   "showEasing": "swing",
//   "hideEasing": "linear",
//   "showMethod": "fadeIn",
//   "hideMethod": "fadeOut"
// }

document.addEventListener("DOMContentLoaded", () => {
    // --- Element Selection ---
    const requestModal = document.getElementById("requestModal");
    const RequestCatSelect = document.getElementById("requestCategorySelect");
    const RequestCatButton = document.querySelectorAll(".RequestCatButton");
    const requestDetailSelect = document.getElementById("requestDetailSelect");
    const requestDetailsContainer = document.getElementById(
        "requestDetailsContainer"
    );
    const RequestTypeSelect = document.getElementById("RequestTypeSelect");
    const NavigationLink = document.querySelectorAll(".nav-links");

    // --- Data Arrays ---
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

    // Initialize modal instance
    let modalInstance = null;
    if (requestModal) {
        modalInstance = new bootstrap.Modal(requestModal, { backdrop: true });
    }

    // --- Helper Function ---
    function clearAndResetSelect(selectElement, placeholderText = "Options") {
        selectElement.innerHTML = "";
        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = placeholderText;
        defaultOption.setAttribute("disabled", true);
        defaultOption.setAttribute("selected", true);
        selectElement.appendChild(defaultOption);
    }

    // --- Modal Close Event Listener ---
    if (requestModal) {
        requestModal.addEventListener("hide.bs.modal", function (event) {
            // Move focus before modal becomes hidden
            const trigger = document.querySelector(
                '[data-bs-target="#requestModal"]'
            );
            if (trigger && typeof trigger.focus === "function") {
                trigger.focus();
            }
        });

        requestModal.addEventListener("hidden.bs.modal", function (event) {
            // Clear and reset all dynamic select boxes
            clearAndResetSelect(requestDetailSelect, "Select Request Detail");
            clearAndResetSelect(RequestTypeSelect, "Select Request Type");

            // Hide the conditional container
            requestDetailsContainer.classList.add("d-none");

            // Clear inputs
            const ticketInput = document.getElementById("TicketNo");
            if (ticketInput) ticketInput.value = "";
            const desc = document.getElementById("DetailedDescription");
            if (desc) desc.value = "";
        });
    }

    // 1. Logic for Category Buttons (Modal opener)
    RequestCatButton.forEach(function (btn) {
        btn.addEventListener("click", function () {
            const buttonText = btn.textContent.trim();
            RequestCatSelect.value = buttonText;
            RequestCatSelect.dispatchEvent(new Event("change"));
        });
    });

    // 2. Logic for Category Select Box (Visibility and Population)
    RequestCatSelect.addEventListener("change", function () {
        const selectedValue = this.value;

        clearAndResetSelect(requestDetailSelect, "Select Request Detail");
        clearAndResetSelect(RequestTypeSelect, "Select Request Type");

        if (selectedValue === "Software & Applications") {
            requestDetailsContainer.classList.remove("d-none");

            SoftwareDeveloperReqDet.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                requestDetailSelect.appendChild(newOption);
            });

            SoftwareDeveloperReqServ.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                RequestTypeSelect.appendChild(newOption);
            });
        } else if (selectedValue === "Technical Support") {
            requestDetailsContainer.classList.add("d-none");

            TechnicalSupportReqDet.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                RequestTypeSelect.appendChild(newOption);
            });
        } else {
            requestDetailsContainer.classList.add("d-none");
        }
    });

    // 3. Initial state setting
    requestDetailsContainer.classList.add("d-none");

    // Navigation Link logic
    NavigationLink.forEach((item) => {
        item.addEventListener("click", (event) => {
            NavigationLink.forEach((el) => {
                el.classList.remove("active");
            });
            event.target.classList.add("active");
        });
    });
});
