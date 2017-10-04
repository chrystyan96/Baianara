<?php

include '../../banco/conexao.php';
$con = new conexao();

include '../../banco/siteDAO.php';
$siteDAO = new siteDAO();

$id = $_GET['id'];
$flag = $_GET['flag'];
echo $id;
$siteDAO->confirmarPagamento($id, $flag);
?>

