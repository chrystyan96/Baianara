$('#saveCad').click(function () {
    var login = $('#loginCad').val();
    var senha = $('#senhaCad').val();
    var confSenha = $('#confirmSenhaCad').val();
    var nome = $('#nomeCad').val();
    var email = $('#emailCad').val();
    var telefone = $('#telefone').val();

    if (senha.length < 8) {
        bootbox.alert("O campo Senha deve ter no minímo 8 dígitos!");
        return false;
    } else if (confSenha.length < 8) {
        bootbox.alert("O campo Confirmar Senha deve ter no minímo 8 dígitos!");
        return false;
    } else if (senha != confSenha) {
        bootbox.alert("Senhas diferentes! Escreva senhas iguais nos campos Senha e Confirmar Senha");
        return false;
    } else if (nome === '') {
        bootbox.alert("O campo Nome é obrigatório!");
        return false;
    } else if (email === '') {
        bootbox.alert("O campo Email é obrigatório!");
        return false;
    } else if (telefone === '') {
        bootbox.alert("O campo Telefone é obrigatório!");
        return false;
    } else if (telefone.length < 14) {
        bootbox.alert("O Telefone é muito curto!");
        return false;
    } else {
        $.ajax({url: "../regras/regrasNovoCadastro.php?login=" + login + '&senha=' + senha + '&confSenha=' + confSenha + '&nome=' + nome + '&email=' + email + '&telefone=' + telefone,
            cache: false,
            success: function (result) {
                bootbox.alert(result, function () {
                    if (result.match(/Cadastro concluído com sucesso!/)) {
                        $('#novoCadastro').modal('hide');
                        $('#novoCadastro .newCad #Cad #loginCad').val("");
                        $('#novoCadastro .newCad #Cad #senhaCad').val("");
                        $('#novoCadastro .newCad #Cad #confirmSenhaCad').val("");
                        $('#novoCadastro .newCad #Cad #nomeCad').val("");
                        $('#novoCadastro .newCad #Cad #emailCad').val("");
                        $('#novoCadastro .newCad #Cad #telefone').val("");
                    }
                });
            }
        });
    }
});

