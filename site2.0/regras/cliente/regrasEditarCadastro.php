<?php

include_once '../../banco/clienteDAO.php';
include_once '../../banco/conexao.php';
$con = new conexao();
$cli = new clienteDAO();

$id = $_GET['id'];
$login = $_GET['login'];
$senha = $_GET['senha'];
$nome = $_GET['nome'];
$email = $_GET['email'];
$telefone = $_GET['telefone'];

$options = [
    'cost' => 11,
];
$senhaHash = password_hash($senha, PASSWORD_DEFAULT, $options);


if (empty($senha)) {
    $cli->atualizarSemSenha($con->connect(), $id, $login, $nome, $email, $telefone);
} else {
    $cli->atualizarComSenha($con->connect(), $id, $login, $senhaHash, $nome, $email, $telefone);
}
?>
