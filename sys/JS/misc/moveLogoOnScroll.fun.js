function moveLogoOnScroll() {
    window.addEventListener("scroll", function() {
        let win = window.scrollY;
        let el = document.querySelector("#pm_Header-float--desktop");
        let elh = el.offsetWidth;
        let distance = "calc(100vw - " + elh + "px - 7vh)";
        let height = window.innerHeight;
        let transition = "0.8s";
        let logo = document.querySelector("#pm_logo-float--header");
        let logoimg = logo.querySelector("img");

        if (win > (height / 3)) {
            el.style.right = distance;
            el.style.transition = transition;
            logoimg.style.width = "5vh";
            logo.style.top = "3.5vh";
            logo.style.left = "2vh";
            logoimg.style.transition = transition;
            logo.style.transition = transition;

        } else {
            el.style.right = "2vh";
            el.style.transition = transition;
            logoimg.style.width = "50vh";
            logo.style.top = "25vh";
            logo.style.left = "calc(48vw - 25vh)";
            logoimg.style.transition = transition;
            logo.style.transition = transition;
        }
    });
}