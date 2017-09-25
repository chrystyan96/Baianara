$(function ($) {
    $("#pedidoNew").submit(function () {
        var qtd = $("#qtd").val();
        var descricao = $("#descricao").val();
        var id = $(".instBD .insetBD #insertBD").attr('data-id');
        $('#pedidoNew').modal('hide');
        
        $.post("../regras/cliente/regrasInsersaoPedidos.php", {qtd: qtd, descricao: descricao, id: id}, function (resposta) {
            bootbox.alert(resposta, function () {
                if (resposta.match(/Pedido cadastrado com sucesso!/)) {
                    window.location.replace(location);
                }
            }
            );
        });
    });
});

$(document).ready(function () {

    $('.apagar').click(function (e) {

        e.preventDefault();

        var pid = $(this).attr('data-id');
        var idCli = $('.editped #listarPedidos #buscas .apagar').attr('data-cli');
        var parent = $(this).closest("form");
        ;

        bootbox.dialog({
            message: "Apagar pedido nº " + pid + "?",
            title: "<i class='glyphicon glyphicon-trash'></i> Apagar !",
            buttons: {
                success: {
                    label: "Não",
                    className: "btn-primary",
                    callback: function () {
                        $('.bootbox').modal('hide');
                    }
                },
                danger: {
                    label: "Apagar!",
                    className: "btn-danger",
                    callback: function () {
                        $.ajax({
                            type: 'POST',
                            url: '../regras/cliente/regrasApagarPedidos.php',
                            data: 'delete=' + pid + '&idCli=' + idCli
                        })
                                .done(function (response) {
                                    bootbox.alert(response, function () {
                                        window.location.replace(location);
                                    });
                                    parent.fadeOut('slow');
                                })
                                .fail(function () {
                                    bootbox.alert('Algo deu errado ...');
                                })
                    }
                }
            }
        });
    });
});

$('.detalhes').click(function () {
    var id = $(this).attr('data-id');
    $.ajax({url: "../regras/cliente/regrasDetalhesPedidos.php?id=" + id,
        cache: false,
        success: function (result) {
            $(".opcoes").html(result);
        }
    });
});

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