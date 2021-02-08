//Start fun!
document.addEventListener("DOMContentLoaded", initFun);
//Custom pages functions
window.addEventListener("hashchange", setPageFunctions, false);

//CONSTANTS
const PM_DIR = document.querySelector("html").getAttribute("dir");
const PM_LANG = document.querySelector("html").getAttribute("lang");
const PM_ISMOB = document.querySelector("html").getAttribute("data-mob");
const PM_ARR_OF_LANGS = ["en", "he"];
const PM_HEADER = document.querySelector("html").getAttribute("data-header");
const PM_ONEPAGER = document.querySelector("html").getAttribute("data-onepage");
const PM_FLOATHEADER = document.querySelector("html").getAttribute("data-floatheader");
const PM_ROUT = document.querySelector("html").getAttribute("data-router");

//
if (PM_DIR === "ltr") {
    const PM_DIROPOSITE = "rtl";
    const PM_LTR = true;
} else if (PM_DIR === "rtl") {
    const PM_DIROPOSITE = "ltr";
    const PM_LTR = false;
} else {
    console.log("PM_DIR ERROR!");
}


//DO NOT EDIT - EDIT THE CORE JS
function initFun() {
    setTimeout(() => {}, 100);
    //
    //js router
    if (PM_ONEPAGER === "false" || PM_ROUT === "false") {
        setRouter();
    }
    //Set hamburger
    setHamburgerMenu();
    //
    if ((PM_HEADER === "true") || (PM_FLOATHEADER === "true")) {
        setChangeLang();
    }
    if (PM_HEADER === "true") {
        setBarAsset();
        setOnScroll("#pm_Header--desktop", "pm_bar_scrolled");
    }
    //Set go to top button
    setGoTopButton();
    //Set translation for modal windows - will be removed later
    initModalLocalisation();
    //THEBILITY!
    new Thebility().init();
    //
    if (PM_FLOATHEADER === "true" && PM_ISMOB === "false") {
        dragFloatingHeader();
    }
    if (PM_ISMOB === "false") {}
    //Assign refresh page to header logo
    if (PM_FLOATHEADER === "false") {
        document.querySelector("#pm_logo-header").addEventListener("click", function() { location.reload(); });
    }
    //Get content of page
    if (PM_ONEPAGER === "false") {
        let hash = window.location.hash;
        if (hash === "") return;
        let id = hash.split("#").pop();
        if (id === null || !isFinite(id) || id !== parseInt(id, 10)) return;
        getContentView(id);
    }

}