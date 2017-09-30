$(document).ready(function () {
    $('#validarNovaConta').validate({       
        rules: {
            newLogin: {
                required: true,
                minlength: 5
            },
            newPass: {
                required: true,
                minlength: 8
            },
            confNewPass: {
                required: true,
                minlength: 8,
                password: true,
                equalTo: "#senhaCad"
            },
            newNome: {
                required: true,
                minlength: 5
            },
            newEmail: {
                required: true,
                email: true
            },
            newTelefone: {
                required: true
            }
        },
        messages: {
            newLogin: {
                required: "Por favor, informe seu nome de usuário",
                minlength: "O nome deve ter pelo menos 5 caracteres"
            },
            newPass: {
                required: "Por favor, informe sua senha",
                minlength: "O nome deve ter pelo menos 8 caracteres"
            },
            confNewPass: {
                required: "Por favor, confirme sua senha",
                minlength: "O nome deve ter pelo menos 8 caracteres",
                equalTo: "Entre com a mesma senha acima"
            },
            newNome: {
                required: "Por favor, informe seu nome",
                minlength: "O nome deve ter pelo menos 5 caracteres"
            },
            newEmail: {
                required: "Por favor, informe seu email"
            },
            newTelefone: {
                required: "Por favor, informe seu telefone (preferência: Whatsapp)"
            }
        },
        ignore: "",
        errorClass: 'fieldError',
        onblur: true,
        errorElement: 'label',
        submitHandler: function () {
            alert("alert");
        }
    });
    $.validator.addMethod("email", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
    }, "Por favor, entre com um endereço de email válido");

    $.validator.addMethod("password", function (value, element) {
        return this.optional(element) || /^[A-Za-z0-9!@#$%^&*()_]{8,16}$/i.test(value);
    }, "A senha deve ter entre 8 e 16 caracteres");

    $(document).on("click", "#saveCad", function () {
        $("#validarNovaConta").valid();
    });
});

$('saveCad').click(function () {
    NProgress.start();
    var login = $('#loginCad').val();
    var senha = $('#senhaCad').val();
    var confSenha = $('#confirmSenhaCad').val();
    var nome = $('#nomeCad').val();
    var email = $('#emailCad').val();
    var telefone = $('#telefone').val();

    var promise = $.ajax({
        url: "../regras/regrasNovoCadastro.php?login=" + login + '&senha=' + senha + '&confSenha=' + confSenha + '&nome=' + nome + '&email=' + email + '&telefone=' + telefone,
        cache: false
    });
    promise.done(function (resposta) {
        NProgress.done();
        if (result.match(/Cadastro concluído com sucesso!/)) {
            window.location.replace("#signin");
            $('#loginCad').val("");
            $('#senhaCad').val("");
            $('#confirmSenhaCad').val("");
            $('#nomeCad').val("");
            $('#emailCad').val("");
            $('#telefone').val("");
        } else if (result.match(/Login já cadastrado! Digite informações diferentes.../)) {
            $(".alert-warning a").after('<span><strong>Atenção!</strong> Login já cadastrado! Digite informações diferentes...</span>');
            $('.alert-warning').fadeIn('slow');
            window.location.replace("#signup");
        } else if (result.match(/Email já cadastrado! Digite informações diferentes.../)) {
            $(".alert-warning a").after('<span><strong>Atenção!</strong> Email já cadastrado! Digite informações diferentes...</span>');
            $('.alert-warning').fadeIn('slow');
            window.location.replace("#signup");
        }
    });
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
function closeAll() {
    closeWarning();
    closeSuccess();
    closeDanger();
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

