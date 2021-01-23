function lightBox(elClass, boxClass) {

    let elements = document.querySelectorAll("." + elClass);

    elements.forEach(el => {
        el.addEventListener("click", function() {
            console.log("asd " + this.children[0].children[0].tagName);
            let box = document.createElement("div");
            let boxpmClass = "pm_lightBox";
            box.setAttribute("class", boxClass + " " + boxpmClass);
            document.body.appendChild(box);

            if (this.children[0].tagName === "IMG") {
                let boxImg = document.createElement("img");
                boxImg.src = this.children[0].src;
                box.appendChild(boxImg);
            } else if (this.children[0].children[0].tagName === "VIDEO") {
                let boxVideo = document.createElement("video");
                boxVideo.style.width = "100%";
                boxVideo.style.height = "100%";
                boxVideo.style.objectFit = "cover";
                boxVideo.setAttribute("autoplay", "");
                boxVideo.setAttribute("muted", "");
                boxVideo.setAttribute("loop", "");
                let boxVideoSource1 = document.createElement("source");
                boxVideoSource1.src = this.children[0].children[0].children[0].src;
                let boxVideoSource2 = document.createElement("source");
                boxVideoSource2.src = this.children[0].children[0].children[1].src;
                boxVideo.appendChild(boxVideoSource1);
                boxVideo.appendChild(boxVideoSource2);
                box.appendChild(boxVideo);

            } else {
                console.log("No images or videos on this element");
            }


            let boxClose = document.createElement("div");
            boxClose.setAttribute("class", "lbClose");
            boxClose.onclick = function() {
                this.parentNode.remove();
                this.remove();

            }
            box.appendChild(boxClose);
        });
    });

}