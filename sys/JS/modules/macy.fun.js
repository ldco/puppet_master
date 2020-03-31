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

    for (
        let i = 0; i < document.querySelectorAll("#" + id + " img").length; i++
    ) {
        document.querySelectorAll("#" + id + " img")[i].style.width = "100%";
    }
}