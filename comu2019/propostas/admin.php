<?
$pg = $_GET['pg'];

?>
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
if($pg!=''){
    include $pg;
}
else{
    include 'mysqlconecta.php';
    include 'mysqlexecuta.php';
    $count_conf = mysql_query("SELECT COUNT(*) FROM `tb_propostas_conf_2018`");
	$conf =  mysql_result($count_conf, 0);

    $count_simp = mysql_query("SELECT COUNT(*) FROM `tb_propostas_simp_2018`");
	$simp =  mysql_result($count_simp, 0);
    
    $count_mt = mysql_query("SELECT COUNT(*) FROM `tb_propostas_mt_2018`");
	$mt =  mysql_result($count_mt, 0);

    $count_curso = mysql_query("SELECT COUNT(*) FROM `tb_propostas_curso_2018`");
	$curso =  mysql_result($count_curso, 0);

?><br /><br />
<div class="ls-box"><a href="http://fmsys.com.br/fmsys/fesbe/2018/propostas/admin.php?pg=lista_conf.php" target="_blank">Propostas Conferência <div align='right'><? echo $conf; ?></div></a></div>
<div class="ls-box"><a href="http://fmsys.com.br/fmsys/fesbe/2018/propostas/admin.php?pg=lista_simp.php" target="_blank">Propostas Simpósio <div align='right'><? echo $simp; ?></div></a></div>
<div class="ls-box"><a href="http://fmsys.com.br/fmsys/fesbe/2018/propostas/admin.php?pg=lista_mt1.php" target="_blank">Propostas Módulo Temático<div align='right'><? echo $mt; ?></div></a></div>
<div class="ls-box"><a href="http://fmsys.com.br/fmsys/fesbe/2018/propostas/admin.php?pg=lista_curso.php" target="_blank">Propostas Curso<div align='right'><? echo $curso; ?></div></a></div>

    <?    
}
?>


<!--
        <p>Este é nosso boilerplate com a estrutura inicial de um projeto. Você pode <a href="http://locaweb.github.io/locawebstyle/documentacao/exemplos/">ver exemplos completos neste link</a>.</p>
        <p>Confira nossa <a href="http://locaweb.github.io/locawebstyle/documentacao/componentes/">documentação com os componentes</a> que você usar aqui.</p>
        <hr>
        <h6 class="ls-title-5">English disclaimer</h6>
        <p>This is your boilerplate with start structure. You can see <a href="http://locaweb.github.io/locawebstyle/documentacao/exemplos/">completed examples here</a>.</p>
        <p>Check out the docs to <a href="http://locaweb.github.io/locawebstyle/documentacao/componentes/">see the components that you can use</a>.</p>
-->
      </div>
    </main>



    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.8.4/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>