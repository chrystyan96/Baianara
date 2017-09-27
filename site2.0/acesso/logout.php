<?php
// inicia a sessão
session_start();

// muda o valor de logged_in para false
$_SESSION['login']['logged_in'] = false;
 
// finaliza a sessão
session_destroy();

// retorna para a index.php
header('Location: ../index.php');
?>
