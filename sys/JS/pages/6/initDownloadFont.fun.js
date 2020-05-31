function initDownloadFont() {

    let els = document.getElementById("fontsGrid").querySelectorAll("div");
    els.forEach(el => {
        el.addEventListener("click", function() {
            promptDownloadFont(this);
        });
    });

    let all = document.getElementById("text_6_3");
    all.addEventListener("click", function() {
        downloadFont("LDCOFonts");
    });
}