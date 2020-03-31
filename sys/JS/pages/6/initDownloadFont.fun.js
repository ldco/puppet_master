function initDownloadFont() {

    let els = document.getElementById("fontsGrid").querySelectorAll("div");
    els.forEach(el => {
        el.addEventListener("click", function() {
            promptDownloadFont(this);
        });
    });
}