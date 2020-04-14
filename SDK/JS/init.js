document.addEventListener("DOMContentLoaded", initFun);

function initFun() {
    goRoot();
    clearTerminal();
    toggleDisabledInput("gitmaster", "gitto");
    toggleDisabledInput("gitself", "gitcom");
    assignFun("#git", function() {
        postGit();
    });
    assignFun("#color", function() {
        changeSvgColors();
    });
    assignFun("#pass", function() {
        passwordHash();
    });
    assignFun("#deploy", function() {
        execNpm("deploy");
    });
    assignFun("#coms", function() {
        execCommand("coms");
    });
    assignFun("#com", function() {
        execCommand("com");
    });
    assignFun("#npm", function() {
        execNpm("npm");
    });
    assignFun("#sh", function() {
        execSh();
    });
}

function goRoot() {
    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            setTimeout(() => {
                if (ajx.responseText) {
                    htmlWrapper(ajx.responseText);
                } else {
                    htmlWrapper("matrix error...");
                }
            }, 100);
        }
    };
    ajx.open("POST", "php/goRoot.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send();
}

function clearTerminal() {
    els = document.querySelectorAll("input[type='submit']");
    els.forEach((el) => {
        el.addEventListener("click", function() {
            document.getElementById("sdk_terminal").innerHTML = "";
        });
    });
}

function assignFun(el, fun) {
    document.querySelector(el).addEventListener("click", function() {
        fun();
    });
}

function toggleDisabledInput(checkbox, textinput) {
    let cel = document.getElementsByName(checkbox)[0];
    let tel = document.getElementsByName(textinput)[0];
    cel.addEventListener("change", function() {
        if (cel.checked) {
            tel.disabled = true;
        } else {
            tel.disabled = false;
        }
    });
}

//html wrapper for termianl otput

function htmlWrapper(input, json = false) {
    let string = document.createElement("div");
    string.setAttribute("class", "terminal_string");
    document.getElementById("sdk_terminal").appendChild(string);
    if (!json) {
        string.innerHTML = input;
    } else {
        string.innerHTML = JSON.parse(input);
    }
}

function copyClipboard(x) {
    /* Get the text field */
    let copyText = document.querySelector(x);
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/
    /* Copy the text inside the text field */
    document.execCommand("copy");
    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
}

//FUNCTIONS

function postGit() {
    let _gitself = document.getElementsByName("gitself")[0];
    let _gitmaster = document.getElementsByName("gitmaster")[0];
    let gitself = _gitself.checked;
    let gitmaster = _gitmaster.checked;
    let gitto = document.getElementsByName("gitto")[0].value;
    let gitcom = document.getElementsByName("gitcom")[0].value;
    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            htmlWrapper(ajx.responseText);
            document.getElementsByName("gitcom")[0].value = "";
            document.getElementsByName("gitto")[0].value = "";
        }
    };
    ajx.open("POST", "php/postGit.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send(
        "gitself=" +
        gitself +
        "&gitmaster=" +
        gitmaster +
        "&gitto=" +
        gitto +
        "&gitcom=" +
        gitcom
    );
}

function changeSvgColors() {
    let ajx = new XMLHttpRequest();
    let colorfrom = document.getElementsByName("colorfrom")[0].value;
    let colorto = document.getElementsByName("colorto")[0].value;
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            htmlWrapper(ajx.responseText);
        }
    };
    ajx.open("POST", "php/changeSvgColors.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("colorfrom=" + colorfrom + "&colorto=" + colorto);
}

function passwordHash() {
    let ajx = new XMLHttpRequest();
    let pass = document.getElementsByName("pass")[0].value;
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            htmlWrapper(ajx.responseText);
            document.getElementsByName("pass")[0].value = "";
        }
    };
    ajx.open("POST", "php/passwordHash.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("pass=" + pass);
}

function execCommand(name) {
    let ajx = new XMLHttpRequest();
    let com = document.getElementsByName(name)[0].value;
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            htmlWrapper(ajx.responseText);
        }
    };
    ajx.open("POST", "php/execCommand.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("com=" + com);
}

function execNpm(name) {
    let ajx = new XMLHttpRequest();
    let npm = document.getElementsByName(name)[0].value;
    if (name === "deploy") {
        npm = "dep--" + npm;
    }

    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            htmlWrapper(ajx.responseText);
        }
    };
    ajx.open("POST", "php/execNpm.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("npm=" + npm);
}

function execSh() {
    let ajx = new XMLHttpRequest();
    let deploy = document.getElementsByName("sh")[0].value;
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            htmlWrapper(ajx.responseText);
        }
    };
    ajx.open("POST", "php/execSh.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("sh=" + sh);
}