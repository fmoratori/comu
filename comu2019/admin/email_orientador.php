<!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>

<?
include './mysqlconecta.php';
include './mysqlexecuta.php';
$id_trabalho = $_GET['id_trabalho'];
$val = base64_encode($id_trabalho);
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
    
    $sql_orientador = "SELECT * FROM tb_autores WHERE `trabalho_id`=$id_trabalho AND `ordenacao`=100";
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

$validacao =  "http://fmsys.com.br/fmsys/fesbe/regional2018/user/exibe_orient.php?id_trabalho=$id_trabalho&val=$val";
$mensagemHTML = "Segue link para valida&ccedil;&atilde;o do trabalho ".$row_trabalhos['titulo']." ".$quebra_linha." <a href='$validacao'>$validacao </a><br /><br />Solicitamos que realize a valida&ccedil;&atilde;o o quanto antes, pois s&oacute; assim poderemos encaminhar o trabalho para avalia&ccedil;&atilde;o.<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".$row['nome_evento'];

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

$mail->Subject = 'Trabalho Aguardando Validação '.$row['nome_evento'];

//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";

$mail->MsgHTML($mensagemHTML);

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

<div class="ls-alert-success"><strong>Envio de Trabalho Finalizado.</strong><br />
Foi Enviado um e-mail para o orientador cadastrado (<b><? echo $row_orientador['email']; ?></b>), com instruções para valida&ccedil;&atilde;o do trabalho.<br />
<b>Solicite ao seu orientador para que realize a valida&ccedil;&atilde;o o mais r&aacute;pido poss&iacute;vel, pois somente ap&oacute;s a valida&ccedil;&atilde;o seu trabalho seguir&aacute; para avalia&ccedil;&atilde;o.</b><br />
O n&uacute;mero provis&oacute;rio do seu trabalho &eacute;: <b><? echo $id_trabalho; ?>.</b><br />
Em Breve seu trabalho ser&aacute; encaminhado para avalia&ccedil;&atilde;o.</div>
</div>