<?
include("../../phpmailer/class.phpmailer.php");
include("../../phpmailer/class.smtp.php");


$date = date("d/m/Y h:i");
$nome = $_POST['nome'];
$doc_proponente = $_POST['doc_proponente'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$inst = $_POST['inst'];
$soc_proponente = $_POST['soc_proponente'];
$soc_inter = $_POST['soc_inter'];
$titulo = $_POST['titulo'];
$nome_conf = $_POST['nome_conf'];
$doc_conf = $_POST['doc_conf'];
$email_conf = $_POST['email_conf'];
$inst_conf = $_POST['inst_conf'];
$depto_conf = $_POST['depto_conf'];
$end = $_POST['end'];
$codigo_postal = $_POST['codigo_postal'];
$pais = $_POST['pais'];
$tel = $_POST['tel'];
$cel = $_POST['cel'];
$justif = $_POST['justif'];
$ciencia_insc = $_POST['ciencia_insc'];
$ciencia_dados = $POST['ciencia_dados'];
$ciencia_declaracao = $_POST['ciencia_declaracao'];


if ($nome != "" && $email != "" && $telefone != "" && $titulo != "" && isset($_POST['ciencia_insc']) && isset($_POST['ciencia_dados']) && isset($_POST['ciencia_declaracao']) && $doc_proponente!="" && $doc_conf!="" && $inst_conf!=""){
		
//if(!isset($_POST[Submit])) die("N&atilde;o recebi nenhum par&acitc;metro. Por favor volte ao formulario.html antes");
/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */




 






 
/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
 
 /* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = "
<h3>ISTO É APENAS UMA CONFIRMAÇÃO DO ENVIO DA SUA PROPOSTA, FAVOR NÃO RESPONDER ESTE E-MAIL.</h3><BR />
DADOS DO PROPONENTE <br />
Nome: $nome <br />
Documento: $doc_proponente<br />
Email: $email <br />
Telefone: $telefone <br />
Instituicao: $inst <br />
Sociedade proponente: $soc_proponente <br />
Sociedades interessadas: $soc_inter <br />
<br />
DADOS DA CONFERENCIA <br />
TÍTULO: $titulo <br />
Nome Conferencista:	$nome_conf <br />
Documento Conferencista (CPF ou Passaporte):$doc_conf <br />
E-mail Conferencista: $email_conf <br />
Instituição: $inst_conf <br />
Depto:	$depto_conf <br />
Endereço:	$end <br />
Código Postal:	$codigo_postal <br />
País:	$pais <br />
Telefone:	$tel <br />
Celular:	$cel <br />
Justificativa: $justif <br />
ENVIADO EM: $date <br />
<b>Declaro que tenho ciência que deverei fazer a minha inscrição para participar da Reunião Anual da FeSBE, caso a presente proposta seja aceita.</b><br />
<b>Concordo e responsabilizo-me por todas as informações contidas no presente formulário. Caso a presente proposta seja aceita, comprometo-me a participar de outras atividades da reunião da FeSBE, se convocado, tais como avaliação de painéis e coordenação de sessões científicas.</b><br />
<b> Declaro também que informei aos demais membros desta proposta acerca deste compromisso com a reunião da FeSBE, com o qual concordaram.</b>

";



$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "propostas@fesbe.org.br";
$mail->Password = "f3d3r4c40";

$mail->From = "propostas@fesbe.org.br";
$mail->FromName = "Propostas FeSBE";
$mail->Subject = 'Conferência 2013: '.$titulo;
//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
$mail->MsgHTML($mensagemHTML);
//$mail->AddAttachment("files/files.zip");
//$mail->AddAttachment("files/img03.jpg");
$mail->AddAddress($email, $nome);
$mail->IsHTML(true);
 
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {


 
 

/* Enviando a mensagem */
 
/* Mostrando na tela as informações enviadas por e-mail */
print "Proposta: <b>$assunto</b> enviada com sucesso!<br><br>
<p><a href='".$_SERVER["HTTP_REFERER"]."'>Voltar</a></p>";
print "DADOS DO PROPONENTE <br />
Nome: $nome <br />
Documento: $doc_proponente<br />
Email: $email <br />
Telefone: $telefone <br />
Instituicao: $inst <br />
Sociedade proponente: $soc_proponente <br />
Sociedades interessadas: $soc_inter <br />
<br />
DADOS DA CONFERENCIA <br />
TÍTULO: $titulo <br />
Nome Conferencista:	$nome_conf <br />
Documento Conferencista (CPF ou Passaporte):$doc_conf <br />
E-mail Conferencista: $email_conf <br />
Instituição: $inst_conf <br />
Depto:	$depto_conf <br />
Endereço:	$end <br />
Código Postal:	$codigo_postal <br />
País:	$pais <br />
Telefone:	$tel <br />
Celular:	$cel <br />
Justificativa: $justif <br />
ENVIADO EM: $date <br />
<b>Declaro que tenho ciência que deverei fazer a minha inscrição para participar da Reunião Anual da FeSBE, caso a presente proposta seja aceita.</b><br />
<b>Concordo e responsabilizo-me por todas as informações contidas no presente formulário. Caso a presente proposta seja aceita, comprometo-me a participar de outras atividades da reunião da FeSBE, se convocado, tais como avaliação de painéis e coordenação de sessões científicas. </b><br />
<b>Declaro também que informei aos demais membros desta proposta acerca deste compromisso com a reunião da FeSBE, com o qual concordaram.</b>

ENVIADO EM: $date <br />
";
	}
	}
	else{
	echo '<script> alert("Existem Campos Obrigatórios Não preenchidos!");</script>';
	$volta = "<script>javascript:history.back(-1)</script>";
	echo $volta;
	}
?>