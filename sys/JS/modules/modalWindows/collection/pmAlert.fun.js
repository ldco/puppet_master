function pmAlert(closetype) {
    const el = pmModalBase(closetype);
    el.title(PM_MODAL_LOC[0]);
    el.buttonClose(closetype, PM_MODAL_LOC[3]);
}