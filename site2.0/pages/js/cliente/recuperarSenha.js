$('#recCad').click(function () {
    NProgress.start();
    var email = $('#emailRec').val();

    var promise = $.ajax({
        url: '../regras/cliente/regrasRecuperarSenha.php?email=' + email,
    });
    promise.done(function (resposta) {
        NProgress.done();
        if (resposta.match(/Enviamos um link para a redefinição da senha para o endereço de e-mail informado!/)) {
            closeSuccess();
            $(".alert-success a").after('<span><strong>Sucesso!</strong> Enviamos um link para a redefinição da senha para o endereço de e-mail informado!</span>');
            $('.alert-success').fadeIn('slow');
            //$('#bsalertEnvio').show();
        } else if (resposta.match(/Não foi possível gerar o endereço único/)) {
            closeDanger();
            $(".alert-danger a").after('<span><strong>Erro!</strong> Não foi possível gerar o endereço único! Entre em contato com algum ADMINISTRADOR</span>');
            $('.alert-danger').fadeIn('slow');
        } else if (resposta.match(/Esse utilizador não existe/)) {
            closeDanger();
            $(".alert-danger a").after('<span><strong>Erro!</strong> Não foi possível achar o usuário! Entre em contato com algum ADMINISTRADOR.</span>');
            $('.alert-danger').fadeIn('slow');
        } else if (resposta.match(/vazio/)) {
            $(".alert-warning").hide();
        }
    });
});

$('.salvarSenha').click(function () {
    NProgress.start();
    var senha = $('.senha').val();
    var confSenha = $('.confSenha').val();
    var email = $('.email').val();
    var chave = $('.chave').val();

    if (senha.length < 8) {
        closeWarning();
        NProgress.done();
        $(".alert-warning a").after('<span><strong>Atenção!</strong> O campo Senha deve ter no minímo 8 dígitos!</span>');
        $('.alert-warning').fadeIn('slow');
        return false;
    } else {
        NProgress.inc();
    }
    if (confSenha.length < 8) {
        closeWarning();
        NProgress.done();
        $(".alert-warning a").after('<span><strong>Atenção!</strong> O campo Confirmar Senha deve ter no minímo 8 dígitos!</span>');
        $('.alert-warning').fadeIn('slow');
        return false;
    } else {
        NProgress.inc();
    }

    if (senha != confSenha) {
        closeWarning();
        NProgress.done();
        $(".alert-warning a").after('<span><strong>Atenção!</strong> Senhas diferentes! Escreva senhas iguais nos campos Senha e Confirmar Senha!</span>');
        $('.alert-warning').fadeIn('slow');
        return false;
    } else {
        NProgress.inc();
        var promise = $.ajax({
            url: "../regras/cliente/novaSenha.php?senha=" + senha + "&email=" + email + "&chave=" + chave,
        });
        promise.done(function (resposta) {
            NProgress.done();
            if (resposta.match(/Senha alterada com sucesso! Retornando a tela de login em 5 segundos.../)) {
                closeSuccess();
                $(".alert-success a").after('<span><strong>Sucesso!</strong> Senha alterada com sucesso! Retornando a tela de login em 5 segundos...</span>');
                $('.alert-success').fadeIn('slow');
                setTimeout(function () {
                    window.location.replace("login.php");
                }, 5000);
            }
            if (resposta.match(/Erro na alteração da senha.../)) {
                closeDanger();
                $(".alert-danger a").after('<span><strong>Erro!</strong> Não foi possível alterar a senha! Entre em contato com algum ADMINISTRADOR.</span>');
                $('.alert-danger').fadeIn('slow');
            }
        });
    }
});

function closeSuccess() {
    $(".alert-success span").remove();
    $(".alert-success").hide();
}
function closeDanger() {
    $(".alert-danger span").remove();
    $(".alert-danger").hide();
}
function closeWarning() {
    $(".alert-warning span").remove();
    $(".alert-warning").hide();
}

$(document).ready(function () {
    $(".alert-success .close").click(function () {
        closeSuccess();
    });
    $(".alert-danger .close").click(function () {
        closeDanger();
    });
    $(".alert-warning .close").click(function () {
        closeWarning();
    });
});