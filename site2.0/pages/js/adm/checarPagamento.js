function checarPagamento($id, $flag) {
    var flag = $flag;
    var pid = $id;
    if (flag == 0) {
        flag = 1;
        bootbox.confirm('Deseja confirmar o pagamento do pedido nº' + pid + '?', function (result) {
            if (result) {
                $.ajax({
                    method: 'GET',
                    url: '../regras/adm/regrasPagamento.php?id=' + pid + '&flag=' + flag,
                    success: function (result) {
                        bootbox.alert({
                            title: "Confirmação",
                            message: "Pagamento confirmado com sucesso!",
                            callback: function (e) {
                                window.location.replace(location);
                            },
                        });
                    }
                })
            }
        });

    } else {
        flag = 0;
        bootbox.confirm('Deseja desfazer a confirmação do pagamento do pedido nº' + pid + '?', function (result) {
            if (result) {
                $.ajax({
                    method: 'GET',
                    url: '../regras/adm/regrasPagamento.php?id=' + pid + '&flag=' + flag,
                    success: function (result) {
                        bootbox.alert({
                            title: "Confirmação",
                            message: "Desconfirmação feita com sucesso!",
                            callback: function (e) {
                                window.location.replace(location);
                            },
                        });
                    }
                })
            }
        });
    }
}