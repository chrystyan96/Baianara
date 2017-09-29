function checkoutFidelidade($id, $gratuidade, $chkout) {
    var idCli = $id;
    var gratuidade = $gratuidade;
    var chkout = $chkout;
    bootbox.prompt({
        size: "small",
        title: "Checkout - Abarás Gratis",
        buttons: {
            confirm: {
                label: "Salvar"
            }
        },
        callback: function (result) {
            $.ajax({
                type: 'POST',
                url: '../regras/adm/checkoutFidelidade.php?idCli=' + idCli + '&gratuidade=' + gratuidade + '&chkout=' + chkout + '&checkout=' + result,
            })
                    .done(function (response) {
                        bootbox.alert(response, function(){
                            window.location.replace(location);
                        });
                    })
                    .fail(function () {
                        bootbox.alert('Algo deu errado ...');
                    });
        }
    });
}