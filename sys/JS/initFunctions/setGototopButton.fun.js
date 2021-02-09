 function setGototopButton() {
     let el = document.querySelector("#pm_gototop");
     window.onscroll = (event) => {
         if (window.scrollY > 180) {
             el.style.display = "flex";
             console.log("asdasdasd");
         } else {
             el.style.display = "none";
             console.log("ccccccccccccccccccc");
         }
     };


     el.addEventListener("click", function() {
         document.querySelector("section").scrollIntoView({ behavior: "smooth", block: "start" });

     });

 }