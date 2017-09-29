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

$query = "SELECT * FROM login WHERE login='$login' OR email='$email'";
$result = mysqli_query($con->connect(), $query);
$numRows = mysqli_num_rows($result);

if($numRows > 0){
    echo 'Login e/ou Email já cadastrados! Digite informações diferentes...';
    exit;
}
$cli->novoCadastro($con->connect(), $login, $senhaHash, $nome, $email, $telefone);
echo 'Cadastro concluído com sucesso!';
?>

