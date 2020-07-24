<?php
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
//if(!isset($_POST[Submit])) die("N&atilde;o recebi nenhum par&acitc;metro. Por favor volte ao formulario.html antes");
/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender='propostas@fesbe.org.br';
} else {
//        $emailsender = "felipe@" . $_SERVER[HTTP_HOST];
		        $emailsender = "propostas@fesbe.org.br";
        //    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
        // você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
 
/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
 
 /* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = "
<h3>ISTO É APENAS UMA CONFIRMAÇÃO DO ENVIO DA SUA PROPOSTA, FAVOR NÃO RESPONDER ESTE E-MAIL.</h3><BR />
DADOS PESSOAIS <br />
Nome: $nome <br />
Email: $email <br />
Telefone: $telefone <br />
Instituicao: $inst <br />
<br />
DADOS DA CONFERENCIA <br />
Sociedade proponente: $soc_proponente <br />
Sociedades interessadas: $soc_inter <br />
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
";




/*	if(isset($_REQUEST["converter"])) {  	  	
		$texto = $_REQUEST["texto"];
	  $novo =  nl2br(str_replace("&", "&amp;", htmlentities($texto)));
    //echo "check: $check";
    if(!isset($_REQUEST['converter_tags_html'])) {	 
       $novo = str_replace("&amp;lt;", "<", $novo);
			 $novo = str_replace("&amp;gt;", ">", $novo);
    }
	}*/
// Passando os dados obtidos pelo formulário para as variáveis abaixo
//$nomeremetente     = $_POST['nomeremetente'];
$nomeremetente     = $nome;
$emailremetente    = trim($email);
$emaildestinatario = 'propostas@fesbe.org.br';
$comcopia          = $email;
//$comcopiaoculta    = trim($_POST['comcopiaoculta']);
$assunto           = 'Conferência 2013: '.$titulo;
//$mensagem          = $_POST['mensagem'];
 $mensagem = $mensagemHTML;
//  $mensagem = $novo;

 
 
/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
// Se não houver um valor, o item não deverá ser especificado.
if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
 
/* Enviando a mensagem */
mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);
 
/* Mostrando na tela as informações enviadas por e-mail */
print "Proposta: <b>$assunto</b> enviada com sucesso!<br><br>
<p><a href='".$_SERVER["HTTP_REFERER"]."'>Voltar</a></p>"
?>