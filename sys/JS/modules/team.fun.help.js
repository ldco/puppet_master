function teamHelp() {

    let els = document.querySelectorAll('[class*="pm_team_rank_"]');
    let arr = [];
    els.forEach(el => {
        let el2 = el.className;
        let el3 = el2.split("pm_team_rank_").pop();
        arr.push(el3);
    });
    arr = new Set(arr);
    arr.forEach(el => {
        let div = document.createElement("div");
        let els = document.querySelectorAll(".pm_team_rank_" + el);
        els.forEach(elm => {
            div.appendChild(elm);
            div.setAttribute("class", "pm_team_wrapper_rank_" + el);
            document.querySelector(".pm_team").appendChild(div);
        });
    });
}