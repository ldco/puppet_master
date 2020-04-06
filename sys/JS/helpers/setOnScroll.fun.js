function setOnScroll(element, classname, height = 180) {
    window.addEventListener("scroll", function() {
        let win = window.scrollY;
        let el = document.querySelector(element);
        if (win > height) {
            el.classList.add(classname);

        } else {
            el.classList.remove(classname);
        }
    });

}