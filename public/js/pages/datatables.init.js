$(document).ready(function () {
    $("#datatable").DataTable(),
        $("#datatableCustom")
            .DataTable({
                lengthChange: !1,
                buttons: ["copy", "excel", "pdf", "colvis"],
                paging: false,
            })
            .buttons()
            .container()
            .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
});
