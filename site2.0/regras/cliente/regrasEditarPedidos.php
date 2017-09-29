<?php

include '../../banco/clienteDAO.php';

// Conexão com o banco de dados 
require '../../banco/conexao.php';

if (isset($_GET['idEditar']) && $_GET['idEditar'] != 0) {
    $con = new conexao();
    $qtd = $_GET["qtdEditar"];
    $id = $_GET["idEditar"];
    $idCli = $_GET["idCli"];
    $descr = $_GET["descricaoEditar"];
    $valor = 0;
    $abaras = $qtd;
    while ($abaras > 0) {
        if ($abaras == 1) {
            $valor += 3;
            $abaras--;
        } else if ($abaras >= 2) {
            $valor += 5;
            $abaras -= 2;
        }
    }

    if (empty($qtd)) {
        phpAlert("Digite a Quantidade!");
    } else {
        if (!is_numeric($qtd))
            phpAlert("Digite a Quantidade em Numeros!");
        else if (empty($descr))
            phpAlert("Digite a Descrição!");
        else {
            $date = date('d/m/Y');
            $cliDAO = new clienteDAO();
            $cliDAO->atualizarPedidos($con->connect(), $qtd, $descr, $id, $date, $valor);
            $cliDAO->atualizarGratuidade($con->connect(), $idCli);
        }
    }
    
}

function phpAlert($msg) {
    echo ("<script>alert('$msg');</script>");
}


?>

