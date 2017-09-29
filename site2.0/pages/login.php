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
                        <form>
                            <h1>Criar conta</h1>
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome de Usuário" id="#loginCad" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha" id="#senhaCad" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirmar Senha" id="#confirmSenhaCad" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nome" id="#nomeCad" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" id="#emailCad" required>
                                </div>
                                <div class="form-group">
                                    <input type="phone" class="form-control" placeholder="Telefone" id="#telefone" required>
                                </div>
                            </fieldset>
                            <div>
                                <button class="btn btn-default submit" href="#signin" id="#saveCad">Enviar</button>
                            </div>
                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Já é um membro ?
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
                
                <div id="forgotPass" class="animate form forgot_form">
                    <section class="login_content">
                        <form>
                            <h1>Recuperar Senha</h1>
                            <fieldset>
                                <div class="form-group">
                                    <input type="email" class="form-control" required placeholder="Email" id="emailRec">
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <button type="submit" href="#signin" class="btn btn-default submit" id='recCad'>Recuperar</>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">ou então: 
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
            <!-- validator -->
            <script src="../vendors/validator/validator.js"></script>
            <script type="text/javascript" charset="utf-8" src="js/novoCadastro.js"></script>
            <script type="text/javascript" charset="utf-8" src="js/cliente/recuperarSenha.js"></script>
        </div>
    </body>
</html>