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
            aosjs("logoGrid");
        },
        fun_3: function() {
            archSlider();
        },
        fun_6: function() {
            aosjs("fontsGrid");
            initDownloadFont();
        },
        fun_7: function() {
            aosjs("printGrid");
        },
        fun_8: function() {},
        fun_9: function() {
            macyjs("artGrid", 4);
        }
    };

    if (fun["fun_" + id]) {
        setTimeout(() => {
            fun["fun_" + id]();
        }, timeout);
    }
}