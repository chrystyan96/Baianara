<?php

include '../../banco/conexao.php';
$con = new conexao();

include '../../banco/admDAO.php';
$admDAO = new admDAO();

$id = $_GET['idAviso'];

if (!empty($id)) {
    $admDAO->deleteAviso($con->connect(), $id);
    echo 'Aviso deletado com sucesso!';
}