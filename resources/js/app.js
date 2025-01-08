import "./bootstrap";
import "flowbite";
import $ from "jquery";
import "lightbox2/dist/js/lightbox-plus-jquery.min.js";
import "laravel-datatables-vite";

import Alpine from "alpinejs";

import "animate.css";

window.Alpine = Alpine;

Alpine.start();

// start upload bukti pembayaran, geser
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("bukti_pembayaran");
    const fileNameDisplay = document.getElementById("file-name");
    const uploadLabel = document.getElementById("upload-label");

    // Menangani event perubahan input file
    fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (file) {
            fileNameDisplay.textContent = file.name;
        } else {
            fileNameDisplay.textContent = "Tidak ada file yang dipilih";
        }
    });

    // Menangani event dragover untuk mengubah gaya label saat file di-drag
    uploadLabel.addEventListener("dragover", function (event) {
        event.preventDefault();
        uploadLabel.classList.add("bg-gray-100");
    });

    // Menangani event dragleave untuk mengembalikan gaya label saat file tidak di-drag lagi
    uploadLabel.addEventListener("dragleave", function () {
        uploadLabel.classList.remove("bg-gray-100");
    });

    // Menangani event drop untuk memproses file yang dijatuhkan
    uploadLabel.addEventListener("drop", function (event) {
        event.preventDefault();
        uploadLabel.classList.remove("bg-gray-100");
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files; // Set file ke input
            fileNameDisplay.textContent = files[0].name;
        }
    });
});
// end upload bukti pembayaran, geser

// core version + navigation, pagination modules:
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// // init Swiper:
const swiper = new Swiper(".swiper", {
    // configure Swiper to use modules
    modules: [Navigation, Pagination],
    loop: true,
    autoplay: {
        delay: 3000, // Autoplay interval 3 detik
        disableOnInteraction: false, // Lanjutkan autoplay meskipun user berinteraksi
    },

    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// // swiper start
// var swiper = new Swiper(".mySwiper", {
//     slidesPerView: 1,
//     spaceBetween: 30,
//     centeredSlides: true,
//     loop: true,
//     autoplay: {
//         delay: 3000,
//         disableOnInteraction: false,
//     },
//     scrollbar: {
//         el: ".swiper-scrollbar",
//         hide: true,
//     },
//     // pagination: {
//     //   el: ".swiper-pagination",
//     //   clickable: true,
//     // },
//     navigation: {
//         nextEl: ".swiper-button-next",
//         prevEl: ".swiper-button-prev",
//     },
// });
// // swiper end

// button to top
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth", // Animasi smooth saat gulir ke atas
    });
}
// button top end

// gsap
gsap.from("#logo-akreditasi", {
    delay: 0.5,
    opacity: 0,
    duration: 1,
    y: 60,
});

gsap.from(".logo1", {
    delay: 0.5,
    opacity: 0,
    duration: 1,
    x: -60,
});
gsap.from(".logo2", {
    delay: 0.5,
    opacity: 0,
    duration: 2,
    x: 60,
});
