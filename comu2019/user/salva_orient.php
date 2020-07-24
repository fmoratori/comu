<?
include "mysqlconecta.php";
include "mysqlexecuta.php";
$id_trabalho = $_GET['id_trabalho'];
$status = $_GET['status'];
$val = $_GET['val'];
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

if($status==3){
    $sql_finaliza_envio="UPDATE `tb_trabalhos` SET `status`='$status' WHERE `id`=$id_trabalho;";	
    $res_finaliza_envio = mysqlexecuta($id,$sql_finaliza_envio);	
 
    $sql_usuario = "SELECT * FROM tb_trabalhos WHERE `id`=$id_trabalho";
    $res_usuario = mysqlexecuta($id,$sql_usuario);
    $row_usuario = mysql_fetch_array($res_usuario);     
//    $link = $row_usuario['link'];
    $link = './ce/ce_'.$id_trabalho.'.pdf';
    $id_usuario = $row_usuario['usuario_id'];
        $titulo = $row_usuario['titulo'];
    $sql_email = "SELECT * FROM tb_usuario WHERE `id`=$id_usuario";
    $res_email = mysqlexecuta($id,$sql_email);
    $row_email = mysql_fetch_array($res_email);     

    
include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
$mensagemHTML = "Seu orientador <b>APROVOU</b> o envio do trabalho <b>$titulo</b>.<br /> Agora seu trabalho ser&aacute; encaminhado para a comiss&atilde;o de avalia&ccedil;&atilde;o do evento.<br /> Segue anexo uma c&oacute;pia do trabalho validado pelo seu orientador. A partir desse momento n&atilde;o &eacute; permitido realizar qualquer tipo de altera&ccedil;&atilde;o.<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".$row['nome_evento'];
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
$mail->Subject = 'Parecer do Orientador '.$row['nome_evento'];
$mail->MsgHTML($mensagemHTML);
$mail->AddAttachment($link);
$mail->AddAddress($row_email['email'], $row_email['nome']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

}
else{

   echo "<meta http-equiv='refresh' content='0; url=./exibe_orient.php?id_trabalho=$id_trabalho&val=$val&msg=3'>";
   }
}

if($status==7){
    $sql_finaliza_envio="UPDATE `tb_trabalhos` SET `status`='$status' WHERE `id`=$id_trabalho;";	
    $res_finaliza_envio = mysqlexecuta($id,$sql_finaliza_envio);	
 
    $sql_usuario = "SELECT * FROM tb_trabalhos WHERE `id`=$id_trabalho";
    $res_usuario = mysqlexecuta($id,$sql_usuario);
    $row_usuario = mysql_fetch_array($res_usuario);     
    $titulo = $row_usuario['titulo'];
    $id_usuario = $row_usuario['usuario_id'];
    $sql_email = "SELECT * FROM tb_usuario WHERE `id`=$id_usuario";
    $res_email = mysqlexecuta($id,$sql_email);
    $row_email = mysql_fetch_array($res_email);     
    
    
include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");

$mensagemHTML = "Seu orientador <b>RECUSOU</b> o envio do trabalho <b>$titulo</b>.<br /> Acesse sua &aacute;rea reservada, realize as altera&ccedil;&otilde;es necess&aacute;rias e reenvie seu trabalho antes da data limite.<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".$row['nome_evento'];
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
$mail->Subject = 'Parecer do Orientador '.$row['nome_evento'];
$mail->MsgHTML($mensagemHTML);
$mail->AddAddress($row_email['email'], $row_email['nome']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

}
else{
   echo "<meta http-equiv='refresh' content='0; url=./exibe_orient.php?id_trabalho=$id_trabalho&val=$val&msg=4'>";
   }
}

?>