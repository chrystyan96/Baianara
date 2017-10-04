<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Recuperar Senha | Baianará</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/normalize.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Baianará</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">

                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <header id="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Recuperar Senha</h1>
                    </div>
                </div>
            </div>
        </header>

        <?php
        error_reporting(E_ALL ^ E_WARNING);
        include '../banco/conexao.php';
        $con = new conexao();

        $email = $_GET['email'];
        $chave = "";
        if ($_GET['chave']) {
            $chave = preg_replace('/[^[:alnum:]]/', '', $_GET['chave']);
            $query = "SELECT * FROM recuperarSenha WHERE email='$email' AND chave='$chave'";
            $result = mysqli_query($con->connect(), $query);
            $numRows = mysqli_num_rows($result);
            if ($numRows > 0) {
                ?>

                <section id="main">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <fieldset>
                                    <input type="hidden" name="chave" class="form-control chave" value="<?php echo $chave; ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control email" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control senha" placeholder="Senha" name="senha">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control confSenha" placeholder="Confirmar Senha" name="senhaConf">
                                    </div>
                                    <button type="submit" class="btn btn-default btn-block salvarSenha">Salvar Senha</button>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            } else {
                echo '<h1>Página não encontrada!';
            };
            ?>
            <?php
        } else {
            echo '<h1>Página não encontrada!';
        }
        ?>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" charset="utf-8" src="../assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="../assets/js/jquery.js"></script>
        <script type="text/javascript" charset="utf-8" src="../assets/js/popper.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="../assets/js/bootbox.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="../pages/js/cliente/recuperarSenha.js"></script>
    </body>
</html>



