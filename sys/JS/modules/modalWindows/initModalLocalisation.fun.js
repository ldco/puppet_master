let PM_MODAL_LOC = [];

function initModalLocalisation() {
    let wordsToTranslate = [
        "alert",
        "back",
        "cancel",
        "close",
        "error",
        "no",
        "yes"
    ];

    let name = JSON.stringify(wordsToTranslate);
    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let fromDB = JSON.parse(ajx.responseText);
            PM_MODAL_LOC = fromDB;
            // console.log(PM_MODAL_LOC);
        }
    };
    ajx.open("POST", "/sys/modules/initModalTranslate.php", true);
    ajx.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded; charset=UTF-8"
    );
    ajx.send("name=" + name + "&lang=" + PM_LANG);
}