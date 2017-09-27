$('.editarAviso').on('click', function (e) {
    e.preventDefault();
    var pid = $(this).attr('data-id');
    var parent = $(this).closest("form");
    $.ajax({
        type: 'POST',
        url: 'adm/editarAviso.php?editar=' + pid,
        cache: false,
        success: function (result) {
            $(".editarAvisos").html(result);
        }
    })
            .fail(function () {
                bootbox.alert('Algo deu errado ...');
            });
});

function addAviso() {
    var titulo = $('#addAviso .inserirAviso .insetAviso #titulo').val();
    var descricao = $('#addAviso .inserirAviso .insetAviso #aviso').val();
    var idCli = $('#addAviso .inserirAviso .insetAviso #idCliAviso').attr('data-id');
    $.ajax({
        url: '../regras/adm/regrasAddAvisos.php?titulo=' + titulo + '&descricao=' + descricao + '&idCli=' + idCli,
        success: function (resultado) {
            bootbox.alert(resultado, function () {
                if (resultado.match(/Aviso cadastrado com sucesso!/)) {
                    window.location.replace(location);
                }
            });
        }
    });
}

$('.apagarAviso').on('click', function (e) {
    e.preventDefault();
    var pid = $(this).attr('data-id');
    var parent = $(this).closest("form");
    bootbox.confirm({
        message: "Apagar aviso nº " + pid + "?",
        title: "<i class='glyphicon glyphicon-trash'></i> Apagar !",
        callback: function () {
            $.ajax({
                type: 'POST',
                url: '../regras/adm/regrasApagarAvisos.php?idAviso=' + pid,
                cache: false,
                success: function (resultado) {
                    bootbox.alert(resultado, function () {
                        if (resultado.match(/Aviso deletado com sucesso!/)) {
                            window.location.replace(location);
                        }
                    });
                }
            });
        }
    });
});
