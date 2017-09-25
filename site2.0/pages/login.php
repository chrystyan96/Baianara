<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once '../banco/conexao.php';
if (isLoggedIn()):
    if ($_SESSION['login']['permicao'] === "1"):
        header("location: adm.php");
    else:
        header("location: cliente.php");
    endif;
else:
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Baianará | Login</title>

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

                <div class="login_wrapper">
                    <div class="animate form login_form">
                        <section class="login_content">
                            <form id="login" action="../regras/regrasLogin.php" method="post">
                                <h1>Login</h1>
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nome de Usuário" name="login">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Senha" name="senha">
                                    </div>
                                </fieldset>
                                <div>
                                    <button type="submit" name="loginBTN" class="btn btn-default submit">Login</button>
                                    <a class="reset_pass" href="#">Esqueçeu sua senha?</a>
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
                                <div>
                                    <input type="text" class="form-control" placeholder="Username" required="" />
                                </div>
                                <div>
                                    <input type="email" class="form-control" placeholder="Email" required="" />
                                </div>
                                <div>
                                    <input type="password" class="form-control" placeholder="Password" required="" />
                                </div>
                                <div>
                                    <a class="btn btn-default submit" href="index.html">Enviar</a>
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
            </div>
        </div>
    </body>
</html>