function Thebility() {
    this.init = function() {
        document
            .querySelector("#thebilityIcon")
            .addEventListener("click", function() {
                toggleThebility();
            });
        document
            .querySelector("#dragThebility")
            .addEventListener("click", function() {
                drag(this.parentNode);
            });
        document
            .querySelector("#closeThebility")
            .addEventListener("click", function() {
                closeThebility(this.parentNode);
            });

        document
            .querySelector(".thebilityDiv #fontDivSizeSlider")
            .addEventListener("input", function() {
                fontDivSizeSlider(this.value);
            });

        document
            .querySelector(".thebilityDiv #graySlider")
            .addEventListener("input", function() {
                graySlider(this.value);
            });

        document
            .querySelector(".thebilityDiv #contrastSlider")
            .addEventListener("input", function() {
                contrastSlider(this.value);
            });

        document
            .querySelector(".thebilityDiv #brightnessSlider")
            .addEventListener("input", function() {
                brightnessSlider(this.value);
            });

        document
            .querySelector(".thebilityDiv#bolderFont")
            .addEventListener("click", function() {
                bolderFont();
            });

        document
            .querySelector(".thebilityDiv#animPause")
            .addEventListener("click", function() {
                animPause();
            });

        document
            .querySelector(".thebilityDiv#aUnderline")
            .addEventListener("click", function() {
                aUnderline();
            });

        document
            .querySelector(".thebilityDiv#invertHtml")
            .addEventListener("click", function() {
                invertHtml();
            });
    };

    let enabled = !1;
    let enabled2 = !1;
    let enabled3 = !1;
    let enabled4 = !1;
    let enabled5 = !1;
    let enabled6 = !1;

    function toggleThebility() {
        if (!enabled) {
            enabled = !0;
            let thebilityMainDiv = document.getElementById("thebilityMainDiv");
            //fix workaround for drag button
            document
                .querySelector("#dragThebility").click();
            /**/
            thebilityMainDiv.style.display = "flex";
            setTimeout(() => {
                thebilityMainDiv.style.opacity = "1";
            }, 100);
        } else {
            enabled = !1;
            thebilityMainDiv.style.display = "none";
            thebilityMainDiv.style.opacity = "0";
        }
    }

    function closeThebility(x) {
        enabled = !1;
        thebilityMainDiv.style.display = "none";
        thebilityMainDiv.style.opacity = "0";
    }

    function fontDivSizeSlider(v) {
        let x = document.querySelectorAll(
            "div:not(.thebility), span, p, br, h1, h2, h3, h4, h5, h6, strong, em, blockquote, hr, code, ul, li, ol, pre, mark, ins, del, sup, sub, small, i, b"
        );

        for (let i = 0; i < x.length; i++) {
            x[i].style.fontSize = v + "vh";
        }
    }

    function graySlider(v) {
        let x = document.querySelectorAll("html");
        let contV = document.getElementById("contrastSlider").value;
        let brighV = document.getElementById("brightnessSlider").value;
        for (let i = 0; i < x.length; i++) {
            x[i].style.filter =
                "contrast(" +
                contV +
                ") brightness(" +
                brighV +
                ") grayscale(" +
                v +
                ")";
        }
    }

    function contrastSlider(v) {
        let x = document.querySelectorAll("html");
        let grayV = document.getElementById("graySlider").value;
        let brighV = document.getElementById("brightnessSlider").value;

        for (let i = 0; i < x.length; i++) {
            x[i].style.filter =
                "grayscale(" +
                grayV +
                ") brightness(" +
                brighV +
                ") contrast(" +
                v +
                ")";
        }
    }

    function brightnessSlider(v) {
        let x = document.querySelectorAll("html");
        let grayV = document.getElementById("graySlider").value;
        let contV = document.getElementById("contrastSlider").value;

        for (let i = 0; i < x.length; i++) {
            x[i].style.filter =
                "grayscale(" +
                grayV +
                ") contrast(" +
                contV +
                ") brightness(" +
                v +
                ")";
        }
    }

    function bolderFont() {
        let texts = document.querySelectorAll(
            "div:not(.thebility), span, p, br, h1, h2, h3, h4, h5, h6, strong, em, blockquote, hr, code, ul, li, ol, pre, mark, ins, del, sup, sub, small, i, b"
        );
        if (!enabled6) {
            enabled6 = !0;
            for (let i = 0; i < texts.length; i++) {
                texts[i].classList.add("bolderfont");
            }
        } else {
            enabled6 = !1;
            for (let i = 0; i < texts.length; i++) {
                texts[i].classList.remove("bolderfont");
            }
        }
    }

    function animPause() {
        let elems = document.querySelectorAll("div,span,img");
        if (!enabled2) {
            enabled2 = !0;
            for (let i = 0; i < elems.length; i++) {
                elems[i].classList.add("animPause");
            }
        } else {
            enabled2 = !1;
            for (let i = 0; i < elems.length; i++) {
                elems[i].classList.remove("animPause");
            }
        }
    }

    function aUnderline() {
        let links = document.getElementsByTagName("a");
        if (!enabled3) {
            enabled3 = !0;
            for (let i = 0; i < links.length; i++) {
                links[i].classList.add("aUnderline");
            }
        } else {
            enabled3 = !1;
            for (let i = 0; i < links.length; i++) {
                links[i].classList.remove("aUnderline");
            }
        }
    }

    function invertHtml() {
        let html = document.getElementsByTagName("html");
        if (!enabled5) {
            enabled5 = !0;
            html[0].classList.add("invertHtml");
        } else {
            enabled5 = !1;
            html[0].classList.remove("invertHtml");
        }
    }
}