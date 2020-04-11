const Macy = require("macy");

function macyjs(id, col, margin = 0) {
    let elid = "#" + id;

    function pre_iniMacy(fun) {
        document.querySelector(elid).style.opacity = "0";
        setTimeout(() => {
            fun();
        }, 400);
    }

    function initMacy(fun) {
        makeMacy();
        setTimeout(() => {
            fun();
        }, 100);
    }

    function makeMacy() {
        let macy = Macy({
            container: elid,
            trueOrder: true,
            waitForImages: true,
            margin: margin,
            columns: col
        });
        document.querySelector(elid).style.width = "100%";
        document.querySelectorAll(elid + " img").forEach(el => {
            el.style.width = "100%";
        });
    }
    pre_iniMacy(function() {
        initMacy(function() {
            document.querySelector(elid).style.opacity = "1";

            if (document.querySelector(".pm_loader")) {
                document.querySelector(".pm_loader").remove();
            }

        });
    });
}