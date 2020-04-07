const AOS = require("aos");

function aosjs(id, anim = "fade", offset = 0, duration = 600, delay = 0) {
    for (
        let i = 0; i < document.querySelectorAll("#" + id + " div").length; i++
    ) {
        document
            .querySelectorAll("#" + id + " div")[i].setAttribute("data-aos", anim);
    }

    AOS.init({
        offset: offset,
        duration: duration,
        easing: "ease-in-sine",
        delay: delay
    });
}