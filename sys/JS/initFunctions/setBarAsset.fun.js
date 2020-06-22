function setBarAsset() {
    let el = document.querySelectorAll(".pm_bar_asset ");
    el.forEach((element) => {
        element.addEventListener("click", () => {
            barAssetFun();
        });
    });

    const barAssetFun = () => {
        window.location.href = "admin/index.php";
    };
}