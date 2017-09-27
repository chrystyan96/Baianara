<?php
//tutorial visto em: https://stackoverflow.com/questions/35549508/passing-data-from-page-to-bootstrap-modal-using-sql-php
include '../../banco/conexao.php';
$id = $_GET['id'];

$con = new conexao();

$querySelect = "SELECT * FROM pedido WHERE id = '$id'";
$resultSelect = mysqli_query($con->connect(), $querySelect) or die("Database query failed. " . mysqli_error($con));
$opcoesPedidos = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);

function mascara_string($mascara, $string) {
    $string = str_replace(" ", "", $string);
    for ($i = 0; $i < strlen($string); $i++) {
        $mascara[strpos($mascara, "#")] = $string[$i];
    }
    return $mascara;
}
?>

<div class="modal-header main-color-bg">
    <h4 class="modal-title" id="myModalLabel">Pedido - nº<?php echo $opcoesPedidos['id']; ?></h4>
</div>
<div class="modal-body">
    <div id="status" style="display: none;"></div>
    <div id="formtesting"></div>
    <label>Nome: <?php echo $opcoesPedidos['nome']; ?></label><br />
    <label>Email: <?php echo $opcoesPedidos['email']; ?></label><br />
    <label>Telefone: <?php echo mascara_string("(##)#####-####", $opcoesPedidos['telefone']); ?></label><br /><br />
    <label>Preço: R$<?php echo $opcoesPedidos['preco']; ?>,00</label><br /><br />
    <label>Quantidade: </label>
    <input style="cursor: default;" type="text" disabled class="form-control" id="qtd" name="qtd" value="<?php echo $opcoesPedidos['quantidade']; ?>" style="min-width: 100%;"><br />
    <label>Descrição: </label>
    <textarea style="cursor: default;" type="text" disabled class="form-control" id="descricao" name="editor1" rows="7"><?php echo $opcoesPedidos['descricao']; ?></textarea><br />
</div>
