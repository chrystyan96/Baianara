<?php

include '../../banco/siteDAO.php';

// Conexão com o banco de dados 
require '../../banco/conexao.php';

// Inicia sessões 
session_start();

$con = new conexao();

$id = $_POST["id"];
$qtd = $_POST["qtd"];
$descr = (string) $_POST["descricao"];
$nome = $_SESSION["login"]["nome"];

$abaras = $qtd;
$valor = 0;
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
    echo 'Digite a Quantidade!';
} else {
    if (!is_numeric($qtd))
        echo 'Digite a Quantidade em Numeros!';
    else if (empty($descr))
        echo 'Digite a Descrição!';
    else {
        $date = date('d/m/Y');
        $cli = new clienteDAO();
        $cli->inserirPedidos($con->connect(), $id, $qtd, $descr, $nome, $date, $valor);
        $cli->atualizarGratuidade($con->connect(), $id);
        echo 'Pedido cadastrado com sucesso!';
    }
}

?>
