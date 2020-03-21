const AOS = require("aos");

function aosjs(clas, anim, offset, duration, delay) {


    for (let i = 0; i < document.getElementsByClassName(clas).length; i++) {
        document.getElementsByClassName(clas)[i].setAttribute("data-aos", anim);
    }

    /*  let scrollFunction = () => {
        let el = window.scrollY;
        if (el > 0) {
            window.removeEventListener("scroll", scrollFunction, false);
        }
    };
    window.addEventListener("scroll", scrollFunction, false); */

    AOS.init({
        offset: offset,
        duration: duration,
        easing: "ease-in-sine",
        delay: delay
    });
}