function setHamburgerMenu() {

    let hamburger = document.querySelector(".pm_hamburger");
    let mobileBar = document.querySelector("#pm_mobileBar");
    let helperDiv = document.createElement("div");
    helperDiv.setAttribute("class", "hamburgerHelperDiv");
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
                        left: '3vh',
                        easing: 'spring(0.1, 50, 1.6, 0)'
                    });
                } else {
                    anime({
                        targets: mobileBar,
                        translateX: 0,
                        right: '0',
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
    if (document.querySelector(".hamburgerHelperDiv")) {
        document.querySelector(".pm_hamburger").classList.remove("is-active");
        document.querySelector(".hamburgerHelperDiv").remove();
        let mobileBar;
        mobileBar = document.querySelector("#pm_mobileBar");
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