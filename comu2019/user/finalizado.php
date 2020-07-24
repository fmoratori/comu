<?
$id_trabalho = $_GET['id_trabalho'];
$val = base64_encode($id_trabalho);
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
    
    $sql_orientador = "SELECT * FROM tb_usuario WHERE `id`=$id_trabalho";
    $res_orientador = mysqlexecuta($id,$sql_orientador);
    $row_orientador = mysql_fetch_array($res_orientador);    
?>
<h1 class="ls-title-intro ls-ico-pencil2">Envio Finalizado</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*6),2); ?>" class="ls-animated"></div>
<div class="ls-box-filter">
<?
include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
$link = './ce/ce_'.$id_trabalho.'.pdf';

$validacao =  $row_evento['link_usuario']."exibe_orient.php?id_trabalho=$id_trabalho&val=$val";
$mensagemHTML = "Agora seu trabalho ser&aacute; encaminhado para a comiss&atilde;o de avalia&ccedil;&atilde;o do evento.<br /> Segue anexo uma c&oacute;pia do trabalho. A partir desse momento n&atilde;o &eacute; permitido realizar qualquer tipo de altera&ccedil;&atilde;o.<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".$row['nome_evento'];

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

$mail->Subject = 'Envio Trabalho Finalizado '.$row['nome_evento'];

//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";

$mail->MsgHTML($mensagemHTML);
$mail->AddAttachment($link);

//$mail->AddAttachment("./gerados/".$email.".pdf");

//$mail->AddAttachment("files/img03.jpg");

$mail->AddAddress($row_orientador['email'], $row_orientador['nome']);

$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);

$mail->IsHTML(true);

 

if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

//echo "Enviado para ".$row_orientador['email']."   ".$row_orientador['nome'];	
}
?>
<div class="ls-alert-danger"><strong>Aten&ccedil;&atilde;o!</strong> Ser&atilde;o avaliados apenas os trabalhos cuja a inscri&ccedil;&atilde;o esteja paga. </div>
<div class="ls-alert-success"><strong>Envio de Trabalho Finalizado.</strong><br />
Seu trabalho seguir&aacute; para avalia&ccedil;&atilde;o.</b><br />
O n&uacute;mero provis&oacute;rio do seu trabalho &eacute;: <b><? echo $id_trabalho; ?>.</b><br />
<!--Em Breve seu trabalho ser&aacute; encaminhado para avalia&ccedil;&atilde;o.--></div>
</div>