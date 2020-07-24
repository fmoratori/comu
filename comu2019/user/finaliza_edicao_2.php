<h1 class="ls-title-intro ls-ico-pencil2">Edi&ccedil;&atilde;o Finalizada!</h1>
<?
//include "./mysqlconecta.php";
//include "./mysqlexecuta.php";
$id_trabalho = $_GET['id_trabalho'];
$status = $_GET['status'];
$val = $_GET['val'];
$link = $_SESSION['link'];

    $sql_finaliza_envio="UPDATE `tb_trabalhos` SET `link`='$link' WHERE `id`=$id_trabalho;";	
    $res_finaliza_envio = mysqlexecuta($id,$sql_finaliza_envio);	
 
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);
 
    $sql_usuario = "SELECT * FROM tb_trabalhos WHERE `id`=$id_trabalho";
    $res_usuario = mysqlexecuta($id,$sql_usuario);
    $row_usuario = mysql_fetch_array($res_usuario);     
    $link = $row_usuario['link'];
    $id_usuario = $row_usuario['usuario_id'];
    echo $id_usuario2;
        $titulo = $row_usuario['titulo'];

    $sql_email = "SELECT * FROM tb_usuario WHERE `id`=$id_usuario";
    $res_email = mysqlexecuta($id,$sql_email);
    $row_email = mysql_fetch_array($res_email);     


include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
$mensagemHTML = "Seu trabalho <b>$titulo</b> <b>FOI EDITADO</b>.<br /> Segue anexo uma c&oacute;pia do trabalho editado. Se voc&ecirc; n&atilde; realizou nenhuma altera&ccedil;&atilde;o no seu resumo e recebeu este e-mail, entre em contato imediatamente com a secretaria do evento.<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".$row['nome_evento'];
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "email-ssl.com.br";
$mail->Port = 465;
$mail->Username = "nao-responda@fmsys.com.br";
$mail->Password = "f3d3r4c40";
$mail->From = "nao-responda@fmsys.com.br";
$mail->FromName = $row_evento['sigla'];
$mail->Subject = 'Trabalho Editado '.$row['nome_evento'];
$mail->MsgHTML($mensagemHTML);
$mail->AddAttachment($link);
$mail->AddAddress($row_email['email'], $row_email['nome']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

}
else{
?>
<div class="ls-alert-success"><strong>Edi&ccedil;&atilde;o de Trabalho Finalizada.</strong><br />
Foi Enviado um e-mail(<b><? echo $row_email['email']; ?></b>).<br /></div>
<?
 //  echo "<meta http-equiv='refresh' content='0; url=./exibe_orient.php?id_trabalho=$id_trabalho&val=$val&msg=3'>";
   }
?>