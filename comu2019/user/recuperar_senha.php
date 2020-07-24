<?
//include './mysqlconecta.php';
//include './mysqlexecuta.php';

$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

$cpf = $_GET['cpf'];
if($cpf==null){
    $cpf = $_POST['cpf'];
    $cpf = str_replace('.','',$cpf);
    $cpf = str_replace('-','',$cpf);
}
$sql_consulta_senha = "SELECT * FROM tb_usuario WHERE cpf LIKE '$cpf'";
$res_consulta_senha = mysqlexecuta($id,$sql_consulta_senha);

while($row_consulta_senha = mysql_fetch_array($res_consulta_senha)){
    $senha = $row_consulta_senha['senha'];
    $nome = $row_consulta_senha['nome'];
    $email = $row_consulta_senha['email'];   

include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");

$validacao =  $row_evento['link_usuario']."login.php";
$mensagemHTML = "Segue seu login e Senha para acesso ao sistema de Inscri&ccedil;&atilde;o: <br />Login: <b>".$email."</b><br /> Senha: <b>".$senha."</b><br /><br /> <a href='$validacao'>$validacao </a><br /><br />Atenciosamente,<br />Comissão Organizadora <br />".$row['nome_evento'];

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

$mail->Subject = 'Senha para acesso ao sistema -'.$row_evento['nome_evento'];

//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";

$mail->MsgHTML($mensagemHTML);

//$mail->AddAttachment("./gerados/".$email.".pdf");

//$mail->AddAttachment("files/img03.jpg");

$mail->AddAddress($email, $nome);

$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);

$mail->IsHTML(true);

 

if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

//echo "Enviado para ".$row_orientador['email']."   ".$row_orientador['nome'];	
}
?>
<html class="<? echo $cor; ?>">
  <head>
    <title>FMSYS</title>

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
<br /><br /><div class="ls-alert-success">
Foi Enviado um e-mail para o email cadastrado (<b><? echo $email; ?></b>), com instru&ccedil;&otilde;es seus dados de login e senha.<br /><br />
<a href="./login.php">Clique Aqui </a>para voltar para a p&aacute;gina de login.
</div>
    
<?      
    }
?>