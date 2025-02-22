const ScrollMagic = require("scrollmagic");

function scrollmagic(object) {
    // init controller
    let controller = new ScrollMagic.Controller();

    // create a scene
    new ScrollMagic.Scene({
            duration: 100, // the scene should last for a scroll distance of 100px
            offset: 50 // start this scene after scrolling for 50px
        })
        .setPin(object) // pins the element for the the scene's duration
        .addTo(controller); // assign the scene to the controller

}