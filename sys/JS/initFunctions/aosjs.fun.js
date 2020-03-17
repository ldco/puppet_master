const AOS = require("aos");

function aosjs() {
    let anim = "fade";
    let clas = "aos_reveal";

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
        offset: 0,
        duration: 600,
        easing: "ease-in-sine",
        delay: 100
    });
}