function pmGetTranslate(text) {
    let _lang = document.querySelector("html");
    let lang = _lang.getAttribute("lang");

    let ajx = new XMLHttpRequest();

    ajx.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let _fromDB = ajx.responseText;
            let fromDB = JSON.parse(_fromDB);
            return _fromDB;
        }
    };
    ajx.open("POST", "/sys/helpers/pmTranslate.fun.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("lang=" + lang + "&text=" + text);
}