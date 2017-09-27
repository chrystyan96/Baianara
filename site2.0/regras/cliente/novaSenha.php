<?php

include '../../banco/conexao.php';
$con = new conexao();

$senha = $_GET['senha'];
$email = $_GET['email'];
$chave = $_GET['chave'];

$email = preg_replace('/[^[:alnum:]_.-@]/', '', $email);
$chave = preg_replace('/[^[:alnum:]]/', '', $chave);

$query = "SELECT * FROM recuperarSenha WHERE email='$email'";
$result = mysqli_query($con->connect(), $query);
$row = mysqli_fetch_array($result);
$queryLogin = "SELECT * FROM login WHERE email='$email'";
$resultLogin = mysqli_query($con->connect(), $queryLogin);
$rowLogin = mysqli_fetch_array($resultLogin);
$chaveCorreta = '';

$options = [
    'cost' => 11,
    ];
$senhaHash = password_hash($senha, PASSWORD_DEFAULT, $options);

if ($row) {
    $chaveCorreta = md5($row['idUser'] . $rowLogin['senha']);
    if ($chave == $chaveCorreta) {
        $id = $row['idUser'];
        $querySenha = "UPDATE login SET senha='$senhaHash' WHERE id='$id'";
        $resultSenha = mysqli_query($con->connect(), $querySenha);
        $queryDelete = "DELETE FROM recuperarSenha WHERE email='$email' AND chave='$chave'";
        mysqli_query($con->connect(), $queryDelete);
        echo 'Senha alterada com sucesso! Retornando a tela de login em 5 segundos ou clique em OK para ir agora...';
    } else{
        echo 'Erro na alteração da senha...';
    }
}
?>

