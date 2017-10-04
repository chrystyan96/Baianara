<?php

error_reporting(E_ALL ^ E_WARNING);
include_once '../../banco/conexao.php';
$con = new conexao();
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("../../PHPMailer_5.2.0/class.phpmailer.php");
require_once("../../PHPMailer_5.2.0/class.smtp.php");

// Inicia a classe PHPMailer
$mail = new PHPMailer();

$mail->IsHTML(true);

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->SMTPDebug = 2; // Debug

$email = $_GET['email'];

$query = "SELECT * FROM login WHERE email='$email'";
$result = mysqli_query($con->connect(), $query);
$numRows = mysqli_num_rows($result);
$rows = mysqli_fetch_array($result);

if (!$email || $email === 0) {
    echo 'vazio';
} else if ($numRows == 1) {
    $id = $rows['id'];
    $chave = md5($rows['id'] . $rows['senha']);
    $query2 = "INSERT INTO recuperarSenha(idUser, email, chave) VALUES('$id', '$email', '$chave')";
    mysqli_query($con->connect(), $query2);

    if ($chave) {
        try {
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
            $mail->SMTPAuth = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
            $mail->Port = 587; //  Usar 587 porta SMTP
            $mail->Username = 'baianara17@gmail.com'; // Usuário do servidor SMTP (endereço de email)
            $mail->Password = 'baianara2017'; // Senha do servidor SMTP (senha do email usado)
            //Define o remetente
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
            $mail->SetFrom('baianara17@gmail.com', 'Baianará'); //Seu e-mail
            $mail->AddReplyTo('baianara17@gmail.com', 'Baianará'); //Seu e-mail
            //Define os destinatário(s)
            //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->AddAddress($email, $rows['nome']);

            $message = "<html><body>";

            $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

            $message .= "<tr><td>";

            $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";

            $message .= "<thead>
                        <tr height='80'>
                        <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;'>Recado - SSP</th>
                        </tr>
                        </thead>";

                              $message .= "<tbody>
                        <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                         <td style='background-color:#00a2d1; text-align:center;'><a href='http://baianara.com.br' style='color:#fff; text-decoration:none;'>Baianará - Home</a></td>
                        </tr>

                        <tr>
                         <td colspan='4' style='padding:15px;'>
                          <p style='font-size:15px;'>Você solicitou uma recuperação de senha no site do Baianará!</p>
                          <p style='font-size:15px;'>Seu link é: <a href='http://localhost/baianara/site2.0/pages/recuperarSenha.php?email={$email}&chave={$chave}'>Redefinir Senha</a>,</p>
                          <p style='font-size:15px;'></p>
                          <p style='font-size:15px;'>Desconsidere esse email se não foi você quem fez essa solicitação...</p><br>
                          <hr />
                         </td>
                        </tr>
                        </tbody>";

            $message .= "</table>";

            $message .= "</td></tr>";
            $message .= "</table>";

            $message .= "</body></html>";
            //Campos abaixo são opcionais 
            //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
            //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
            //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
            //Define o corpo do emailte do Baianará! Seu link é: 
            $mail->Subject = "Pedido de Redefinição de Senha";

            $mail->MsgHTML(utf8_decode($message));

            ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
            //$mail->MsgHTML(file_get_contents('arquivo.html'));

            $mail->Send();
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();
            echo "Enviamos um link para a redefinição da senha para o endereço de e-mail informado!";

            //caso apresente algum erro é apresentado abaixo com essa exceção.
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
        }
    } else {
        echo 'Não foi possível gerar o endereço único';
    }
} else {
    echo 'Esse utilizador não existe';
}
?>

