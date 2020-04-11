document.addEventListener("DOMContentLoaded", initFun);

function initFun() {
    clearTerminal();
    toggleDisabledInput("gitmaster", "gitto");
    toggleDisabledInput("gitself", "gitcom");
    assignFun("#submit_git", function() {
        postGit();
    });
    assignFun("#submit_gitadd", function() {
        gitAdd();
    });
    assignFun("#com", function() {
        execCustomCommand();
    });

}

function toggleDisabledInput(checkbox, textinput) {
    let cel = document.getElementsByName(checkbox)[0];
    let tel = document.getElementsByName(textinput)[0];
    cel.addEventListener("change",
        function() {
            if (cel.checked) {
                tel.disabled = true;
            } else {
                tel.disabled = false;
            }
        });
}

function assignFun(el, fun) {
    document.querySelector(el).addEventListener("click", function() {
        fun();
    });
}

function clearTerminal() {
    els = document.querySelectorAll("input[type='submit']");
    els.forEach(el => {
        el.addEventListener("click", function() {
            document.getElementById("sdk_terminal").innerHTML = "";
        });
    });
}

function postGit() {
    let gitself = document.getElementsByName("gitself")[0].value;
    let gitmaster = document.getElementsByName("gitmaster")[0].value;
    let gitto = document.getElementsByName("gitto")[0].value;
    let gitcom = document.getElementsByName("gitcom")[0].value;
    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let fromDB = ajx.responseText;

            document.getElementById("sdk_terminal").innerHTML = fromDB;
            document.getElementsByName("gitcom")[0].value = "";
            document.getElementsByName("gitto")[0].value = "";

        }
    };
    ajx.open("POST", "php/git--deploy.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("gitself=" + gitself + "&gitmaster=" + gitmaster + "&gitto=" + gitto + "&gitcom=" + gitcom);
}


function gitAdd() {
    let ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sdk_terminal").innerHTML = "added";
        }
    };
    ajx.open("POST", "php/git--add.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send();
}


function execCustomCommand() {
    let ajx = new XMLHttpRequest();
    let com = document.getElementsByName("com")[0].value;
    ajx.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let fromDB = ajx.responseText;
            document.getElementById("sdk_terminal").innerHTML = fromDB;
        }
    };
    ajx.open("POST", "php/custom-command.php", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send("com=" + com);
}