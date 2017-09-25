$('.editCadastro').click(function () {
    var id = $('.painelCliente .cliPainel .editCadastro').attr('data-id');
    $.ajax({url: "../regras/cliente/editarCadastro.php?id=" + id,
        cache: false,
        success: function (result) {
            $(".editarCadastro").html(result);
        }
    });
});