function pmEmailLoader(page) {

    let loader = document.createElement("div");
    let _parent = "#pm_page_" + page;
    let parent = document.querySelector(_parent);

    loader.setAttribute("class", "pm_loader pm_emailLoader");
    parent.appendChild(loader);

    /*  let form = document.querySelectorAll(_parent + " form");
     form.forEach(el => {
         el.addEventListener("submit", function() {
             init_setEmailLoader();
         });
     }); */

}