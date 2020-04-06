function smoothScroll(arr) {
    arr.forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
}

//all anchors:
//document.querySelectorAll('a[href^="#"]')