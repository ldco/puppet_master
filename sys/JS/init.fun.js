document.addEventListener("DOMContentLoaded", initFun);
window.addEventListener("hashchange", setPageFunctions, false);


const PM_DIR = document.querySelector("html").getAttribute("dir");
const PM_LANG = document.querySelector("html").getAttribute("lang");
const PM_ISMOB = document.querySelector("html").getAttribute("data-mob");
const PM_ARR_OF_LANGS = ["en", "he"];
const PM_BAR = document.querySelector("html").getAttribute("data-bar");
const PM_ONEPAGER = document.querySelector("html").getAttribute("data-onepage");
const PM_FLOATBAR = document.querySelector("html").getAttribute("data-floatbar");

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
    if (PM_FLOATBAR === "false") {
        setHamburgerMenu(false);
    } else {
        setHamburgerMenu(true);
    }

    if ((PM_BAR === "true") || (PM_FLOATBAR === "true")) {
        setChangeLang();
    }

    if (PM_BAR === "true") {
        setBarAsset();
        setOnScroll("#pm_id_Bar", "pm_bar_scrolled");
    }
    setGoTopButton();
    initModalLocalisation();
    new Thebility().init();
    if (PM_ONEPAGER === "false") {
        getAgent();
    }

    if (PM_FLOATBAR === "true") {

        document.querySelector("#pm_barLogoFloat").addEventListener("click", function() { drag(this); });
        document.querySelector("#pm_barLogoFloat").click();
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
        if (setURL == "") return;
        let id = setURL.split("#").pop();
        if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
        getContentView(id);
    }
}