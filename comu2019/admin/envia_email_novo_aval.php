<?php

break;
$cpf_post = $_GET['id'];
	$sql222 = "SELECT * FROM tb_avaliador WHERE id = $cpf_post";
	$res222 = mysqlexecuta($id,$sql222);
	echo $sql222;
	//break;
while($row222 = mysql_fetch_array($res222)) {
$email = $row222['email'];
$senha = $row222['senha']; 
$nome = $row222['nome'];


include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
$sigla = $row_evento['sigla'];
$validacao =  "http://fmsys.com.br/fmsys/regional2019/avaliacao/login.php";
/***
$mensagemHTML = "Prezado(a) $nome,<br />
<br />

Existe(m) 1 ou mais trabalhos aguardando avaliacao dentro da sua area restrita.
<br />
Acesse: o link <a href='http://fmsys.com.br/fmsys/fesbe/regional2018/avaliacao/login.php'> http://fmsys.com.br/fmsys/fesbe/regional2018/avaliacao/login.php</a>
<br />
Solicitamos que realize a avaliação o mais rápido possível
<br /><br />

Usuario <b>$email</b> e senha <b>$senha</b><br />

Atenciosamente,<br />
<br />
Comissao Organizadora<br />
<br />";
***/

$mensagemHTML = "Prezado(a) Prof.(a) $nome,<br />
<br />
Gostar&iacute;amos de convid&aacute;-lo(a) para avaliar alguns resumos enviados para a $sigla.<br />
O prazo m&aacute;ximo para avalia&ccedil;&atilde;o &eacute; 16 de abril de 2019.<br />
<br />
Para uniformizar as avalia&ccedil;&otilde;es, solicitamos sua especial aten&ccedil;&atilde;o para que:<br />
1. O resumo contenha: uma introdu&ccedil;&atilde;o sucinta seguida dos objetivos, m&eacute;todos, resultados com valores num&eacute;ricos (p.ex.: n&uacute;mero de amostras, m&eacute;dia e erro padr&atilde;o; porcentagem do controle, etc.), e conclus&otilde;es. N&atilde;o poder&atilde;o ser aceitos resumos que n&atilde;o apresentem resultados num&eacute;ricos, se pertinentes. Estes dever&atilde;o ser devolvidos ao respons&aacute;vel, condicionando a aprova&ccedil;&atilde;o do mesmo &agrave; inclus&atilde;o dos resultados num&eacute;ricos; <br />
2. Projetos que utilizaram animais ou humanos s&oacute; possam ser aceitos se apresentarem o c&oacute;digo da aprova&ccedil;&atilde;o (protocolo/ processo/ n&uacute;mero) em comit&ecirc; de &eacute;tica em experimenta&ccedil;&atilde;o inserido no item material e m&eacute;todos do resumo. No caso de experimentos realizados com animais e humanos, os resumos devem ser acompanhados do documento digitalizado (pdf) da aprova&ccedil;&atilde;o do Comit&ecirc; de &Eacute;tica Experimental da Institui&ccedil;&atilde;o, o qual se encontra dispon&iacute;vel no respectivo link acima do resumo. Sem documento de &eacute;tica compat&iacute;vel com o resumo, o mesmo n&atilde;o dever&aacute; ser aceito e deve ser devolvido ao respons&aacute;vel, condicionando a aprova&ccedil;&atilde;o do mesmo &agrave; inser&ccedil;&atilde;o do c&oacute;digo no corpo do resumo e &agrave; anexa&ccedil;&atilde;o do pdf correspondente no sistema, como descrito nas regras para prepara&ccedil;&atilde;o e envio do resumo.<br />
Se os crit&eacute;rios acima forem cumpridos, os avaliadores dever&atilde;o analisar os resumos contidos na sua lista quanto &agrave; clareza e relev&acirc;ncia cient&iacute;fica.<br />
Todos os avaliadores receber&atilde;o de volta na sua &aacute;rea de avalia&ccedil;&atilde;o aqueles resumos para os quais solicitaram &ldquo;CORRE&Ccedil;&Atilde;O&rdquo; at&eacute; o dia 17 de abril de 2018 Caber&aacute;, portanto, ao pr&oacute;prio avaliador a decis&atilde;o final (aceite ou rejei&ccedil;&atilde;o) dos resumos revisados at&eacute; o dia 18 de abril de 2018. <br />
A avalia&ccedil;&atilde;o dever&aacute; ser realizada on-line no Sistema FeSBE. Para tal, acesse o portal <a href='http://fmsys.com.br/fmsys/fesbe/regional2019/avaliacao/login.php'>http://fmsys.com.br/fmsys/fesbe/regional2018/avaliacao/login.php</a> utilizando o <br />
<br />
<b>Usu&aacute;rio:</b> $email e a <b>Senha:</b> $senha. <br />
<br />
Clique no &iacute;cone do resumo para visualizar. Em &ldquo;Parecer&rdquo; digite qual a sua avalia&ccedil;&atilde;o em rela&ccedil;&atilde;o ao resumo e selecione a op&ccedil;&atilde;o desejada; em seguida, clique em &ldquo;Salvar&rdquo;. No caso de o resumo ser aceito sem observa&ccedil;&otilde;es, n&atilde;o ser&aacute; necess&aacute;rio digitar coment&aacute;rio algum na caixa de texto.<br />
Desde j&aacute; agradecemos a sua aten&ccedil;&atilde;o e colabora&ccedil;&atilde;o com a Diretoria da FeSBE. Por favor, em caso de d&uacute;vidas ou problemas t&eacute;cnicos com o acesso on-line, entrem em contato com a secretaria da empresa organizadora (e-mail: fesbe@cwyeventos.com.br a/c Cristiane Yoshizato). <br />
<br />
<br />
Atenciosamente,<br />
Secretaria FeSBE<br />
11-3091 7369<br /><br />";


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

//$mail->Subject = 'Trabalho Aguardando Avaliacao '.$row['nome_evento'];
$mail->Subject = 'Avaliacao de Trabalhos '.$row['nome_evento'];

//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";

$mail->MsgHTML($mensagemHTML);

//$mail->AddAttachment("./gerados/".$email.".pdf");

//$mail->AddAttachment("files/img03.jpg");

$mail->AddAddress($row222['email'], $row222['nome']);

$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);

$mail->IsHTML(true);

 

if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "Enviado para ".$row222['email']."   ".$row222['nome'];	
}
?>
<script>
window.close();
</script>
<meta http-equiv="refresh" content="0; url=/fmsys/fesbe/regional2019/admin/principal_admin.php?pg=avaliacao.php">
<?
}
?>