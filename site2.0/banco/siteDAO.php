<?php
include 'admDAO.php';
include 'clienteDAO.php';

class siteDAO{
    function ultimosCadastros(){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->verUltimosCadastrados($con->connect());
    }
    
    function avisos(){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->avisos($con->connect());
    }
    
    function addAviso(){
        $con = new conexao($titulo, $descricao, $data, $idCli);
        $adm = new admDAO();
        $adm->addAviso($con->connect(), $titulo, $descricao, $data, $idCli);
    }
    
    function totalCadastros(){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->totalCadastros($con->connect());
    }
    
    function confirmarPagamento($id, $flag){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->confirmarPagamento($con->connect(), $id, $flag);
    }
    
    function ultimosPedidosCliente($nome){
        $con = new conexao();
        $cli = new clienteDAO();
        return $cli->ultimosPedidosCliente($con->connect(), $nome);
    }
    
    function atualizarGratuidade($id){
        $con = new conexao();
        $cli = new clienteDAO();
        return $cli->atualizarGratuidade($con->connect(), $id);
    }
    
    function ultimosPedidosTodos(){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->ultimosPedidosTodos($con->connect());
    }
    
    function todosClientes(){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->todosClientes($con->connect());
    }
    
    function totalCadastrosGratuidade(){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->totalCadastrosGratuidade($con->connect());
    }
    
    function todosPedidos(){
        $con = new conexao();
        $adm = new admDAO();
        return $adm->todosPedidos($con->connect());
    }
}

?>