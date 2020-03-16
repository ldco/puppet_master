function setPageFunctions() {
    let time = 50;

    function set(i, arr) {
        let _page = document.querySelectorAll("#pm_id_Bar .nav_item")[i];
        let _pagem = document.querySelectorAll("#pm_mobileBar .nav_item")[i];
        arr.push(_page, _pagem);
    }
    let page1 = [];
    set(0, page1);
    page1.forEach(element => {
        element.addEventListener("click", function() {
            setTimeout(() => {
                mainPageIntro();
            }, time);
        });
    });
}