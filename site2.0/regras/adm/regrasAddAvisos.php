<?php
include '../../banco/conexao.php';
$con = new conexao();

include '../../banco/admDAO.php';
$admDAO = new admDAO();

$titulo = $_GET['titulo'];
$descricao = $_GET['descricao'];
$idCli = $_GET['idCli'];

if(empty($titulo)){
    echo 'Digite um título!';
} else {
    if(empty($descricao)){
        echo 'Digite uma descrição!';
    } else {
        date_default_timezone_set('America/Fortaleza');
        $data = date('d/m/Y');
        $dataControle = date('d/m/Y H:i:s');
        $admDAO->addAviso($con->connect(), $titulo, $descricao, $data, $dataControle, $idCli);
        echo 'Aviso cadastrado com sucesso!';
    }
}