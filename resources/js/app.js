import "./bootstrap";
import * as bootstrap from "bootstrap";
// import "@tabler/core/dist/css/tabler.min.css";
import "@tabler/core/dist/js/tabler.min.js";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import toastr from "toastr";
import "toastr/build/toastr.min.css";
import $ from "jquery";
// import List from "list.js";
// import List from '@tabler/core/dist/js/tabler-theme.js';
import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css";

import 'tabulator-tables/dist/css/tabulator_bootstrap5.min.css';
import { TabulatorFull as Tabulator } from "tabulator-tables";

window.Tabulator = Tabulator;

window.$ = $;
window.jQuery = $;
window.Toastify = Toastify;
window.toastr = toastr;
window.bootstrap = bootstrap;

// toastr.options = {
//   "closeButton": false,
//   "debug": false,
//   "newestOnTop": false,
//   "progressBar": false,
//   "positionClass": "toast-top-center",
//   "preventDuplicates": false,
//   "onclick": null,
//   "showDuration": "300",
//   "hideDuration": "1000",
//   "timeOut": "5000",
//   "extendedTimeOut": "1000",
//   "showEasing": "swing",
//   "hideEasing": "linear",
//   "showMethod": "fadeIn",
//   "hideMethod": "fadeOut"
// }

document.addEventListener("DOMContentLoaded", () => {
    const NavigationLink = document.querySelectorAll(".nav-link");

    NavigationLink.forEach((item) => {
        item.addEventListener("click", (event) => {
            NavigationLink.forEach((el) => {
                el.classList.remove("active");
            });
            event.target.classList.add("active");
        });
    });
});
