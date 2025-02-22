function setHamburgerMenu() {

    let hamburger = document.querySelector(".pm_hamburger");
    let mobileHeader = document.querySelector("#pm_mobile-slide");
    let helperDiv = document.createElement("div");
    let slideDistance;
    if (PM_HEADER === "float") {
        slideDistance = "4vh";
    } else {
        slideDistance = "0vh";
    }
    helperDiv.setAttribute("class", "click-anywhere");
    helperDiv.addEventListener("click", function() {
        hamburger.click();
        helperDiv.remove();
    });
    hamburger.addEventListener("click", function() {
        document.body.appendChild(helperDiv);
        hamburger.classList.toggle("is-active");
        let active = hamburger.classList.contains("is-active");
        if (active) {
            mobileHeader.style.display = "flex";
            setTimeout(() => {
                if (PM_LTR) {
                    anime({
                        targets: mobileHeader,
                        translateX: 0,
                        left: slideDistance,
                        easing: 'spring(0.1, 50, 1.6, 0)'
                    });
                } else {
                    anime({
                        targets: mobileHeader,
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
    if (document.querySelector(".click-anywhere")) {
        document.querySelector(".pm_hamburger").classList.remove("is-active");
        document.querySelector(".click-anywhere").remove();
        let mobileHeader;
        mobileHeader = document.querySelector("#pm_mobile-slide");
        if (PM_LTR) {
            anime({
                targets: mobileHeader,
                translateX: '-100vw',
                left: '0',
                easing: 'spring'
            });
        } else {
            anime({
                targets: mobileHeader,
                translateX: '100vw',
                right: '0',
                easing: 'spring'
            });
        }
        setTimeout(() => {
            mobileHeader.style.display = "none";
        }, 300);
    }
}