<!DOCTYPE html>
<?
include './mysqlconecta.php';
include './mysqlexecuta.php';
$idioma = $_GET['idioma'];
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 $vowels = array("?idioma=1","?idioma=2","?idioma=3");
 $url = str_replace($vowels, "", $url);
  $vowels = array("&idioma=1","&idioma=2","&idioma=3");
 $url = str_replace($vowels, "", $url);
$pg = $_GET['pg'];
if($cor==''){
    $cor = 'ls-theme-purple';
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

  <body>
    <div class="ls-topbar ">

  <!-- Barra de Notificações -->
  <div class="ls-notification-topbar">

  <a href="<? echo $url.'&idioma=1'; ?>"><img src="./images/pt-br.png" /></a>&nbsp;&nbsp;<a href="<? echo $url.'&idioma=2'; ?>"><img src="./images/en.png" /></a>&nbsp;&nbsp;<a href="<? echo $url.'&idioma=3'; ?>"><img src="./images/es.png" /></a>

  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>


  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="home" class="ls-ico-earth">
        <small>FMSYS</small>
        <? echo $row_evento['sigla']; ?>
      </a>
    </h1>

  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>

    <aside class="ls-sidebar">

  <div class="ls-sidebar-inner">

  </div>
</aside>


  <main class="ls-main">
      <div class="container-fluid">
<?
if($pg!=''){
    include $pg;
}
else{
    include 'form1.php';    
}
?>
      </div>
    </main>


    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.8.4/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>