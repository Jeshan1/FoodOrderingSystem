

$(document).ready(function () {
    let path = window.location.pathname;
    console.log(path);
    let c = path.split("/");
    let length = c.length - 1;
    let cls = c[length];
    $(`#${cls}`).addClass("active");

    if (cls == "approvedvendors" || cls == "pendingvendors") {
        $("#vendors").addClass("menu-open");
    }
    if(cls == "pendingorder" || cls == "approvedorder") {
        $("#orders").addClass("menu-open");
    }
});