//Start fun!
document.addEventListener("DOMContentLoaded", initFun);
//Custom pages functions
window.addEventListener("hashchange", setPageFunctions, false);

//CONSTANTS
const PM_DIR = document.querySelector("html").getAttribute("dir");
const PM_LANG = document.querySelector("html").getAttribute("lang");
const PM_ISDEVICE = document.querySelector("html").getAttribute("data-device");
const PM_ISMOBOS = document.querySelector("html").getAttribute("mobos");
const PM_SKELETON_CASE = document.querySelector("html").getAttribute("data-skeleton");
const PM_HEADER = document.querySelector("html").getAttribute("data-header");
const PM_FOOTER = document.querySelector("html").getAttribute("data-footer");
const PM_ONEPAGER = document.querySelector("html").getAttribute("data-onepage");
const PM_ROUT = document.querySelector("html").getAttribute("data-router");
const PM_ISDEV = document.querySelector("html").getAttribute("data-dev");
const PM_ISLOCAL = document.querySelector("html").getAttribute("data-local");

let PM_ISMOB;
if (PM_ISDEVICE === "mob" &&
    PM_ISDEVICE === "tab") {
    PM_ISMOB = true;
} else if (PM_ISDEVICE === "desk") {
    PM_ISMOB = false;
} else {
    console.log("PM_ISDEVICE not defined");
}
let PM_DIROPOSITE;
let PM_LTR;
if (PM_DIR === "ltr") {
    PM_DIROPOSITE = "rtl";
    PM_LTR = true;
} else if (PM_DIR === "rtl") {
    PM_DIROPOSITE = "ltr";
    PM_LTR = false;
} else {
    console.log("PM_DIR ERROR!");
}

//SIZES

//DO NOT EDIT - EDIT THE CORE JS
function initFun() {

    setTimeout(() => {}, 100);
    //js router
    if (PM_ONEPAGER === "false" || PM_ROUT === "false") {
        setRouter();
    }

    //Set Misc Fixes
    if (PM_ISDEVICE === "tab") {
        noHoverOnVerticalMenuTablet()
    }
    if (PM_HEADER !== "none") {
        setChangeLang();
        setBarAsset();
        //Set hamburger
        setHamburgerMenu();
    }
    if (PM_HEADER !== "none" && PM_HEADER !== "float") {
        addClassOnScroll("#pm_Header--desktop", "--scrolled");
        addClassOnScroll("#pm_Header--mobile", "--scrolled");
        document.querySelector("#pm_logo-header").addEventListener("click", function() {
            location.reload();
        });
    }

    if (PM_HEADER === "vert" || PM_HEADER === "vertext") {
        setChangeVertHeader();

    }

    //Set go to top button
    setGototopButton();
    //Set translation for modal windows - will be removed later
    initModalLocalisation();
    //THEBILITY!
    new Thebility().init();
    //
    if (PM_HEADER === "float" && !PM_ISMOB) {
        dragFloatingHeader();
    }
    //Assign refresh page to header logo

    //Get content of page
    if (PM_ONEPAGER === "false") {
        let hash = window.location.hash;
        if (hash === "") return;
        let id = hash.split("#").pop();
        if (id === null || !isFinite(id) || id !== parseInt(id, 10)) return;
        getContentView(id);
    }

}