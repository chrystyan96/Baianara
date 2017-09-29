$('.editar').on('click', function (e) {
    e.preventDefault();
    var pid = $(this).attr('data-id');
    var parent = $(this).closest("form");
    $.ajax({
        type: 'POST',
        url: 'cliente/editarPedidos.php?editar=' + pid,
        cache: false,
        success: function (result) {
            $(".editarDados").html(result);
        }
    })
            .fail(function () {
                bootbox.alert('Algo deu errado ...');
            })
})