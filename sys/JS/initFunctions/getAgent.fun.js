function getAgent() {
    let hash = window.location.hash.substring(1, 2);
    let agent = window.location.hash.slice(3);


    if (window.location.hash === "#6") {
        return;
    }
    if (hash === "6") {

        setTimeout(() => {
            let els = document.querySelectorAll(".pm_agents_item");
            let current = document.querySelector("#agentid_" + agent);
            console.log(current);
            for (let i = 0; i < els.length; i++) {
                els[i].style.display = "none";

            }
            current.style.display = "inherit";
        }, 400);
        window.location.hash = "#6";
    }
}