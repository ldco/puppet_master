function pmModalBase(closetype) {
    let el = new Modal();
    el.dragIcon();
    el.closeIcon(closetype);
    return el;
}