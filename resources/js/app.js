import "./bootstrap";
import * as bootstrap from "bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.js";
import "@tabler/core/dist/js/tabler.min.js";
import { Button } from "bootstrap/dist/js/bootstrap.bundle.js";

window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", () => {
    // --- Element Selection ---
    const requestModal = document.getElementById("requestModal"); // New: Select the modal element
    const RequestCatSelect = document.getElementById("requestCategorySelect");
    const RequestCatButton = document.querySelectorAll(".RequestCatButton");
    const requestDetailSelect = document.getElementById("requestDetailSelect");
    const requestDetailsContainer = document.getElementById(
        "requestDetailsContainer"
    );
    const RequestTypeSelect = document.getElementById("RequestTypeSelect");
    const NavigationLink = document.querySelectorAll(".nav-links");

    // --- Data Arrays (for context, not modified) ---
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

    // --- New: Modal Close Event Listener ---
    if (requestModal) {
        requestModal.addEventListener('hidden.bs.modal', function () {

            // 🎯 Clear and reset all dynamic select boxes
            clearAndResetSelect(RequestCatSelect, "Select Request Category");
            clearAndResetSelect(requestDetailSelect, "Select Request Detail");
            clearAndResetSelect(RequestTypeSelect, "Select Request Type");

            // Hide the conditional container
            requestDetailsContainer.classList.add("d-none");

            // Optional: You may also want to clear any text inputs here
            document.getElementById('TicketNo').value = '';
            document.getElementById('DetailedDescription').value = '';
            // Note: The Date Needed input might also need to be cleared/reset.
        });
    }
    // ------------------------------------

    // 1. Logic for Category Buttons (Modal opener)
    RequestCatButton.forEach(function (btn) {
        btn.addEventListener("click", function () {
            const buttonText = btn.textContent.trim();

            // Set the value of the category dropdown
            RequestCatSelect.value = buttonText;

            // Manually trigger the change event on the select box
            RequestCatSelect.dispatchEvent(new Event("change"));
        });
    });

    // 2. Logic for Category Select Box (Visibility and Population)
    RequestCatSelect.addEventListener("change", function () {
        const selectedValue = this.value;

        // Clear Request Details dropdown and Request Type dropdown first
        clearAndResetSelect(requestDetailSelect, "Select Request Detail");
        clearAndResetSelect(RequestTypeSelect, "Select Request Type");

        if (selectedValue === "Software & Applications") {
            // SHOW Request Details container
            requestDetailsContainer.classList.remove("d-none");

            // Populate Request Details
            SoftwareDeveloperReqDet.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                requestDetailSelect.appendChild(newOption);
            });

            // Populate Request Type
            SoftwareDeveloperReqServ.forEach((request)=>{
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                RequestTypeSelect.appendChild(newOption);
            });

        } else if (selectedValue === "Technical Support") {

            // HIDE Request Details container
            requestDetailsContainer.classList.add("d-none");

            // Populate Request Type with Technical Support details
            TechnicalSupportReqDet.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                RequestTypeSelect.appendChild(newOption);
            });

        } else {
            // HIDE the Request Details container for "Others" or default state
            requestDetailsContainer.classList.add("d-none");
            // RequestTypeSelect is already cleared at the beginning of this function
        }
    });

    // 3. Initial state setting
    requestDetailsContainer.classList.add("d-none");

    // (Navigation Link logic)
    NavigationLink.forEach((item) => {
        item.addEventListener("click", (event) => {
            NavigationLink.forEach((el) => {
                el.classList.remove("active");
            });
            event.target.classList.add("active");
        });
    });
});
