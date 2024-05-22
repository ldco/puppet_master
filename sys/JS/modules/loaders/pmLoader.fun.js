function pmLoader(el, parent, event, id = "pm_loader") {
    let loader = document.createElement("div");

    function initLoader() {
        loader.setAttribute("id", id);
        loader.setAttribute("class", "pm_loader ");
        document.querySelector(parent).appendChild(loader);
    }
    initLoader();
    document.querySelector(el).addEventListener(event, function() {
        loader.remove();
    });
}