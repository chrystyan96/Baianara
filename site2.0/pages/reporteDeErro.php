<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reportar Erro | Baianará</title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.css" rel="stylesheet">

    </head>
    <body class="login">
        <div>

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

                        <form id="reporte" action="../regras/enviarErro.php" method="post">
                            <h1>Reportar Erro</h1>
                            <fieldset>
                                <input type="hidden" name="chave" class="form-control chave" value="<?php echo $chave; ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control email" placeholder="Email" name="email">
                                </div>
                                <div class="item form-group">
                                    <input id="senhaCad" type="password" name="recPass" placeholder="Senha" class="form-control senha">
                                </div>
                                <div class="item form-group">
                                    <input id="confirmSenhaCad" type="password" name="confRecPass" placeholder="Confirmar Senha" class="form-control">
                                </div>
                            </fieldset>
                            <div>
                                <button type="submit" name="salvarBTN" id="savePass" class="btn btn-default submit">Salvar Senha</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
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
               
            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="../assets/js/jquery.js"></script>
            <script src="http://malsup.github.com/jquery.form.js"></script> 
            <script type="text/javascript" charset="utf-8" src="js/geralSite.js"></script>
            <!-- FastClick -->
            <script src="../vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="../vendors/nprogress/nprogress.js"></script>
            <!-- jquery.validator -->
            <script src="../vendors/jquery.validator/dist/jquery.validate.js"></script>
            <script src="../vendors/jquery.validator/dist/additional-methods.js"></script>
            <script src="../vendors/jquery.validator/dist/localization/messages_pt_BR.js"></script>
            <!-- validator -->
   <!--     <script src="../vendors/validator/validator.js"></script> -->
            <!-- jquery.inputmask -->
            <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="js/novoCadastro.js"></script>
            <script type="text/javascript" charset="utf-8" src="js/cliente/recuperarSenha.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="../build/js/custom.js"></script>
        </div>
    </body>
</html>