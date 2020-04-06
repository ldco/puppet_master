document.addEventListener("DOMContentLoaded", initFun);
window.addEventListener("hashchange", setPageFunctions, false);

const PM_DIR = document.querySelector("html").getAttribute("dir");
const PM_LANG = document.querySelector("html").getAttribute("lang");
const PM_ISADMIN = document.querySelector("html").getAttribute("data-admin");
const PM_ISMOB = document.querySelector("html").getAttribute("data-mob");
const PM_ARR_OF_LANGS = ["en", "ru", "he"];

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
    setHamburgerMenu();
    setRouter();
    setChangeLang();
    setBarAsset();
    initModalLocalisation();
    setGoTopButton();
    setOnScroll("#pm_id_Bar", "pm_bar_scrolled");
    new Thebility().init();
    mainPageIntro();

    /*end of functions list!*/
    let setURL = window.location.hash;
    if (setURL == "") return;
    let id = setURL.split("#").pop();
    if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
    getContentView(id);
}