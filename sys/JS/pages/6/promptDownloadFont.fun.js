function promptDownloadFont(y) {
    let font = y.querySelector("div").innerHTML;
    pmPrompt(
        "Alert",
        function() {
            downloadFont(font);
        },
        "Are you sure you want do download the font",
        1
    );
    let x = document.querySelector(".pm_modal_innerdiv").innerHTML;
    document.querySelector(".pm_modal_innerdiv").innerHTML = x + " " + font.toUpperCase() + "?";

}