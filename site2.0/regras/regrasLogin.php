<?php

// Conexão com o banco de dados 
require_once '../banco/conexao.php';

// Inicia sessões 
if (session_id() == '') {
    session_start();
}
// Recupera o login     
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST["senha"]) ? $_POST["senha"] : FALSE;

// Usuário não forneceu a senha ou o login 
if (!$login || !$senha) {
    phpAlertLogin("Digite o Login e a Senha!");
    exit;
}
$options = [
    'cost' => 11,
    ];
$senhaHash = password_hash($senha, PASSWORD_DEFAULT, $options);
$_SESSION['login'] = [];

/**
 * Executa a consulta no banco de dados. 
 * Caso o número de linhas retornadas seja 1 o login é válido, 
 * caso 0, inválido. 
 */
$con = new conexao();
$query = "SELECT * FROM login WHERE login = '$login'";
$result_id = mysqli_query($con->connect(), $query);
$total = mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
if ($total) {
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
    $dados = @mysqli_fetch_array($result_id);

    // Agora verifica a senha 
    if (password_verify($senha, $dados['senha'])) {
        date_default_timezone_set('America/Fortaleza');
        $data = date("d/m/Y H:i:s");
        $queryLogin = "UPDATE login SET lastLogin='$data' WHERE login = '$login'";
        mysqli_query($con->connect(), $queryLogin);
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
        $_SESSION['lang'] = 'pt_br';
        $_SESSION['login']['logged_in'] = true;
        $_SESSION['login']["id"] = $dados["id"];
        $_SESSION['login']["nome"] = $dados["nome"];
        $_SESSION['login']["login"] = $dados["login"];
        $_SESSION['login']["senha"] = $dados["senha"];
        $_SESSION['login']["permicao"] = $dados["permicao"];
        if ($_SESSION['login']["permicao"] == "1") {
            header("Location: ../pages/adm.php");
            exit;
        } else {
            header("Location: ../pages/cliente.php");
            exit;
        }
    } else {
        //Senha inválida
        phpAlertLogin("Senha inválida!");
        exit;
    }
} else {
    phpAlertLogin("Login inexistente!");
    exit;
}

function phpAlertLogin($msg) {
    echo ("<script>alert('$msg'); location.href='../pages/login.php';</script>");
}

?>