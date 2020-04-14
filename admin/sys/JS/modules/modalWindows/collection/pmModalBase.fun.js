function pmModalBase(closetype) {
    let el = new Modal();
    el.dragIcon();
    el.closeIcon(closetype);
    //drag fix
    document
        .querySelector(".pm_modal_icon_drag").click();
    /**/
    return el;
}