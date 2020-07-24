<?
include './mysqlconecta.php';
include './mysqlexecuta.php';
$id_trabalho=$_GET['id_trabalho'];
$sql30 = "SELECT * FROM `tb_trabalhos` WHERE `id`= $id_trabalho";
$res30 = mysqlexecuta($id,$sql30);
$row30 = mysql_fetch_array($res30);

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
echo "<p><b>Resumo:</b></p>";	
echo "<p>".nl2br(utf8_encode($row30['introducao']))."</p>";

/**
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
**/
?>