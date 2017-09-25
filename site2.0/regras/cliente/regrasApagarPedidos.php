<?php

include '../../banco/conexao.php';
include '../../banco/siteDAO.php';
$con = new conexao();
$siteDAO = new siteDAO();
if ($_REQUEST['delete']) {
    $idCli = $_REQUEST['idCli'];
    $pid = $_REQUEST['delete'];
    $fidelidade = 0;
    $abaras = 0;
    $chkout = 0;
    $queryPdido = "SELECT * FROM pedido WHERE id='$pid'";
    $result2 = mysqli_query($con->connect(), $queryPdido);
    while ($dados2 = mysqli_fetch_assoc($result2)) {
        $fidelidade = $dados2['quantidade'];
        $checkout = $dados2['chkGratuidade'];
    }

    $queryLogin = "SELECT * FROM login WHERE id='$idCli'";
    $result = mysqli_query($con->connect(), $queryLogin);
    while ($dados = mysqli_fetch_assoc($result)) {
        $chkout = $dados['chkGratuidade'];
        $gratuidade = $dados2['gratuidade'];
    }
    while ($fidelidade >= 10) {
        $abaras++;
        $fidelidade -= 10;
    }
    if ($chkout > $abaras) {
        $chkout -= $abaras;
    } else {
        $chkout -= $checkout;
    }


    $query = "DELETE FROM pedido WHERE id= '$pid'";
    mysqli_query($con->connect(), $query);
    $query2 = "UPDATE login SET chkGratuidade='$chkout' WHERE id='$idCli'";
    mysqli_query($con->connect(), $query2);

    $queryPdido2 = "SELECT * FROM pedido WHERE idCliente='$idCli'";
    $result3 = mysqli_query($con->connect(), $queryPdido2);
    while ($dados2 = mysqli_fetch_assoc($result3)) {
        $fidelidade += $dados2['quantidade'];
        $checkout += $dados2['chkGratuidade'];
    }

    if ($checkout <= 0) {
        $query3 = "UPDATE login SET chkGratuidade=0 WHERE id='$idCli'";
        mysqli_query($con->connect(), $query2);
    }

    if ($result) {
        echo "Pedido apagado com sucesso ...";
    }
    $siteDAO->atualizarGratuidade($idCli);
}


