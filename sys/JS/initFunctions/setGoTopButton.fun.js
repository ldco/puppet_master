function setGoTopButton() {
    let el = "#pm_gototop";
    setOnScroll("#pm_gototop", "pm_gototop--scrolled", 180);
    /*  document.querySelector(el).addEventListener("click", function() {
         window.scroll({
             top: 0,
             left: 0,
             behavior: 'smooth'
         });
     }); */
}