<?
require("../../phpmailer/class.phpmailer.php");

$date = date("d/m/Y h:i");
$nome = $_POST['nome'];
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
$depto_conf = $_POST['depto'];
$end = $_POST['end'];
$codigo_postal = $_POST['codigo_postal'];
$pais = $_POST['pais'];
$tel = $_POST['tel'];
$cel = $_POST['cel'];
$justif = $_POST['justif'];

//CABEÇALHO - CONFIGURAÇÕES SOBRE SEUS DADOS E SEU WEBSITE
$nome_do_site="Seu Site";
$email_para_onde_vai_a_mensagem = "propostas@fesbe.org.br";
$nome_de_quem_recebe_a_mensagem = "Felipe";
//MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
$assunto="Conferência 2013: ";
// FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
$configuracao_da_mensagem_original="
DADOS PESSOAIS\n
Nome: $nome\n
Email: $email\n
Telefone: $telefone\n
Instituicao: $inst\n

DADOS DA CONFERENCIA\n
Sociedade proponente: $soc_proponente \n	
Sociedades interessadas: $soc_inter \n
TÍTULO: $titulo \n
Nome Conferencista:	$nome_conf \n
Documento Conferencista (CPF ou Passaporte):$doc_conf \n
E-mail Conferencista: $email_conf \n
Instituição: $inst_conf \n
Depto:	$depto_conf \n
Endereço:	$end \n
Código Postal:	$codigo_postal \n
País:	$pais \n
Telefone:	$tel \n
Celular:	$cel \n
Justificativa: $justif \n
ENVIADO EM: $date
";
//CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO

$mail = new PHPMailer();
$mail->SetLanguage("br", "libs/"); // ajusto a lingua a ser utilizadda
$mail->SMTP_PORT = "587"; // ajusto a porta de smt a ser utilizada. Neste caso, a 587 que o GMail utiliza
$mail->SMTPSecure = "tls"; // ajusto o tipo de comunicação a ser utilizada, no caso, a TLS do GMail
$mail->IsSMTP(); // ajusto o email para utilizar protocolo SMTP
$mail->Host = "smtp.gmail.com";
//$mail->Host = "smtp.gmail.com";  // especifico o endereço do servidor smtp do GMail
$mail->SMTPAuth = true;  // ativo a autenticação SMTP, no caso do GMail, é necessário
$mail->Username = 'propostas@fesbe.org.br';  // Usuário SMTP do GMail
$mail->Password = 'f3d3r4c40'; // Senha do usuário SMTP do GMail

// Aqui algumas informações que serão enviadas no cabeçalho do email
$mail->From = "propostas@fesbe.org.br"; // Email de quem envia o email
$mail->FromName = "Propostas"; // Nome de quem envia o email
$mail->AddAddress('propostas@fesbe.org.br');
//$mail->$lista2; // Endereço e nome de quem vai receber o email, o nome é opcional
//$mail->AddAddress("Email2@dominio.com"); // Mais um endereço, somente para mostrar que você pode mandar email para varios endereços no mesmo email. Equilvalente a você usar a [vírgula] nos webmail e clientes de email
//$mail->AddReplyTo("SeuUsuario@gmail.com", "Seu nome"); // Email e nome que será utilizado quando a pessoa responder este email

$mail->WordWrap = 50;                                                            // quebra linha sempre que uma linha atingir 50 caracteres
# $mail->AddAttachment("/var/tmp/file.tar.gz");          // adc arquivo anexo. *opcional*
# $mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // adc outro arquivo anexo com nome (opcional). *opcional*
$mail->IsHTML(true);                                                              // ajusto envio do email no formato HTML

$mail->Subject = $assunto_da_mensagem_original; // Aqui colocar o assunto do email
$mail->Body  = $configuracao_da_mensagem_original; // aqui o corpo do email para usuarios que tem a opção text/html do seu webmail ou cliente de email ativada
//$mail->AltBody = $msg0;       // aqui o corpo do email para usuarios que tem a opção text/html do seu webmail ou cliente de email desativada


if(!$mail->Send())
{
   echo "Mensagem n&atilde;o pode ser enviada. ";
   echo "Erro: " . $mail->ErrorInfo;
   exit;
}
?>
