function getContentView(id) {
    let lang = document.querySelector("html").getAttribute("lang");
    history.replaceState(null, null, " ");

    let ajx = new XMLHttpRequest();
    let pageRP = '';

    ajx.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            pageRP = ajx.responseText;
            document.querySelector("main").innerHTML = pageRP;
        }
    };

    if (document.querySelector("html").getAttribute("data-dev") === "true") {
        ajx.open("POST", `/PM_DEV/index.php?content_page=1`, true);

    } else {
        ajx.open("POST", `/index.php?content_page=1`, true);
    }

    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("id=" + id + "&lang=" + lang);
    window.location.hash += id;

}