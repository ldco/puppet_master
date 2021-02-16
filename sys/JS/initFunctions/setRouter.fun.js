function setRouter() {
    let els = document.querySelectorAll("li.pm_nav_item:not(.isempty)");
    els.forEach(el => {
        el.addEventListener("click", function() {
            let _id = this.id;
            let id = _id.split("#").pop();
            getContentView(id);
            console.log(this);
            setTimeout(() => {
                removeHamburger();
            }, 50);
        });
    });
}