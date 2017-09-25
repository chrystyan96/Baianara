<?php

class clienteDAO {

    function ultimosPedidosCliente($con, $nome) {
        $query = "SELECT * FROM pedido WHERE pago = 0 AND nome = '$nome'";
        $result = mysqli_query($con, $query);
        return $result;
    }

    function inserirPedidos($con, $id, $qtd, $descr, $nome, $date, $valor) {
        $nomeCli = '';
        $emailCli = '';
        $telefoneCli = '';

        $queryCli = "SELECT * FROM login WHERE nome = '$nome'";
        $result = mysqli_query($con, $queryCli);
        while ($dados = mysqli_fetch_assoc($result)) {
            $nomeCli = $dados["nome"];
            $emailCli = $dados["email"];
            $telefoneCli = $dados["telefone"];
        }

        $query = "INSERT INTO pedido (idCliente, nome, email, telefone, data, quantidade, descricao, preco) VALUES ('$id', '$nomeCli', '$emailCli', '$telefoneCli', '$date', '$qtd', '$descr', '$valor')";
        $result = mysqli_query($con, $query);
    }

    function atualizarGratuidade($con, $id) {
        $fidelidade = 0;
        $novaFidelidade = 0;
        $abaras = 0;
        $queryPdido = "SELECT * FROM pedido WHERE idCliente='$id'";
        $result2 = mysqli_query($con, $queryPdido);
        while ($dados2 = mysqli_fetch_assoc($result2)) {
            $fidelidade += $dados2['quantidade'];
        }

        $queryLogin = "SELECT * FROM login WHERE id='$id'";
        $result = mysqli_query($con, $queryLogin);
        while ($dados = mysqli_fetch_assoc($result)) {
            $chkout = $dados['chkGratuidade'];
        }
        while ($fidelidade >= 10) {
            $abaras++;
            $fidelidade -= 10;
        }
        if ($fidelidade < 10) {
            $novaFidelidade = $fidelidade;
        }
    
        if ($chkout > 0) {
            $abaras -= $chkout;
        }
        $query2 = "UPDATE login SET fidelidade='$novaFidelidade', gratuidade='$abaras' WHERE id = '$id'";
        $result2 = mysqli_query($con, $query2);
    }

    function atualizarPedidos($con, $qtd, $descr, $id, $date, $valor) {
        $query = "UPDATE pedido SET dataUpdate='$date', quantidade='$qtd', descricao='$descr', preco='$valor' WHERE id='$id'";
        $result = mysqli_query($con, $query);
    }

    function atualizarSemSenha($con, $id, $login, $nome, $email, $telefone) {
        $query = "UPDATE login SET login='$login', nome='$nome', email='$email', telefone='$telefone' WHERE id='$id'";
        $result = mysqli_query($con, $query);

        $query2 = "UPDATE pedido SET nome='$nome', email='$email', telefone='$telefone' WHERE idCliente='$id'";
        $result2 = mysqli_query($con, $query2);
    }

    function atualizarComSenha($con, $id, $login, $senha, $nome, $email, $telefone) {
        $query = "UPDATE login SET login='$login', nome='$nome', senha='$senha', email='$email', telefone='$telefone' WHERE id='$id'";
        $result = mysqli_query($con, $query);

        $query2 = "UPDATE pedido SET nome='$nome', email='$email', telefone='$telefone' WHERE idCliente='$id'";
        $result2 = mysqli_query($con, $query2);
    }
    
    function novoCadastro($con, $login, $senha, $nome, $email, $telefone) {
        $query = "INSERT INTO login(login, senha, nome, email, telefone) VALUES('$login', '$senha', '$nome', '$email', '$telefone') ";
        $result = mysqli_query($con, $query);
    }

}
