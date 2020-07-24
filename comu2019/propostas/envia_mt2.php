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
$nome_coord = $_POST['nome_coord'];
$doc_coord = $_POST['doc_coord'];
$email_coord = $_POST['email_coord'];
$inst_coord = $_POST['inst_coord'];
$depto_coord = $_POST['depto_coord'];
$end_coord = $_POST['end_coord'];
$codigo_postal_coord = $_POST['codigo_postal_coord'];
$pais_coord = $_POST['pais_coord'];
$tel_coord = $_POST['tel_coord'];
$cel_coord = $_POST['cel_coord'];
$titulo_geral=$_POST['titulo_geral'];
$titulo=$_POST['titulo'];
$titulo_1 = $_POST['titulo_1'];
$nome_conf_1 = $_POST['nome_conf_1'];
$doc_conf_1 = $_POST['doc_conf_1'];
$email_conf_1 = $_POST['email_conf_1'];
$inst_conf_1 = $_POST['inst_conf_1'];
$depto_conf_1 = $_POST['depto_conf_1'];
$end_1 = $_POST['end_1'];
$codigo_postal_1 = $_POST['codigo_postal_1'];
$pais_1 = $_POST['pais_1'];
$tel_1 = $_POST['tel_1'];
$cel_1 = $_POST['cel_1'];

$titulo_2 = $_POST['titulo_2'];
$nome_conf_2 = $_POST['nome_conf_2'];
$doc_conf_2 = $_POST['doc_conf_2'];
$email_conf_2 = $_POST['email_conf_2'];
$inst_conf_2 = $_POST['inst_conf_2'];
$depto_conf_2 = $_POST['depto_conf_2'];
$end_2 = $_POST['end_2'];
$codigo_postal_2 = $_POST['codigo_postal_2'];
$pais_2 = $_POST['pais_2'];
$tel_2 = $_POST['tel_2'];
$cel_2 = $_POST['cel_2'];

$titulo_3 = $_POST['titulo_3'];
$nome_conf_3 = $_POST['nome_conf_3'];
$doc_conf_3 = $_POST['doc_conf_3'];
$email_conf_3 = $_POST['email_conf_3'];
$inst_conf_3 = $_POST['inst_conf_3'];
$depto_conf_3 = $_POST['depto_conf_3'];
$end_3 = $_POST['end_3'];
$codigo_postal_3 = $_POST['codigo_postal_3'];
$pais_3 = $_POST['pais_3'];
$tel_3 = $_POST['tel_3'];
$cel_3 = $_POST['cel_3'];

$justif = $_POST['justif'];
$ciencia_insc = $_POST['ciencia_insc'];
$ciencia_dados = $POST['ciencia_dados'];
$ciencia_declaracao = $_POST['ciencia_declaracao'];


if ($nome != "" && $email != "" && $telefone != "" && $titulo_geral != "" && isset($_POST['ciencia_insc']) && isset($_POST['ciencia_dados']) && isset($_POST['ciencia_declaracao'])){
		

 
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

<b>COORDENADOR</b><br />
Nome: $nome_coord <br />
Documento: $doc_coord<br />
Email: $email_coord<br />
Telefone: $tel_coord<br />
Instituicao: $inst_coord <br />
<br />
<b>TÍTULO DO MÓDULO:</b> $titulo_geral <br /><br />
<b>CONFERÊNCIA 1</b><br />
Título: $titulo_1 <br />
Conferencista:	$nome_conf_1 <br />
Documento: $doc_conf_1 <br />
E-mail: $email_conf_1 <br />
Instituição: $inst_conf_1 <br />
Depto:	$depto_conf_1 <br />
Endereço:	$end_1 <br />
Código Postal:	$codigo_postal_1 <br />
País:	$pais_1 <br />
Telefone:	$tel_1 <br />
Celular:	$cel_1 <br />
<b>CONFERÊNCIA 2</b><br />
Título: $titulo_2 <br />
Conferencista:	$nome_conf_2 <br />
Documento: $doc_conf_2 <br />
E-mail: $email_conf_2 <br />
Instituição: $inst_conf_2 <br />
Depto:	$depto_conf_2 <br />
Endereço:	$end_2 <br />
Código Postal:	$codigo_postal_2 <br />
País:	$pais_2 <br />
Telefone:	$tel_2 <br />
Celular:	$cel_2 <br />
<b>CONFERÊNCIA 3</b><br />
Título: $titulo_3 <br />
Conferencista:	$nome_conf_3 <br />
Documento: $doc_conf_3 <br />
E-mail: $email_conf_3 <br />
Instituição: $inst_conf_3 <br />
Depto:	$depto_conf_3 <br />
Endereço:	$end_3 <br />
Código Postal:	$codigo_postal_3 <br />
País:	$pais_3 <br />
Telefone:	$tel_3 <br />
Celular:	$cel_3 <br />
Justificativa: $justif <br />
ENVIADO EM: $date <br />
<b>Declaro que tenho ciência que deverei fazer a minha inscrição para participar da Reunião Anual da FeSBE, caso a presente proposta seja aceita.</b><br />
<b>Concordo e responsabilizo-me por todas as informações contidas no presente formulário. Caso a presente proposta seja aceita, comprometo-me a participar de outras atividades da reunião da FeSBE, se convocado, tais como avaliação de painéis e coordenação de sessões científicas. </b><br />
<b>Declaro também que informei aos demais membros desta proposta acerca deste compromisso com a reunião da FeSBE, com o qual concordaram.</b>
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
$mail->Subject = 'Módulo Temático (2) 2013: '.$titulo_geral;
//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
$mail->MsgHTML($mensagemHTML);
//$mail->AddAttachment("files/files.zip");
//$mail->AddAttachment("files/img03.jpg");
$mail->AddAddress($email, $nome);
$mail->AddAddress('propostas@fesbe.org.br', 'Propostas 2013');
$mail->IsHTML(true);
 
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {

 
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

<b>COORDENADOR</b><br />
Nome: $nome_coord <br />
Documento: $doc_coord<br />
Email: $email_coord<br />
Telefone: $tel_coord<br />
Instituicao: $inst_conf_coord <br />
<br />
<b>TÍTULO DO MÓDULO:</b> $titulo_geral <br /><br />
<b>CONFERÊNCIA 1</b><br />
Título: $titulo_1 <br />
Conferencista:	$nome_conf_1 <br />
Documento: $doc_conf_1 <br />
E-mail: $email_conf_1 <br />
Instituição: $inst_conf_1 <br />
Depto:	$depto_conf_1 <br />
Endereço:	$end_1 <br />
Código Postal:	$codigo_postal_1 <br />
País:	$pais_1 <br />
Telefone:	$tel_1 <br />
Celular:	$cel_1 <br />
<b>CONFERÊNCIA 2</b><br />
Título: $titulo_2 <br />
Conferencista:	$nome_conf_2 <br />
Documento: $doc_conf_2 <br />
E-mail: $email_conf_2 <br />
Instituição: $inst_conf_2 <br />
Depto:	$depto_conf_2 <br />
Endereço:	$end_2 <br />
Código Postal:	$codigo_postal_2 <br />
País:	$pais_2 <br />
Telefone:	$tel_2 <br />
Celular:	$cel_2 <br />
<b>CONFERÊNCIA 3</b><br />
Título: $titulo_3 <br />
Conferencista:	$nome_conf_3 <br />
Documento: $doc_conf_3 <br />
E-mail: $email_conf_3 <br />
Instituição: $inst_conf_3 <br />
Depto:	$depto_conf_3 <br />
Endereço:	$end_3 <br />
Código Postal:	$codigo_postal_3 <br />
País:	$pais_3 <br />
Telefone:	$tel_3 <br />
Celular:	$cel_3 <br />
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