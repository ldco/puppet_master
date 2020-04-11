function pmEmailLoader(page) {
    let loader = document.createElement("div");
    let _parent = "#pm_page_" + page;
    let parent = document.querySelector(_parent);

    function init_setEmailLoader() {
        loader.setAttribute("class", "pm_loader pm_emailLoader");
        parent.appendChild(loader);
        document.querySelector("#pm_overlay").style.display = "flex";
    }

    let form = document.querySelectorAll(_parent + " form");
    form.forEach(el => {
        el.addEventListener("submit", function() {
            init_setEmailLoader();
        });

    });


}