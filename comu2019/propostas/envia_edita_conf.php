<?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
$date = date("d/m/Y h:i");
$valida = $_GET['valida'];
$nome = $_POST['nome'];
$doc_proponente = $_POST['doc_proponente'];
$cargo = $_POST['cargo'];
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
$midia = $_POST['midia'];
$justif = $_POST['justif'];
$ciencia_insc = $_POST['ciencia_insc'];
$ciencia_dados = $POST['ciencia_dados'];
$ciencia_declaracao = $_POST['ciencia_declaracao'];


//if ($nome != "" && $email != "" && $telefone != "" && $titulo != "" && isset($_POST['ciencia_insc']) && isset($_POST['ciencia_dados']) && isset($_POST['ciencia_declaracao'])){

if(1==1){
$sql = "UPDATE `tb_propostas_conf` SET `nome_prop`='$nome',`doc_prop`='$doc_proponente',`cargo_prop`='$cargo',`email_prop`='$email',`tel_prop`='$telefone', `inst_prop`='$inst',`sociedade_prop`='$soc_proponente',`titulo_conf`='$titulo',`prof_aula1`='$nome_conf',`doc_aula1`='$doc_conf',`email_aula1`='$email_conf',`inst_aula1`='$inst_conf',`depto_aula1`='$depto_conf',`end_aula1`='$end',`cep_aula1`='$codigo_postal',`pais_aula1`='$pais',`tel_aula1`='$tel',`cel_aula1`='$cel',`midia`='$midia', `justificativa`='$justif' WHERE valida LIKE '$valida';";
$res = mysqlexecuta($id,$sql);		

$mensagemHTML = "
<div class='ls-alert-success'><strong><center>Proposta Enviada com Sucesso!</strong> Este é seu código de envio, guarde-o caso deseje realizar alguma alteração.</center><br />
<center>Código de Envio: <b>$valida</b></center> </div>
<h3>ISTO É APENAS UMA CONFIRMAÇÃO DO ENVIO DA SUA PROPOSTA.</h3><BR />
DADOS DO PROPONENTE <br />

Nome: $nome <br />

Documento: $doc_proponente<br />

Cargo/Função: $cargo <br />

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

Autoriza a divulgação do seu trabalho na mídia? $midia<br />

ENVIADO EM: $date <br />

<b>Declaro que tenho ciência que deverei fazer a minha inscrição para participar da Reunião Anual da FeSBE, caso a presente proposta seja aceita.</b><br />

<b>Concordo e responsabilizo-me por todas as informações contidas no presente formulário. Caso a presente proposta seja aceita, comprometo-me a participar de outras atividades da reunião da FeSBE, se convocado, tais como avaliação de painéis e coordenação de sessões científicas.</b><br />

<b> Declaro também que informei aos demais membros desta proposta acerca deste compromisso com a reunião da FeSBE, com o qual concordaram.</b>



";


print $mensagemHTML;

	}

	else{

	echo '<script> alert("Existem Campos Obrigatórios Não preenchidos!");</script>';

	$volta = "<script>javascript:history.back(-1)</script>";

	echo $volta;

	}

?>