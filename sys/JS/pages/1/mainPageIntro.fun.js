function mainPageIntro() {
    if (window.location.hash !== "" && window.location.hash !== "#1") return;

    let dir = document.getElementsByTagName("html")[0].getAttribute("dir");

    function getRandomInt(min, max) {
        return Math.random() * (max - min) + min;
    }

    function presentation() {
        for (let i = 0; i < 7; i++) {
            let pre1 = document.createElement("div");
            let _pre1 = document.createElement("div");
            pre1.setAttribute("class", "page_O_present_anim_1");
            document.getElementById("pm_page_1").appendChild(_pre1);
            _pre1.appendChild(pre1);
        }
        let colors = ["#597884", "#aebecb", "#294552", "#00070a"];
        let pre1 = document.getElementsByClassName("page_O_present_anim_1");
        for (let i = 0; i < pre1.length; i++) {
            pre1[i].style.height = getRandomInt(1, 1.5) + "vh";
            pre1[i].style.backgroundColor =
                colors[Math.floor(Math.random() * colors.length)];
            pre1[i].style.width = "100vw";
            pre1[i].style.position = "absolute";
            pre1[i].style.top = getRandomInt(60, 70) + "vh";
            pre1[i].style.transition = "2s";
            pre1[i].style.zIndex = "3";
            pre1[i].style.opacity = "0.8";
            if (dir == "ltr") {
                pre1[i].style.left = "-100vw";
            } else {
                pre1[i].style.right = "-100vw";
            }
            setTimeout(() => {
                if (dir === "ltr") {
                    pre1[i].style.left = "0";
                } else {
                    pre1[i].style.right = "0";
                }
            }, 500);
        }
    }

    presentation();
    let bgimages = ["", "", "", "", "", ""];
    let videoParent = document.getElementById("bgVideo");

    function x(folder) {
        videoParent.style.backgroundImage =
            "url('sys/assets/images/" +
            folder +
            "/page_1/" +
            Math.floor(Math.random() * 10 + 1) +
            ".png')";
    }

    if (x("images")) {
        x("images");
    } else {
        x("images_dev");
    }
}