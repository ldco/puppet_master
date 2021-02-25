function dynamFixSubmenusMargin() {
    let els = document.querySelectorAll("#pm_Nav--mobile>ul>li");
    els.forEach(el => {
        let k = el.getElementsByTagName("ul")[0];
        if (k) {
            el.style.marginBottom = (k.childElementCount * 4) + "vh";
        }
    });
}

function noHoverOnVerticalMenuTablet() {
    let istab = document.getElementsByTagName("html")[0].getAttribute('data-device');
    if (istab === "tab") {
        let els = document.querySelectorAll("#pm_Nav--desktop>ul>li");
        els.forEach(el => {
            let k = el.getElementsByTagName("ul")[0];
            let divs = el.querySelectorAll("div");
            if (!k) {
                divs.forEach(div => {
                    div.style.display = "none";
                });
            } else {
                divs.forEach(div => {
                    //make disapear on click
                    // div.style.display = "none";
                });

            }
        });
    }

}