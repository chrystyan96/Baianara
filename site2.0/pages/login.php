<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once '../banco/conexao.php';
if (isLoggedIn()) :
    if ($_SESSION['login']['permicao'] === "1") :
        header("location: adm.php");
    else :
        header("location: cliente.php");
    endif;
else :
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Login | Baianará</title>

            <!-- Bootstrap -->
            <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!-- NProgress -->
            <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
            <!-- Animate.css -->
            <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

            <!-- Custom Theme Style -->
            <link href="../build/css/custom.min.css" rel="stylesheet">
        </head>

        <body class="login">
            <div>
                <a class="hiddenanchor" id="signup"></a>
                <a class="hiddenanchor" id="signin"></a>
                <a class="hiddenanchor" id="forgotPass"></a>

                <div class="alert alert-success" style="display: none;">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                <div class="alert alert-danger" style="display: none;">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                <div class="alert alert-warning" style="display: none;">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>

                <div class="login_wrapper">
                    <div class="animate form login_form">
                        <section class="login_content">
                            <form id="login" action="../regras/regrasLogin.php" method="post">
                                <h1>Login</h1>
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Nome de Usuário" name="login">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" required="required" placeholder="Senha" name="senha">
                                    </div>
                                </fieldset>
                                <div>
                                    <button type="submit" name="loginBTN" class="btn btn-default submit">Login</button>
                                    <a class="reset_pass" href="#forgotPass">Esqueçeu sua senha?</a>
                                </div>

                                <div class="clearfix"></div>

                                <div class="separator">
                                    <p class="change_link">Novo no site?
                                        <a href="#signup" class="to_register"> Criar conta </a>
                                    </p>

                                    <div class="clearfix"></div>
                                    <br />
                                <?php endif; ?>
                                <div>
                                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

                <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <form role="form" class="parsley-validate" data-validate="parsley">
                            <h1>Criar conta</h1>

                            <div class="item form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nome de Usuário" id="loginCad" autocomplete="off" data-parsley-required>
                            </div>
                            <div class="item form-group">
                                <input type="password" name="password" data-parsley-equalto="#confirmSenhaCad" class="form-control" placeholder="Senha" id="senhaCad" data-parsley-required minlength="8">
                            </div>
                            <div class="item form-group">
                                <input type="password" name="password2" data-parsley-equalto="#senhaCad" class="form-control" placeholder="Confirmar Senha" id="confirmSenhaCad" data-parsley-required>
                            </div>
                            <div class="item form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nome" id="nomeCad" data-parsley-required minlength="5">
                            </div>
                            <div class="item form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" id="emailCad" data-parsley-required data-parsley-type="email" data-parsley-trigger="change" autocomplete="off">
                            </div>
                            <div class="item form-group">
                                <input type="text" name="phone" class="form-control" placeholder="(__) _____-____" id="telefone" data-parsley-required data-inputmask="'mask' : '(99) 99999-9999'" autocomplete="off">
                            </div>
                            <div>
                                <a class="btn btn-default submit" id="saveCad">Enviar</a>
                            </div>
                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Já é um membro ?
                                    <a href="#" class="to_register"> Entrar </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

                <div id="forgotPass" class="animate form forgot_form">
                    <section class="login_content">
                        <form role="form" data-toggle="validator">
                            <h1>Recuperar Senha</h1>
                            <fieldset>
                                <div class="form-group">
                                    <input type="email" class="form-control" required placeholder="Email" id="emailRec">
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <a type="submit" href="#signin" class="btn btn-default submit" id='recCad'> Recuperar </a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Ou então: 
                                    <a href="#signin" class="to_register"> Entrar </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <script type="text/javascript" charset="utf-8" src="../assets/js/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="../assets/js/jquery.js"></script>
            <script type="text/javascript" charset="utf-8" src="js/geralSite.js"></script>
            <!-- FastClick -->
            <script src="../vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="../vendors/nprogress/nprogress.js"></script>
            <!-- jquery.validator -->
<!--        <script src="../vendors/jquery.validator/dist/jquery.validate.js"></script>
            <script src="../vendors/jquery.validator/dist/additional-methods.js"></script>
            <script src="../vendors/jquery.validator/dist/localization/messages_pt_BR.js"></script>-->
            <!-- Parsley -->
            <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
            <!-- jquery.inputmask -->
            <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="js/novoCadastro.js"></script>
            <script type="text/javascript" charset="utf-8" src="js/cliente/recuperarSenha.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="../build/js/custom.min.js"></script>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(function () {
        $('.parsley-validate').parsley();
    })
</script>


<!--<script type="text/javascript">
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
                minlength: 8
            },
            newNome: {
                required: true,
                minlength: 5
            },
            newEmail: {
                required: true
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
                minlength: "O nome deve ter pelo menos 8 caracteres"
            },
            newNome: {
                required: "Por favor, informe seu nome",
                minlength: "O nome deve ter pelo menos 5 caracteres"
            },
            newEmail: {
                required: "Por favor, informe seu email"
            },
            newTelefone: {
                required: "Por favor, informe seu telefone"
            }
        },
        ignore: "",
        errorClass: 'fieldError',
        onkeyup: false,
        onblur: false,
        errorElement: 'label',
        submitHandler: function () {
            alert("alert");
        }
    });
});
</script>

<script type="text/javascript">
$(document).on("click", "#saveCad", function () {
$("#validarNovaConta").valid();
});
</script>-->