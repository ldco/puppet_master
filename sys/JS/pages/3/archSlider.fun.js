import Swiper from "swiper";

function archSlider() {


    let mySwiper = new Swiper(".archSlider", {
        // Optional parameters
        direction: "horizontal",
        /* effect: 'fade', */
        centeredSlides: true,
        /*  autoplay: {
         delay: 2500,
         disableOnInteraction: false,
         }, */
        loop: true,

        // If we need pagination
        pagination: {
            el: ".swiper-pagination"
        },

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }

        // And if we need scrollbar
        /*  scrollbar: {
            el: ".swiper-scrollbar"
        } */
    });
}