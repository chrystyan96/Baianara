<?php

// Conexão com o banco de dados 
class admDAO {

    function verUltimosCadastrados($con) {
        $query = "SELECT nome, email, telefone FROM login ORDER BY id limit 5";
        $result = mysqli_query($con, $query);
        //echo $result; exit;
        return $result;
    }
    
    function addAviso($con, $titulo, $descricao, $dataControle, $data, $idCli) {
        $nome = '';
        $queryLogin = "SELECT * FROM login WHERE id='$idCli'";
        $resultLogin = mysqli_query($con, $queryLogin);
        while ($row = mysqli_fetch_assoc($resultLogin)){
            $nome = $row['nome'];
        }
        $query = "INSERT INTO avisos (nome, data, dataControle, titulo, aviso) VALUES ('$nome', '$data', '$dataControle', '$titulo', '$descricao') ";
        $result = mysqli_query($con, $query);
    }

    function totalCadastros($con) {
        $query = "SELECT * FROM login";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function avisos($con) {
        $query = "SELECT * FROM avisos";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function totalCadastrosGratuidade($con) {
        $query = "SELECT * FROM login WHERE gratuidade > 0";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function confirmarPagamento($con, $id, $flag) {
        $query = "UPDATE pedido SET pago='$flag' WHERE id='$id'";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function ultimosPedidosTodos($con) {
        $query = "SELECT * FROM pedido WHERE pago = 0";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function todosClientes($con) {
        $query = "SELECT * FROM login WHERE permicao = 'cliente'";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function todosPedidos($con) {
        $query = "SELECT * FROM pedido";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function checkoutGratuidade($con, $gratuidade, $id) {
        $query = "UPDATE login SET chkGratuidade='$gratuidade' WHERE id='$id'";
        $result = mysqli_query($con, $query);
        return $result;
    }
    
    function atualizarAvisos($con, $titulo, $descr, $id, $dataControle) {
        $query = "UPDATE avisos SET titulo='$titulo', aviso='$descr', dataControle='$dataControle' WHERE id='$id'";
        $result = mysqli_query($con, $query);
        return $result;
    }
    
    function deleteAviso($con, $id) {
        $query = "DELETE FROM avisos WHERE id='$id'";
        $result = mysqli_query($con, $query);
        return $result;
    }

}
