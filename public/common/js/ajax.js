function cargadivconsulta(id, url, data) {
    $("#" + id).show();
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (html) {
            if (html == 'true') {
                $("#" + id).html(html);
            } else {
                $("#" + id).html(html);
            }
        },
        beforeSend: function () {
            $("#" + id).html("<p><div class='text-center'><img src='http://localhost/citasapp/public/common/img/ajax-loader.gif'></p>");
        },
        timeout: 10000,
    });
}

