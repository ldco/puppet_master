function pmPrompt(title, fun, content, closetype) {
    const el = pmModalBase(closetype);
    el.title(title);
    el.button(function() {
        fun();
    }, PM_MODAL_LOC[6]);
    el.buttonClose(closetype, PM_MODAL_LOC[5]);
    el.div(content, "");
}