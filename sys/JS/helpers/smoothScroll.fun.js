function smoothScroll(elems) {
    document.querySelectorAll(elems).forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
}

//all anchors:
//'a[href^="#"]'