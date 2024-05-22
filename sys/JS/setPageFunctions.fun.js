function setPageFunctions() {
    let setURL = window.location.hash;
    if (setURL === "") return;
    let id = setURL.split("#").pop();
    if (id === null || !isFinite(id) || id !== parseInt(id, 10)) return;
    let timeout = 500;

    let fun = {
        fun_0: function() {

        },
        fun_1: function() {

        },
        fun_2: function() {

        },
        fun_3: function() {

        },
        fun_4: function() {

        },
        fun_5: function() {

        },
        fun_6: function() {

        },

    };

    if (fun["fun_" + id]) {
        setTimeout(() => {
            fun["fun_" + id]();
        }, timeout);
    }
}