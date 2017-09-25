<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

class conexao {

    public function connect() {

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "baianara";

        $con = mysqli_connect($host, $user, $password, $database);

        if (mysqli_errno($con)) {
            echo "Erro na conexão";
        }
        return $con;
    }

}
function isLoggedIn() {
    if (!isset($_SESSION['login']['logged_in']) || $_SESSION['login']['logged_in'] !== true) {
        return false;
    }
    return true;
}
?>

