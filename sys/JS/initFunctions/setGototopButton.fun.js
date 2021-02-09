 function setGototopButton() {
     let el = document.querySelector("#pm_gototop");
     let section = document.querySelector("section");

     window.onscroll = (event) => {
         if (window.scrollY > 90) {
             el.style.display = "flex";
             setTimeout(() => {
                 el.style.opacity = "1";
                 el.style.transition = "0.3s"
             }, 300);



         } else {
             el.style.opacity = "0";
             el.style.transition = "0.3s"
             setTimeout(() => {
                 el.style.display = "none";
             }, 300);
         }
     };
     el.addEventListener("click", function() {
         section.scrollIntoView({ behavior: "smooth", block: "start" });

     });
 }