<?php
include '../../banco/conexao.php';
$con = new conexao();

include '../../banco/admDAO.php';
$adm = new admDAO();
include '../../banco/clienteDAO.php';
$cli = new clienteDAO();

$chkGratuidade = $_GET['chkout'];
$idCli = $_GET['idCli'];
$gratuidade = $_GET['gratuidade'];
$checkout = $_GET['checkout'];

$query = "UPDATE pedido SET chkGratuidade='$checkout' WHERE idCliente='$idCli'";
mysqli_query($con->connect(), $query);

if($checkout > $gratuidade){
    echo 'O valor do checkout é maior do que o valor de abarás gratis disponíveis para esse cliente!';
} else {
    $chkGratuidade += $checkout;
    $adm->checkoutGratuidade($con->connect(), $chkGratuidade, $idCli);
    $cli->atualizarGratuidade($con->connect(), $idCli);
    echo 'Checkout feito com sucesso!';
}


?>

