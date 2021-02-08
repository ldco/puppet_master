function getThisPageID(x) {
    let _id = x.id;
    let id = _id.split("#").pop();
    let name = x.querySelector("span").innerHTML;
    getContentView(id);
}