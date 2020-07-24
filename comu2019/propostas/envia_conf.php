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
$nome = $_POST['nome'];
$doc_proponente = $_POST['doc_proponente'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['cel_prop'];
$inst = $_POST['inst'];
$soc_proponente = $_POST['sociedade'];
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
$igual_prop = $_POST['igual_prop'];

//if ($nome != "" && $email != "" && $telefone != "" && $titulo != "" && isset($_POST['ciencia_insc']) && isset($_POST['ciencia_dados']) && isset($_POST['ciencia_declaracao'])){
if(1==1){
if($_POST['igual_prop']!='dif'){
    $nome_conf = $nome;
    $doc_conf = $doc_proponente;
    $email_conf = $email;
    $tel = $telefone;
    $cel = $celular;
    $inst_conf = $inst;
    $depto_conf = $departamento;
}

$sql = "INSERT INTO `tb_propostas_conf_2018` SET `nome_prop`='$nome',`doc_prop`='$doc_proponente',`cargo_prop`='$cargo',`email_prop`='$email',`tel_prop`='$telefone', `cel_prop`='$celular', `inst_prop`='$inst',`sociedade_prop`='$soc_proponente',`titulo_conf`='$titulo',`prof_aula1`='$nome_conf',`doc_aula1`='$doc_conf',`email_aula1`='$email_conf',`inst_aula1`='$inst_conf',`depto_aula1`='$depto_conf',`end_aula1`='$end',`cep_aula1`='$codigo_postal',`pais_aula1`='$pais',`tel_aula1`='$tel',`cel_aula1`='$cel',`midia`='$midia', `justificativa`='$justif',`valida`='$valida',`updated_on`='$date';";
$res = mysqlexecuta($id,$sql);		
$idDaInsert = mysql_insert_id();
$valida = $idDaInsert;
$mensagemHTML = "
<div class='ls-alert-success'><strong><center>Proposta Enviada com Sucesso!</strong> Este é seu código de envio.</center><br />
<center>Código de Envio: <b>2018.0$valida</b></center> </div>
<h3>ISTO É APENAS UMA CONFIRMAÇÃO DO ENVIO DA SUA PROPOSTA.</h3><BR />
DADOS DO PROPONENTE <br />
Nome: $nome<br />
Documento: $doc_proponente<br />
Cargo/Função: $cargo <br />
Email: $email <br />
Telefone: $telefone <br />
Celular: $celular<br />
Instituicao: $inst <br />
Sociedade proponente: $soc_proponente <br />
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
echo "<br /><br /><h3><a href='http://fmsys.com.br/fmsys/fesbe/2018/propostas/propostas.php'>Enviar Uma Nova Proposta</a></h3><br /><br /><br />";
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