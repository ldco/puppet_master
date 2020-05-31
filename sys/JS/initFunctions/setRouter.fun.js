function setRouter() {
    let els;
    if (PM_ISADMIN === "false") {
        els = document.querySelectorAll(".nav_item");
    } else {
        els = document.querySelectorAll(".nav_admin_item");
    }
    els.forEach(el => {
        el.addEventListener("click", function() {
            getThisContentView(this);
            setTimeout(() => {
                removeHamburger();

            }, 50);
        });
    });
}