import "./bootstrap";

import Alpine from "alpinejs";
import Echo from "laravel-echo";

window.Alpine = Alpine;

Alpine.start();

// Echo.channel('public.BC.1')
// .listen('BC', (e) => {
//     console.log('first')
// })

// window.Echo.channel("public.BC.1").listen("BC", (e) => {
//     window.livewire.emit("notif");
//     Swal.fire({
//         icon: "error",
//         title: "Oops...",
//         text: "Something went wrong!",
//         footer: '<a href="">Why do I have this issue?</a>',
//     });
// });

// Echo.private(`requestSend.${id}`).listen("MunicipalityTransactionEvent", (e) => {
//     console.log('fire');
// });

var sideBar = document.getElementById("mobile-nav");
var openSidebar = document.getElementById("openSideBar");
var closeSidebar = document.getElementById("closeSideBar");
sideBar.style.transform = "translateX(-260px)";

function sidebarHandler(flag) {
    if (flag) {
        sideBar.style.transform = "translateX(0px)";
        openSidebar.classList.add("hidden");
        closeSidebar.classList.remove("hidden");
    } else {
        sideBar.style.transform = "translateX(-260px)";
        closeSidebar.classList.add("hidden");
        openSidebar.classList.remove("hidden");
    }
}
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

