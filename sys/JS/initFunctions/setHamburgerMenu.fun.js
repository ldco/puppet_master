function setHamburgerMenu() {

    let hamburger = document.querySelector(".pm_hamburger");
    let mobileBar = document.querySelector("#pm_mobile-slide");
    let helperDiv = document.createElement("div");
    let slideDistance = "3vh";
    helperDiv.setAttribute("class", "hamburger--helper");
    helperDiv.addEventListener("click", function() {
        hamburger.click();
        helperDiv.remove();
    });
    hamburger.addEventListener("click", function() {
        document.body.appendChild(helperDiv);
        hamburger.classList.toggle("is-active");
        let active = hamburger.classList.contains("is-active");
        if (active) {
            mobileBar.style.display = "flex";
            setTimeout(() => {
                if (PM_LTR) {
                    anime({
                        targets: mobileBar,
                        translateX: 0,
                        left: slideDistance,
                        easing: 'spring(0.1, 50, 1.6, 0)'
                    });
                } else {
                    anime({
                        targets: mobileBar,
                        translateX: 0,
                        right: slideDistance,
                        easing: 'spring(0, 60, 1, 0)'
                    });
                }
            }, 10);
        } else {
            removeHamburger();
        }
    });
}

function removeHamburger() {
    if (document.querySelector(".hamburger--helper")) {
        document.querySelector(".pm_hamburger").classList.remove("is-active");
        document.querySelector(".hamburger--helper").remove();
        let mobileBar;
        mobileBar = document.querySelector("#pm_mobile-slide");
        if (PM_LTR) {
            anime({
                targets: mobileBar,
                translateX: '-100vw',
                left: '0',
                easing: 'spring'
            });
        } else {
            anime({
                targets: mobileBar,
                translateX: '100vw',
                right: '0',
                easing: 'spring'
            });
        }
        setTimeout(() => {
            mobileBar.style.display = "none";
        }, 300);
    }
}