<?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
$area = $_GET['id_area'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#quadroTrabalho {
    position: relative;
	width:80%;
	height:29.7cm;
	z-index:1;
	border:2px #333 solid;
	left: 10%;
	top: 2%;
	overflow: auto;
    background-color: #FFF;
}
#quadroTrabalho2 {
	width:90%;
	z-index:1;
	left: 5%;
	overflow: auto;
    background-color: #FFF;
}
</style>

<?



//include "../verifica_sessao.php";
$sql = "SELECT * FROM tb_evento";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res);
	$sql10 = "SELECT * FROM tb_areas WHERE id < 26 ORDER BY id ASC";
	$res10 = mysqlexecuta($id,$sql10);
	while($row10 = mysql_fetch_array($res10)){
	$area=$row10['id'];
    $tem_trabalho=0;
$sql30 = "SELECT * FROM `tb_trabalhos` WHERE `area_id`=$area AND `status`=3 AND premio=6 ORDER BY `id` ASC";
$res30 = mysqlexecuta($id,$sql30);
while($row30 = mysql_fetch_array($res30)){

if($tem_trabalho==0){
        echo "<br /><br /><h2><center><b>".$row10['id']." - ".utf8_encode($row10['nome_area'])."</b></center></h2><br /><br />";
$tem_trabalho++;
}

?>
<div id="quadroTrabalho">
<div id="quadroTrabalho2">

<?
$id_trabalho = $row30['id'];
echo "<center><b>ID do Trabalho: ".$id_trabalho."</b></center><br /><br />";
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



echo "<center><b>".utf8_encode($row30['titulo'])."</b></center>";
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
$hora = date("Y-n-j H:i:s");
//echo "Gerado em: ".$hora;


?>
</div></div><br />
<?
}

}
?>
