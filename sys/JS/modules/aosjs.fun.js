const AOS = require("aos");

function aosjs(id, anim, offset, duration, delay) {


    for (let i = 0; i < document.querySelectorAll("#" + id + " div").length; i++) {
        console.log();

        document.querySelectorAll("#" + id + " div")[i].setAttribute("data-aos", anim);
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