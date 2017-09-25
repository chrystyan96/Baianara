<?php

require_once '../banco/conexao.php';
if (!isLoggedIn()){
    header('Location: ../index.php');
}

?>

