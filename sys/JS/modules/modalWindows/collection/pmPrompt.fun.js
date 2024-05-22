function pmPrompt(title, fun, content, closetype, yesbut, nobut) {
    const el = pmModalBase(closetype);
    el.title(title);
    el.button(function() {
        fun();
    }, PM_MODAL_LOC[yesbut]);
    el.buttonClose(closetype, PM_MODAL_LOC[nobut]);
    el.div(content, "");
}