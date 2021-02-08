function setChangeLang() {
    let el = document.querySelector('#pm_Lang img');
    let el2 = document.querySelector('#pm_Nav-lang');
    if (el != null) {
        el.addEventListener("click", function() {
            el2.classList.toggle("--active");
        });
    }
}