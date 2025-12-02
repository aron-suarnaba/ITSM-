import Echo from "laravel-echo";

// Ensure your broadcasting provider is configured here
window.Echo = new Echo({
    // ... config details (broadcaster, key, etc.)
});
window.Echo.private("requests.status.manager").listen(
    ".status.updated",
    (e) => {
        console.log("Real-time update received:", e);

        const updatedRequest = e.request;
        const newStatus = e.new_status || updatedRequest.status;
        const requestId = updatedRequest.id;

        const tableRow = document.querySelector(
            `tr[data-request-id="${requestId}"]`
        );

        if (!tableRow) {
            console.warn(`Row for Request ID ${requestId} not found.`);
            return;
        }

        const statusCell = tableRow.querySelector(".request-status-cell");
        if (statusCell) {
            statusCell.innerHTML = getStatusBadgeHtml(newStatus);
        }

        const reviewedByCell = tableRow.querySelector(".reviewed-by-cell");
        if (reviewedByCell) {
            reviewedByCell.textContent =
                updatedRequest.reviewed_by?.name || "N/A";
        }

        // Highlight animation
        tableRow.classList.add("highlight-update");
        setTimeout(() => tableRow.classList.remove("highlight-update"), 3000);
    }
);
