<!DOCTYPE html>
<html class="ls-theme-dark-yellow">
  <head>
    <title>Propostas - FeSBE</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
  <body>
    <div class="ls-topbar ">

  <!-- Barra de Notificações -->
  <div class="ls-notification-topbar">

    <!-- Links de apoio -->
    <div class="ls-alerts-list">
      <!--a href="#" class="ls-ico-bell-o" data-counter="8" data-ls-module="topbarCurtain" data-target="#ls-notification-curtain"><span>Notificações</span></a-->
      <!--a href="#" class="ls-ico-bullhorn" data-ls-module="topbarCurtain" data-target="#ls-help-curtain"><span>Ajuda</span></a-->
      <!--a href="#" class="ls-ico-question" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"><span>Sugestões</span></a-->
    </div>

    <!-- Dropdown com detalhes da conta de usuário -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <!--a href="#" class="ls-ico-user"-->
        <!--img src="/fmsys/struct/images/locastyle/avatar-example.jpg" alt="" /-->
        <!--span class="ls-name"><? echo utf8_encode($row_usuario['nome']); ?></span>
      </a-->

      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <!--li><a href="#">Meus dados</a></li>
          <li><a href="#">Faturas</a></li>
          <li><a href="#">Planos</a></li-->
          <li><a href="logout.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

  <!--a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-next"><span class="ls-text">Voltar à lista de serviços</span></a-->

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <!--a href="home" class="ls-ico-earth"-->
        <!--small>FeSBE</small--->
        <? // echo $row_evento['sigla']; ?>
      </a>
    </h1>

  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>


    <aside class="ls-sidebar">

  <!--div class="ls-sidebar-inner"-->
<!-- <a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>--->
</aside>
  <main class="ls-main ">
      <div class="container-fluid">

<?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
$date = date("d/m/Y h:i");
$valida = base64_encode($date); 
$nome = $_POST['nome_prop'];
$doc_proponente = $_POST['doc_prop'];
$cargo = $_POST['cargo'];
$email = $_POST['email_prop'];
$telefone = $_POST['tel_prop'];
$inst = $_POST['inst_prop'];
$soc_proponente = $_POST['sociedade'];
$cel_prop=$_POST['cel_prop'];
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

$midia = $_POST['midia'];
$justif1 = $_POST['justif'];
$justif = str_replace("'", "*!", $justif1);
$ciencia_insc = $_POST['ciencia_insc'];
$ciencia_dados = $POST['ciencia_dados'];
$ciencia_declaracao = $_POST['ciencia_declaracao'];

//if ($nome != "" && $email != "" && $telefone != "" && $titulo != "" && isset($_POST['ciencia_insc']) && isset($_POST['ciencia_dados']) && isset($_POST['ciencia_declaracao'])){
if(1==1){
if($_POST['igual_prop']!='dif'){
    $nome_coord = $nome;
    $doc_coord = $doc_proponente;
    $email_coord = $email;
    $tel_coord = $telefone;
    $cel_coord = $cel_prop;
    $inst_coord = $inst;
    $depto_coord = $departamento;
}
if($_POST['igual_prop1']!='dif'){
$nome_conf_1 = $nome;
$doc_conf_1 = $doc_proponente;
$email_conf_1 = $email;
$inst_conf_1 = $inst;
$depto_conf_1 = $departamento;
$tel_1 = $telefone;
$cel_1 = $cel_prop;
}
if($_POST['igual_prop2']!='dif'){
$nome_conf_2 = $nome;
$doc_conf_2 = $doc_proponente;
$email_conf_2 = $email;
$inst_conf_2 = $inst;
$depto_conf_2 = $departamento;
$tel_2 = $telefone;
$cel_2 = $cel_prop;
}

$sql = "INSERT INTO `tb_propostas_mt_2018` SET `nome_prop`='$nome',`doc_prop`='$doc_proponente',`cargo_prop`='$cargo',`email_prop`='$email',`tel_prop`='$telefone', `cel_prop`='$cel_prop',`inst_prop` = '$inst', `sociedade_prop`='$soc_proponente',`nome_coord`='$nome_coord',`doc_coord`='$doc_coord',`email_coord`='$email_coord',`inst_coord`='$inst_coord',`depto_coord`='$depto_coord',`end_coord`='$end_coord',`cep_coord`='$codigo_postal_coord',`pais_coord`='$pais_coord',`tel_coord`='$tel_coord',`cel_coord`='$cel_coord',`titulo_mt`='$titulo',`titulo_aula1`='$titulo_1',`prof_aula1`='$nome_conf_1',`doc_aula1`='$doc_conf_1',`email_aula1`='$email_conf_1',`inst_aula1`='$inst_conf_1',`depto_aula1`='$depto_conf_1',`end_aula1`='$end_1',`cep_aula1`='$codigo_postal_1',`pais_aula1`='$pais_1',`tel_aula1`='$tel_1',`cel_aula1`='$cel_1',`titulo_aula2`='$titulo_2',`prof_aula2`='$nome_conf_2',`doc_aula2`='$doc_conf_2',`email_aula2`='$email_conf_2',`inst_aula2`='$inst_conf_2',`depto_aula2`='$depto_conf_2',`end_aula2`='$end_2',`cep_aula2`='$codigo_postal_2',`pais_aula2`='$pais_2',`tel_aula2`='$tel_2',`cel_aula2`='$cel_2', `midia` = '$midia',`justificativa`='$justif',`valida`='$valida',`updated_on`='$date';";
$res = mysqlexecuta($id,$sql);
$idDaInsert = mysql_insert_id();
$valida = $idDaInsert;



$mensagemHTML = "
<div class='ls-alert-success'><strong><center>Proposta Enviada com Sucesso!</strong> Este é seu código de envio.</center><br />
<center>Código de Envio: <b>2018.0$valida</b></center> </div>
<h3>ISTO É APENAS UMA CONFIRMAÇÃO DO ENVIO DA SUA PROPOSTA.</h3><BR />
DADOS DO PROPONENTE <br />
Nome: $nome <br />
Documento: $doc_proponente<br />
Cargo/Função: $cargo <br />
Email: $email <br />
Telefone: $telefone <br />
Celular: $cel_prop <br />
Instituicao: $inst <br />
Sociedade proponente: $soc_proponente <br />
<br />
<b>COORDENADOR</b><br />

Nome: $nome_coord <br />
Documento: $doc_coord<br />
Email: $email_coord<br />
Instituicao: $inst_coord <br />
Depto: $depto_coord <br />
Telefone: $tel_coord<br />
Celular: $cel_coord<br />
<br />

<b>TÍTULO DO MÓDULO:</b> $titulo <br /><br />

DADOS DA CONFERÊNCIA PLENA <br />

TÍTULO: $titulo_1 <br />
Nome Conferencista:	$nome_conf_1 <br />
Documento Conferencista (CPF ou Passaporte):$doc_conf_1 <br />
E-mail Conferencista: $email_conf_1 <br />
Instituição: $inst_conf_1 <br />
Depto:	$depto_conf_1 <br />
Telefone:	$tel_1 <br />
Celular:	$cel_1 <br />

DADOS DA MINI CONFERENCIA<br />
<br />
TÍTULO: $titulo_2 <br />
Nome Conferencista:	$nome_conf_2 <br />
Documento Conferencista (CPF ou Passaporte):$doc_conf_2 <br />
E-mail Conferencista: $email_conf_2 <br />
Instituição: $inst_conf_2 <br />
Depto:	$depto_conf_2 <br />
Telefone:	$tel_2 <br />
Celular:	$cel_2 <br />
Justificativa: $justif <br />
Autoriza a divulgação do seu trabalho na mídia? $midia<br />
<b>Declaro que tenho ciência que deverei fazer a minha inscrição para participar da Reunião Anual da FeSBE, caso a presente proposta seja aceita.</b><br />
<b>Concordo e responsabilizo-me por todas as informações contidas no presente formulário. Caso a presente proposta seja aceita, comprometo-me a participar de outras atividades da reunião da FeSBE, se convocado, tais como avaliação de painéis e coordenação de sessões científicas.</b><br />
<b> Declaro também que informei aos demais membros desta proposta acerca deste compromisso com a reunião da FeSBE, com o qual concordaram.</b>
ENVIADO EM: $date <br />
";


print $mensagemHTML;
echo "<br /><br /><h3><a href='http://fmsys.com.br/fmsys/fesbe/2/propostas/propostas.php'>Enviar Uma Nova Proposta</a></h3><br /><br /><br />";
	}
	else{
	echo '<script> alert("Existem Campos Obrigatórios Não preenchidos!");</script>';
	$volta = "<script>javascript:history.back(-1)</script>";
	echo $volta;
	}

?>
</div>
      </div>
    </main>
    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.8.4/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>