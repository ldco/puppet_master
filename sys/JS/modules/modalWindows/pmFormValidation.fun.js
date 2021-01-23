function pmFormValidation(fun) {
    let els = document.querySelectorAll(".pm_requiredfield");
    let emails = document.querySelectorAll("input[type='email']");
    let tels = document.querySelectorAll("input[type='tel']");
    let iagree = document.querySelector(".pm_iagree");
    let inps = [];
    els.forEach((element) => {
        inps.push(element.nextSibling);
    });
    for (let i = 0; i < inps.length; i++) {
        if (inps[i].value.length === 0) {
            alert(pmModalLoc(13));
            return;
        } else {
            for (let i = 0; i < emails.length; i++) {
                if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emails[i].value)) {
                    for (let k = 0; k < tels.length; k++) {
                        if (/^\d+$/.test(tels[k].value)) {
                            if (iagree.checked == true) {
                                fun();
                                return;
                            } else {
                                alert(pmModalLoc(16));
                                return;
                            }
                        } else {
                            alert(pmModalLoc(15));
                            return;
                        }
                    }
                } else {
                    alert(pmModalLoc(14));
                    return;
                }
            }
        }
    }
}