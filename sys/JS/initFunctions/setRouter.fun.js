function setRouter() {
    let els;
    els = document.querySelectorAll(".nav_item");
    els.forEach(el => {
        el.addEventListener("click", function() {
            getThisPageID(this);
            setTimeout(() => {
                removeHamburger();
            }, 50);
        });
    });
}