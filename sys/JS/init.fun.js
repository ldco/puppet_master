document.addEventListener("DOMContentLoaded", initFun);
window.addEventListener("hashchange", setPageFunctions, false);


const PM_DIR = document.querySelector("html").getAttribute("dir");
const PM_LANG = document.querySelector("html").getAttribute("lang");
const PM_ISMOB = document.querySelector("html").getAttribute("data-mob");
const PM_ARR_OF_LANGS = ["en", "he"];
const PM_HEADER = document.querySelector("html").getAttribute("data-header");
const PM_ONEPAGER = document.querySelector("html").getAttribute("data-onepage");
const PM_FLOATHEADER = document.querySelector("html").getAttribute("data-FLOATHEADER");

if (PM_DIR === "ltr") {
    const PM_DIROPOSITE = "rtl";
    const PM_LTR = true;
} else if (PM_DIR === "rtl") {
    const PM_DIROPOSITE = "ltr";
    const PM_LTR = false;
} else {
    console.log("PM_DIR ERROR!");
}

function initFun() {

    if (PM_ONEPAGER === "false") {
        setRouter();
    }
    setHamburgerMenu();

    if ((PM_HEADER === "true") || (PM_FLOATHEADER === "true")) {
        setChangeLang();
    }

    if (PM_HEADER === "true") {
        setBarAsset();
        setOnScroll("#pm_Header--desktop", "pm_bar_scrolled");
    }
    setGoTopButton();
    initModalLocalisation();
    new Thebility().init();
    if (PM_ONEPAGER === "false") {
        getAgent();
    }

    if (PM_FLOATHEADER === "true") {

        document.querySelector("#pm_logo-float--header").addEventListener("click", function() { drag(this); });
        document.querySelector("#pm_logo-float--header").click();
    }
    //CUSTOM FUNCTIONS
    //
    if (PM_ISMOB === "false") {
        moveBar();
    }

    lightBox("porfoGrid_item", "porfoGrid_lb");
    googleMap("rippMap");
    //
    /*end of functions list!*/
    if (PM_ONEPAGER === "false") {
        let setURL = window.location.hash;
        if (setURL === "") return;
        let id = setURL.split("#").pop();
        if (id === null || !isFinite(id) || id !== parseInt(id, 10)) return;
        getContentView(id);
    }
}