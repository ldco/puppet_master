function setChangeVertHeader() {

    let el = document.querySelector("#vertHeaderChanger");

    let nav = document.querySelector(".header-desktop--vert nav");

    let arr = [document.querySelector("#pm_Header--desktop"), document.querySelector("main"), document.querySelector("footer"), el];

    let clas = "vert--extended";

    let transition = 1;

    el.addEventListener("click", function() {

        if (!this.classList.contains(clas)) {
            nav.style.opacity = 0;
            setTimeout(() => {
                nav.style.opacity = 1;
            }, transition * 300);
            arr.forEach(elem => {
                elem.classList.add(clas);
                elem.style.transition = transition + "s ease";
            });
        } else {
            nav.style.opacity = 0;
            setTimeout(() => {
                nav.style.opacity = 1;
            }, transition * 50);
            arr.forEach(elem => {
                elem.classList.remove(clas);
                elem.style.transition = transition + "s ease";
            });
        }


    })

}