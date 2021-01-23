function setHamburgerMenu(float) {

    let hamburger = document.querySelectorAll(".pm_hamburger")[0];
    if (hamburger == null) return;
    let mobileBar;
    if (!float) {
        mobileBar = document.querySelectorAll(".pm_mobileBar")[0];
    } else {
        mobileBar = document.querySelectorAll(".pm_mobileBarFloat")[0];
    }
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
                    if (!float) {
                        anime({
                            targets: mobileBar,
                            translateX: 0,
                            left: '0',
                            easing: 'spring(0, 60, 1, 0)'
                        });
                    } else {
                        anime({
                            targets: mobileBar,
                            translateX: 0,
                            left: '3vh',
                            easing: 'spring(0.1, 50, 1.6, 0)'

                        });
                    }
                } else {
                    if (!float) {
                        anime({
                            targets: mobileBar,
                            translateX: 0,
                            right: '0',
                            easing: 'spring(0, 60, 1, 0)'
                        });
                    } else {
                        anime({
                            targets: mobileBar,
                            translateX: 0,
                            right: '3vh',
                            easing: 'spring(0.1, 50, 1.6, 0)'
                        });
                    }
                }
            }, 10);
        } else {
            removeHamburger(float);
        }
    });
}

function removeHamburger(float) {
    if (document.querySelector(".hamburgerHelperDiv")) {
        document.querySelectorAll(".pm_hamburger")[0].classList.remove("is-active");
        document.querySelector(".hamburgerHelperDiv").remove();
        let mobileBar;
        if (!float) {
            mobileBar = document.querySelectorAll(".pm_mobileBar")[0];
        } else {
            mobileBar = document.querySelectorAll(".pm_mobileBarFloat")[0];
        }
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