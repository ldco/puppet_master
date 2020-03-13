let PM_MODAL_LOC = [];

function initModalLocalisation() {
    let wordsToTranslate = [
        "alert",
        "error",
        "back",
        "close",
        "yes",
        "no",
        "cancel"
    ];

    let name = JSON.stringify(wordsToTranslate);
    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let _fromDB = ajx.responseText;
            let fromDB = JSON.parse(_fromDB);
            console.log(_fromDB);
            console.log(fromDB);
        }
    };
    ajx.open("POST", "/sys/modules/initModalTranslate.php", true);
    ajx.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded; charset=UTF-8"
    );
    ajx.send("name=" + name + "&lang=" + PM_LANG);
}