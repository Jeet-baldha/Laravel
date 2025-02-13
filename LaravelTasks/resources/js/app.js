import "./bootstrap";
import Alpine from "alpinejs";

import DataTable from "datatables.net-bs5";
import * as Popper from "@popperjs/core";

window.Popper = Popper;

import jQuery from "jquery";
window.$ = jQuery;

window.Alpine = Alpine;
Alpine.start();
