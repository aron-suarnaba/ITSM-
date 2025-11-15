import "./bootstrap";
import * as bootstrap from "bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.js";
import "@tabler/core/dist/js/tabler.min.js";
import { Button } from "bootstrap/dist/js/bootstrap.bundle.js";

window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", () => {

    const NavigationLink = document.querySelectorAll(".nav-links");

    const RequestCatSelect = document.getElementById("RequestCategorySelect");
    const RequestCatButton = document.querySelectorAll(".RequestCatButton");


    // *****function*****
    NavigationLink.forEach((item) => {
        item.addEventListener("click", (event) => {
            NavigationLink.forEach((el) => {
                el.classList.remove("active");
            });

            event.target.classList.add("active");
        });
    });


    RequestCatButton.forEach(function(button){
        button.addEventListener("click", function(){

            const buttonText = button.textContent.trim();

            RequestCatSelect.value = buttonText;

        });
    });



});
