<!DOCTYPE html>

<html class="<? echo $row_evento['cor']; ?>">

  <head>

    <title>FMSYS</title>

    <meta charset="UTF-8">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="Insira aqui a descrição da página.">

    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">

    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">

    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">

  </head>

  <body>
<?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
$area = $_GET['id_area'];

$sql = "SELECT * FROM tb_evento";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res);

$sql30 = "SELECT * FROM `tb_trabalhos` WHERE `area_id`=$area AND `status`=4 ORDER BY `painel` ASC";
$res30 = mysqlexecuta($id,$sql30);
$div = 0;

$sql_area = "SELECT * FROM tb_areas WHERE id = $area";
$res_area = mysqlexecuta($id,$sql_area);
$row_area = mysql_fetch_array($res_area);

?>
<h1 class="ls-title-intro ls-ico-user"><? echo utf8_encode($row_area['nome_area']); ?></h1>

<div class="ls-box">

  <main class="ls-main-full">

      <div>

<?

while($row30 = mysql_fetch_array($res30)){

$id_trabalho = $row30['id'];

$sql5 = "SELECT * FROM `tb_instituicao` WHERE `trabalho_id`= $id_trabalho ORDER BY `id` ASC";

$res5 = mysqlexecuta($id,$sql5);

//$row5 = mysql_fetch_array($res5);



$sql6 = "SELECT * FROM `tb_autores` WHERE `trabalho_id`= $id_trabalho ORDER BY `ordenacao` ASC";

$res6 = mysqlexecuta($id,$sql6);

$autores = "";

$id_inst = "";



while($row6 = mysql_fetch_array($res6)){

	$autores = $autores.$row6['nome_cientifico'].", ";

	$id_inst = $id_inst.$row6['inst1'].",".$row6['inst2'].",".$row6['inst3'];

	}

$sql7 = "SELECT DISTINCT depto,sigla_inst FROM `tb_instituicao` WHERE `id` IN ($id_inst)";

$res7 = mysqlexecuta($id,$sql7);

$comite_etica = utf8_decode("");



if($row30['ceh'] != ""){

$comite_etica = $row30['ceh'];

}

if($row30['cea'] != ""){

$comite_etica = $row30['cea'];

}

if($row30['justifique'] != ""){

$comite_etica = $row30['justifique'];

}


if($row30['area_id']<10){
	$area_id = '0'.$row30['area_id'];
}
else{
	$area_id = $row30['area_id'];
}

echo   "<div data-ls-module='collapse' data-target='#$id_trabalho' class='ls-collapse'>";





echo     "<a href='#' class='ls-collapse-header'>";

echo     "<h3 class='ls-collapse-title'><center> ".$area_id.".".$row30['painel']."<br />".utf8_encode($row30['titulo'])."</center></h3></a><div class='ls-collapse-body' id='$id_trabalho'>";

echo "<center><b>".utf8_encode($autores)."<br/>";

while($row7 = mysql_fetch_array($res7)){

echo utf8_encode($row7['depto'])." - ".utf8_encode($row7['sigla_inst'])." ";

	}	

echo "</b></center>";

echo "<p><b>Introdução:</b></p>";	

echo "<p>".utf8_encode($row30['introducao'])."</p>";

echo "<p><b>Objetivos:</b></p>";	

echo "<p>".utf8_encode($row30['objetivos'])."</p>";

echo "<p><b>Métodos:</b></p>";	

echo "<p>".utf8_encode($comite_etica)."  ".utf8_encode($row30['metodos'])."</p>";

echo "<p><b>Resultados:</b></p>";	

echo "<p>".utf8_encode($row30['resultados'])."</p>";

echo "<p><b>Conclusão:</b></p>";	

echo "<p>".utf8_encode($row30['conclusao'])."</p>";

echo "<p><b>Apoio Financeiro:</b></p>";	

echo "<p>".utf8_encode($row30['apoio'])."</p>";



echo    "</div></div>";





$teste++;



?>



<?

}



?>

</div></main></div>

    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

    <script src="http://assets.locaweb.com.br/locastyle/3.8.4/javascripts/locastyle.js" type="text/javascript"></script>



</body>

</html>