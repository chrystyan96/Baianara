<?php

include '../banco/clienteDAO.php';
include '../banco/conexao.php';
$con = new conexao();
$cli = new clienteDAO();

$login = $_GET['login'];
$senha = $_GET['senha'];
$nome = $_GET['nome'];
$email = $_GET['email'];
$telefone = $_GET['telefone'];

$options = [
    'cost' => 11,
    ];
$senhaHash = password_hash($senha, PASSWORD_DEFAULT, $options);

$query = "SELECT * FROM login WHERE login='$login'";
$result = mysqli_query($con->connect(), $query);
$numRows = mysqli_num_rows($result);

if($numRows > 0){
    echo 'Login já cadastrado! Digite informações diferentes...';
    exit;
}

$query2 = "SELECT * FROM login WHERE email='$email'";
$result2 = mysqli_query($con->connect(), $query2);
$numRows2 = mysqli_num_rows($result2);

if($numRows2 > 0){
    echo 'Email já cadastrado! Digite informações diferentes...';
    exit;
}
$cli->novoCadastro($con->connect(), $login, $senhaHash, $nome, $email, $telefone);
echo 'Cadastro concluído com sucesso!';
?>