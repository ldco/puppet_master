function setRouter() {
    if (PM_ISADMIN == null) {
        var els = document.querySelectorAll(".nav_item");
    } else {
        var els = document.querySelectorAll(".nav_admin_item");
    }
    els.forEach(el => {
        el.addEventListener("click", function() {
            getThisContentView(this);
        });
    });
}