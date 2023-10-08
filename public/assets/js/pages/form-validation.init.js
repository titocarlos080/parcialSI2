$(document).ready(function () {
    $(".parsley-examples").parsley();
}),
    $(function () {
        $("#demo-form")
            .parsley()
            .on("field:validated", function () {
                var e = 0 === $(".parsley-error").length;
                $(".alert-info").toggleClass("d-none", !e),
                    $(".alert-warning").toggleClass("d-none", e);
            })
            .on("form:submit", function () {
                return !1;
            });
    });
