import "./bootstrap";
import * as bootstrap from "bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.js";
import "@tabler/core/dist/js/tabler.min.js";

window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", () => {
    const NavigationLink = document.querySelectorAll(".nav-links");

    NavigationLink.forEach((item) => {
        item.addEventListener("click", (event) => {
            NavigationLink.forEach((el) => {
                el.classList.remove("active");
            });

            event.target.classList.add("active");
        });
    });
});
