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
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
?>
<div class="ls-box">
  <h5 class="ls-title-3">Trabalhos Por &Aacute;rea</h5>
<table class="ls-table ls-table-striped">
  <tbody>
<?
	$sql10 = "SELECT * FROM tb_areas ORDER BY id ASC";
	$res10 = mysqlexecuta($id,$sql10);
	while($row10 = mysql_fetch_array($res10)){
	$z=$row10['id'];
	$count3 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE area_id = $z AND `status`=4");
	$area =  mysql_result($count3, 0);
	echo "<tr><td>$z</td><td colspan='2'><u><a href='./trabalhos_co2.php?id_area=$z' target='_blank' style='color:blue'>".utf8_encode($row10['nome_area'])."</td><td>".$area."</a></u></td>"."</tr>";
	}
?>
  </tbody>
</table>
</div>
