function setChangeVertHeader() {

    let el = document.querySelector("#vertHeaderChanger");

    let arr = [document.querySelector("#pm_Header--desktop"), document.querySelector("main"), document.querySelector("footer"), el];

    let clas = "vert--extended";

    let transition = "1s ease";

    el.addEventListener("click", function() {

        if (!this.classList.contains(clas)) {
            arr.forEach(elem => {
                elem.classList.add(clas);
                elem.style.transition = transition;
            });
        } else {
            arr.forEach(elem => {
                elem.classList.remove(clas);
                elem.style.transition = transition;
            });
        }


    })

}