function getContentView(id) {
    let lang = document.querySelector("html").getAttribute("lang");
    history.replaceState(null, null, " ");

    let path;
    if (PM_ISLOCAL === "false" && PM_ISDEV === "true") {
        path = '/PM_DEV/index.php?content_page=1';
    } else {
        path = '/index.php?content_page=1';
    }


    let ajx = new XMLHttpRequest();
    let pageRP = '';

    ajx.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            pageRP = ajx.responseText;
            document.querySelector("main").innerHTML = pageRP;
        }
    };
    ajx.open("POST", path, true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("id=" + id + "&lang=" + lang);
    window.location.hash += id;

}