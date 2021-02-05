let PM_MODAL_LOC = [];

function initModalLocalisation() {
    let wordsToTranslate = [
        "alert",
        "back",
        "cancel",
        "close",
        "error",
        "no",
        "yes",
        "submit"
    ];

    let name = JSON.stringify(wordsToTranslate);
    let ifdev = document.getElementsByTagName("html")[0].getAttribute("data-dev");
    let ajx = new XMLHttpRequest();
    let sysFolder;
    if (ifdev === "true") {
        sysFolder = "/PM_DEV/sys/";
    } else {
        sysFolder = "/sys/";
    }
    ajx.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let fromDB = JSON.parse(ajx.responseText);
            PM_MODAL_LOC = fromDB;
        }
    };
    ajx.open("POST", sysFolder + "modules/initModalTranslate.php", true);
    ajx.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded; charset=UTF-8"
    );
    ajx.send("name=" + name + "&lang=" + PM_LANG);
}