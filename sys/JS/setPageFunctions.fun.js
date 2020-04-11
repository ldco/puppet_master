function setPageFunctions() {
    let setURL = window.location.hash;
    if (setURL == "") return;
    let id = setURL.split("#").pop();
    if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
    let timeout = 500;


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
        fun_4: function() {
            aosjs("internetGrid");

        },
        fun_6: function() {
            aosjs("fontsGrid");
            initDownloadFont();
        },
        fun_7: function() {
            aosjs("printGrid");
        },
        fun_8: function() {
            aosjs("motiongraphicsGrid");
            pmLoader("iframe", "#pm_page_8", "load", "pm_loader1");
        },
        fun_9: function() {

            macyjs("artGrid", 4);
        },
        fun_10: function() {
            teamHelp();
        },
        fun_11: function() {
            pmEmailLoader("11");
        }


    };


    if (fun["fun_" + id]) {
        setTimeout(() => {
            fun["fun_" + id]();

        }, timeout);

    }

}