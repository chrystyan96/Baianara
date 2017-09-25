<?php

include '../../banco/admDAO.php';

// Conexão com o banco de dados 
require '../../banco/conexao.php';

if (isset($_GET['idEditar']) && $_GET['idEditar'] != 0) {
    $con = new conexao();
    $titulo = $_GET["tituloEditar"];
    $id = $_GET["idEditar"];
    $descr = $_GET["descricaoEditar"];
    
    if (empty($titulo)) {
        echo "Digite o título!";
    } else {
        if (empty($descr))
            echo "Digite a Descrição!";
        else {
            date_default_timezone_set('America/Fortaleza');
            $dataControle = date('d/m/Y H:i:s');
            $admDAO = new admDAO();
            $admDAO->atualizarAvisos($con->connect(), $titulo, $descr, $id, $dataControle);
            echo 'Aviso editado com sucesso!';
        }
    }
    
}

?>

