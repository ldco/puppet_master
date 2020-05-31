function setHamburgerMenu() {
    let hamburger = document.querySelectorAll(".pm_hamburger")[0];
    if (hamburger == null) return;
    let mobileBar = document.querySelectorAll(".pm_mobileBar")[0];

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
                    mobileBar.style.left = "0";
                } else {
                    mobileBar.style.right = "0";
                }
                mobileBar.style.transition = "ease 1s";
            }, 10);
        } else {
            removeHamburger();
        }
    });
}

function removeHamburger() {
    document.querySelectorAll(".pm_hamburger")[0].classList.remove("is-active");
    document.querySelector(".hamburgerHelperDiv").remove();
    let mobileBar = document.querySelectorAll(".pm_mobileBar")[0];
    if (PM_LTR) {
        mobileBar.style.left = "-60vw";
    } else {
        mobileBar.style.right = "-60vw";
    }
    mobileBar.style.transition = "ease 0.8s";
    setTimeout(() => {
        mobileBar.style.display = "none";
    }, 800);
}