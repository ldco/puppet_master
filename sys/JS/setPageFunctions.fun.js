function setPageFunctions() {
    let setURL = window.location.hash;
    if (setURL == "") return;
    let id = setURL.split("#").pop();
    if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
    let timeout = 100;
    let fun = {
        fun_1: function() {
            mainPageIntro();
        },
        fun_2: function() {
            aosjs();
        },
        fun_3: function() {
            archSlider();
        }
    };

    if (fun["fun_" + id]) {
        setTimeout(() => {
            fun["fun_" + id]();
        }, timeout);
    }
}