import "./bootstrap";
import * as bootstrap from "bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.js";
import "@tabler/core/dist/js/tabler.min.js";
import { Button } from "bootstrap/dist/js/bootstrap.bundle.js";

window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", () => {
    // --- Element Selection ---
    const RequestCatSelect = document.getElementById("requestCategorySelect");
    const RequestCatButton = document.querySelectorAll(".RequestCatButton");
    const requestDetailSelect = document.getElementById("requestDetailSelect");
    const requestDetailsContainer = document.getElementById(
        "requestDetailsContainer"
    );
    const RequestTypeSelect = document.getElementById("RequestTypeSelect"); // Assuming RequestTypeInput should be RequestTypeSelect
    const NavigationLink = document.querySelectorAll(".nav-links"); // Added element selection

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

    // 1. Logic for Category Buttons (Modal opener)
    RequestCatButton.forEach(function (btn) {
        btn.addEventListener("click", function () {
            const buttonText = btn.textContent.trim();

            // Set the value of the category dropdown
            RequestCatSelect.value = buttonText;

            // 🎯 CRITICAL: Manually trigger the change event on the select box
            RequestCatSelect.dispatchEvent(new Event("change"));

            // The modal opens automatically via data-bs-toggle/data-bs-target
        });
    });

    // 2. Logic for Category Select Box (Visibility and Population)
    RequestCatSelect.addEventListener("change", function () {
        const selectedValue = this.value;

        // Ensure Request Details dropdown and its options are cleared by default
        clearAndResetSelect(requestDetailSelect, "Select Request Detail");

        if (selectedValue === "Software & Applications") {
            // 1. SHOW the container
            requestDetailsContainer.classList.remove("d-none");

            // 2. Populate the Request Details select box
            SoftwareDeveloperReqDet.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                requestDetailSelect.appendChild(newOption);
            });

            SoftwareDeveloperReqServ.forEach((request)=>{
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                RequestTypeSelect.appendChild(newOption);
            });

            // Note: You may want to add logic here to populate RequestTypeSelect as well.
        } else if (selectedValue === "Technical Support") {

            requestDetailsContainer.classList.add("d-none");

            TechnicalSupportReqDet.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                RequestTypeSelect.appendChild(newOption);
            });

        }

        else {
            // 1. HIDE the container for all other selections (Technical Support, Others)
            requestDetailsContainer.classList.add("d-none");

            // Optional: You could add logic here to populate requestDetailSelect
            // with TechnicalSupportReqDet options if selectedValue is "Technical Support"
        }
    });

    // 3. Initial state setting
    requestDetailsContainer.classList.add("d-none");

    // (Kept for completeness, though separate from the main issue)
    NavigationLink.forEach((item) => {
        item.addEventListener("click", (event) => {
            NavigationLink.forEach((el) => {
                el.classList.remove("active");
            });
            event.target.classList.add("active");
        });
    });
});
