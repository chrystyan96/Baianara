<?php
include_once '../../banco/conexao.php';
$con = new conexao();

$id = $_GET['id'];
$query = "SELECT * FROM login WHERE id='$id'";
$result = mysqli_query($con->connect(), $query);

?>

<div class="modal-header main-color-bg">
    <h4 class="modal-title" id="myModalLabel">Dados Pessoais</h4>
</div>
<div class="modal-body" id="editarCad">
    <?php
    while ($dados = mysqli_fetch_assoc($result)) {
        $id = $dados['id'];
        ?>
        <label>Login:</label><br />
        <input disabled style="cursor: default;" type="text" class="form-control my-input-class" id="loginCad" value="<?php echo $dados['login']; ?>"><br /><br />
        <label>Senha:</label><br />
        <input disabled style="cursor: default;" type="password" class="form-control my-input-class" id="senhaCad"><br /><br />
        <label>Confirmar Senha:</label><br />
        <input disabled style="cursor: default;" type="password" class="form-control my-input-class" id="confirmSenhaCad"><br /><br />
        <label>Nome:</label><br />
        <input disabled style="cursor: default;" type="text" class="form-control my-input-class" id="nomeCad" value="<?php echo $dados['nome']; ?>"><br /><br />
        <label>Email:</label><br />
        <input disabled style="cursor: default;" type="text" class="form-control my-input-class" id="emailCad" value="<?php echo $dados['email']; ?>"><br /><br />
        <label>Telefone:</label><br />
        <input disabled style="cursor: default;" type="text" value="<?php echo $dados['telefone']; ?>" class="form-control" id="telefone"><br /><br />
    <?php }; ?>
    <p>
        <button style="cursor: default;" href="#" type="submit" id="initEdit" class="btn btn-primary" onclick="exibe();">Editar Dados</button>
        <button disabled style="cursor: default;" href="#" type="submit" class="btn btn-danger" id='saveCad' data-id="<?php echo $dados['id'] ?>" onclick="atualizar();">Salvar Dados</button>
    </p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
</div>

<script Language="JavaScript">
    function exibe() {
        $('#editarCad #loginCad').prop('disabled', false);
        $('#editarCad #senhaCad').prop('disabled', false);
        $('#editarCad #confirmSenhaCad').prop('disabled', false);
        $('#editarCad #nomeCad').prop('disabled', false);
        $('#editarCad #emailCad').prop('disabled', false);
        $('#editarCad #telefone').prop('disabled', false);
        $('#editarCad #saveCad').prop('disabled', false);
        $('#editarCad #initEdit').prop('disabled', true);
    }
</script>

<script Language="JavaScript">
    function atualizar() {
        var id = $('#editarCad #saveCad').attr('data-id');
        var login = $('#editarCad #loginCad').val();
        var senha = $('#editarCad #senhaCad').val();
        var confSenha = $('#editarCad #confirmSenhaCad').val();
        var nome = $('#editarCad #nomeCad').val();
        var email = $('#editarCad #emailCad').val();
        var telefone = $('#editarCad #telefone').val();
        $('#editCadastro').modal('hide');

        if (senha === '') {
            if (telefone.length < 14) {
                bootbox.alert("O campo Telefone é muito curto!");
                return false;
            } else {
                bootbox.confirm({
                    title: 'Editar Cadastro',
                    message: 'Deseja salvar alterações? Você precisará logar novamente ao fim da atualização ...',
                    callback: function (result) {
                        if (result) {
                            $.ajax({url: "../regras/cliente/regrasEditarCadastro.php?login=" + login + "&senha=" + senha + "&nome=" + nome + "&email=" + email + "&telefone=" + telefone + "&id=" + id,
                                cache: false,
                                success: function (e) {
                                    bootbox.alert("Cadastro atualizado com sucesso! Você será deslogado em 5 segundos ou aperte OK para sair!", function () {
                                        window.location.replace("../acesso/logout.php");
                                    }).find("div.modal-dialog").addClass("mo‌​dal-sm");
                                    setTimeout(function () {
                                        window.location.replace("../acesso/logout.php");
                                    }, 5000);
                                }
                            });
                        }
                    }
                });
            }
        } else {
            if (senha.length < 8) {
                bootbox.alert({
                    title: "Erro!",
                    message: "O campo Senha deve ter no minímo 8 dígitos!",
                    callback: function(){
                        $('#editCadastro').modal('show');
                    }
                });
            } else if (confSenha.length < 8) {
                bootbox.alert({
                    title: "Erro!",
                    message: "O campo Confirmar Senha deve ter no minímo 8 dígitos!",
                    callback: function(){
                        $('#editCadastro').modal('show');
                    }
                });
            } else if (senha != confSenha) {
                bootbox.alert({
                    title: "Erro!",
                    message: "Senhas diferentes! Escreva senhas iguais nos campos Senha e Confirmar Senha",
                    callback: function(){
                        $('#editCadastro').modal('show');
                    }
                });
            } else if (telefone.length < 10 || telefone.length > 11) {
                bootbox.alert({
                    title: "Erro!",
                    message: "O campo Telefone não pode ter letras ou caracteres especiais e tem que ter entre 10 ou 11 números!",
                    callback: function(){
                        $('#editCadastro').modal('show');
                    }
                });
            } else {
                bootbox.confirm({
                    title: 'Editar Cadastro',
                    message: 'Deseja salvar alterações? Você precisará logar novamente ao fim da atualização ...',
                    callback: function (result) {
                        if (result) {
                            $.ajax({url: "../regras/cliente/regrasEditarCadastro.php?login=" + login + "&senha=" + senha + "&nome=" + nome + "&email=" + email + "&telefone=" + telefone + "&id=" + id,
                                cache: false,
                                success: function (e) {
                                    bootbox.alert("Cadastro atualizado com sucesso! Você será deslogado em 5 segundos ou aperte OK para sair!", function () {
                                        window.location.replace("../acesso/logout.php");
                                    }).find("div.modal-dialog").addClass("mo‌​dal-sm");
                                    setTimeout(function () {
                                        window.location.replace("../acesso/logout.php");
                                    }, 5000);
                                }
                            });
                        }
                    }
                });
            }
        }
    }
</script>