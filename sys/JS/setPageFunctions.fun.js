function setPageFunctions() {
    let setURL = window.location.hash;
    if (setURL == "") return;
    let id = setURL.split("#").pop();
    if (id == null || !isFinite(id) || id != parseInt(id, 10)) return;
    let timeout = 500;

    let fun = {
        fun_1: function() {

        },
        fun_2: function() {

        },
        fun_3: function() {

        },
        fun_4: function() {

        },
        fun_6: function() {

        },
        fun_7: function() {

        },
        fun_8: function() {

        },
        fun_9: function() {

        },
        fun_10: function() {

        },
        fun_11: function() {
            pmEmailLoader("11");
        },
    };

    if (fun["fun_" + id]) {
        setTimeout(() => {
            fun["fun_" + id]();
        }, timeout);
    }
}