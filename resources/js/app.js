import "./bootstrap";
import * as bootstrap from "bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.js";
import "@tabler/core/dist/js/tabler.min.js";
import { Button } from "bootstrap/dist/js/bootstrap.bundle.js";

window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", () => {
    const NavigationLink = document.querySelectorAll(".nav-links");

    const RequestCatSelect = document.getElementById("requestCategorySelect");
    const RequestCatButton = document.querySelectorAll(".RequestCatButton");

    const requestDetailSelect = document.getElementById("requestDetailSelect");
    const requestDetailSelectContainer = document.getElementById(
        "requestDetailsContainer"
    );
    const RequestTypeInput = document.getElementById("RequestTypeSelect");

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

    // *****function*****
    NavigationLink.forEach((item) => {
        item.addEventListener("click", (event) => {
            NavigationLink.forEach((el) => {
                el.classList.remove("active");
            });

            event.target.classList.add("active");
        });
    });

    function clearAndResetSelect(selectElement, placeholderText = "Options") {
        selectElement.innerHTML = "";
        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = placeholderText;
        defaultOption.setAttribute("disabled", true);
        defaultOption.setAttribute("selected", true);
        selectElement.appendChild(defaultOption);
    }

    RequestCatSelect.addEventListener("change", function () {
        const selectedValue = this.value;

        if (selectedValue === "Software & Applications") {
            // 1. SHOW the container
            requestDetailsContainer.classList.remove("d-none");

            // 2. Clear and populate the Request Details select box
            clearAndResetSelect(requestDetailSelect, "Select Request Detail");

            SoftwareDeveloperReqDet.forEach((request) => {
                const newOption = document.createElement("option");
                newOption.value = request;
                newOption.textContent = request;
                requestDetailSelect.appendChild(newOption);
            });
        } else {
            // 1. HIDE the container for all other selections
            requestDetailsContainer.classList.add("d-none");

            // 2. Clear the contents when hiding
            clearAndResetSelect(requestDetailSelect, "Options");
        }
    });

    // Optional: If you also want the initial state to be correct on page load
    requestDetailsContainer.classList.add("d-none");
});
