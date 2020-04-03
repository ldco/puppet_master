const Macy = require("macy");

function macyjs(id, col, margin = 0) {
    let macy = Macy({
        container: "#" + id,
        trueOrder: false,
        waitForImages: false,
        margin: margin,
        columns: col
    });
    document.querySelector("#" + id).style.width = "100%";

    document.querySelectorAll("#" + id + " img").forEach(el => {
        el.style.width = "100%";
    });
}