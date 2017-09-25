$('.detalhes').click(function () {
    var id = $(this).attr('data-id');
    $.ajax({url: "../regras/adm/regrasDetalhesPedidos.php?id=" + id,
        cache: false,
        success: function (result) {
            $(".opcoes").html(result);
        }
    });
});