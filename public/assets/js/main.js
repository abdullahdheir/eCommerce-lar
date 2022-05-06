$(function () {
    $(".MyAccount").click(function (e) {
        e.preventDefault();
    });
    $("#logout-a").click(function (e) {
        e.preventDefault();
        $("#logout").submit();
    });
    $(".sort-parent").click(function (e) {
        $(this).toggleClass("sortBy");
        let text = $(this).text();
        if ($(this).hasClass("sortBy")) {
            $(this).html(
                text +
                    "<i class='fa fa-angle-up sort-cross'aria-hidden='true'></i>"
            );
            sessionStorage.setItem("sort", text.trim());
            sessionStorage.setItem("cross", "up");
        } else {
            sessionStorage.removeItem("cross");
            sessionStorage.setItem("cross", "down");
            $(this).html(
                text +
                    "<i class='fa fa-angle-down sort-cross'aria-hidden='true'></i>"
            );
        }
    });
    $("#search-input").keyup(function () {
        setTimeout(() => {
            $(".list-search").each(function () {
                $(this).click(function () {
                    let value = $(this).text();
                    $("input[name=search]").val(value.trim());
                    $(".search-result").hide();
                    $("#form-search-top").submit();
                });
            });
        }, 500);
    });
});

let th = document.querySelectorAll(".sort-parent");

window.onbeforeunload = function () {
    sessionStorage.setItem("sort", "ID");
    sessionStorage.setItem("cross", "down");
};

setTimeout(() => {
    th.forEach(function (e) {
        let text = e.textContent;
        let vaule = sessionStorage.getItem("sort");
        let vaule2 = sessionStorage.getItem("cross");
        if (text.trim() == vaule.trim()) {
            e.innerHTML = `${text.trim()} <i class='fa fa-angle-${vaule2} sort-cross'aria-hidden='true'></i>`;
            e.firstElementChild.style = "opacity:1";
        }
    });
}, 100);

setInterval(() => {
    th.forEach(function (e) {
        let text = e.textContent;
        let vaule = sessionStorage.getItem("sort");
        let vaule2 = sessionStorage.getItem("cross");
        if (text.trim() == vaule.trim()) {
            if (vaule2 == "up") {
                $(e).addClass("sortBy");
            }
            e.innerHTML = `${text.trim()} <i class='fa fa-angle-${vaule2} sort-cross'aria-hidden='true'></i>`;
            e.firstElementChild.style = "opacity:1";
        }
    });
}, 10);
