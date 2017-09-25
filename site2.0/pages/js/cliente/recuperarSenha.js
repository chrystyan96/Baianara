$('#recCad').click(function () {
    var email = $('#recuperarSenha .recCad #cad #emailRec').val();
    if (email == '') {
        bootbox.alert("Digite um email!");
        return false;
    }
    $.ajax({
        url: '../regras/cliente/regrasRecuperarSenha.php?email=' + email,
        success: function (resposta) {
            bootbox.alert(resposta, function () {
                if (resposta.match(/Enviamos um link para a redefinição da senha para o endereço de e-mail informado!/)) {
                    $('#recuperarSenha .recCad #cad #emailRec').val("");
                    $("#recuperarSenha").modal('hide');
                }
            });
        }
    });
});

$('.salvarSenha').click(function () {
    var senha = $('.senha').val();
    var confSenha = $('.confSenha').val();
    var email = $('.email').val();
    var chave = $('.chave').val();

    if (senha.length < 8) {
        bootbox.alert("O campo Senha deve ter no minímo 8 dígitos!");
        return false;
    } else if (confSenha.length < 8) {
        bootbox.alert("O campo Confirmar Senha deve ter no minímo 8 dígitos!");
        return false;
    } else if (senha != confSenha) {
        bootbox.alert("Senhas diferentes! Escreva senhas iguais nos campos Senha e Confirmar Senha");
        return false;
    } else {
        $.ajax({
            url: "../regras/cliente/novaSenha.php?senha=" + senha + "&email=" + email + "&chave=" + chave,
            success: function (resposta) {
                if (resposta.match(/Senha alterada com sucesso! Retornando a tela de login em 5 segundos ou clique em OK para ir agora.../)) {
                    bootbox.alert(resposta, function () {
                        window.location.replace("../index.php");
                    });
                    setTimeout(function () {
                        window.location.replace("../index.php");
                    }, 5000);
                }
            }
        });
    }
});
