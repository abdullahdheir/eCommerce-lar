$(function () {
    $(".MyAccount").click(function (e) {
        e.preventDefault();
    });
    $("#logout-a").click(function (e) {
        e.preventDefault();
        $("#logout").submit();
    });
});
