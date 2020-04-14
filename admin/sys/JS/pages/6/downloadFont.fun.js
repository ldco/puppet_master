function downloadFont(font) {
    let folder = "";
    let fileName = font + ".zip";
    let link = document.createElement("a");
    link.href = folder + fileName;
    link.click();
    link.remove();
    if (document.querySelector(".pm_modal_parent")) document.querySelector(".pm_modal_parent").remove();
    if (document.querySelector("pm_overlay").style.display !== "none")
        document.querySelector("pm_overlay").style.display = "none";

}