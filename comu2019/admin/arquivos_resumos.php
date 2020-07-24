<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#quadroTrabalho {
	width:80%;
	height:29.7cm;
	z-index:1;
/**	border:2px #333 solid;**/
	left: 10%;
	top: 2%;
	overflow: auto;
    background-color: #FFF;
}
#quadroTrabalho2 {
	position:absolute;
	width:90%;
	z-index:1;
	left: 5%;
	top: 2%;
	overflow: auto;
    background-color: #FFF;
}
</style>
<div id="quadroTrabalho2">

<?
$area = $_POST['area'];
$num_ini = $_POST['inicio'];
$num_fim = $_POST['fim'];
$id_trabalho = $_GET['id_trabalho'];
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
//include "../verifica_sessao.php";
$sql = "SELECT * FROM tb_evento";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res);

$sql30 = "SELECT * FROM `tb_trabalhos` WHERE `area_id`= $area AND `painel` BETWEEN $num_ini AND $num_fim ORDER BY `painel`";
$res30 = mysqlexecuta($id,$sql30);

while($row30 = mysql_fetch_array($res30)){
	$id_trabalho = $row30['id'];
?>
<div id="quadroTrabalho">

<?
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
if($row30['comite'] != ""){
$comite_etica = $row30['comite'];
}
if($row30['ceh'] != ""){
$comite_etica = $row30['ceh'];
}
if($row30['cea'] != ""){
$comite_etica = $row30['cea'];
}
if($row30['justifique'] != ""){
$comite_etica = $row30['justifique'];
}
$area_painel = $row30['area_id'];
if($area_painel<10){
 $area_nova = '0'.$area_painel;	
}
else{
 $area_nova = $area_painel;
}
//echo "<br />";
echo "<center><b>".$area_nova.".".$row30['painel']." - ".utf8_encode($row30['titulo'])."</b></center>";
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
echo "<p>".utf8_encode($row30['metodos'])."</p>";
echo "<p><b>Resultados:</b></p>";	
echo "<p>".utf8_encode($row30['resultados'])."</p>";
echo "<p><b>Conclusão:</b></p>";	
echo "<p>".utf8_encode($row30['conclusao'])."</p>";
if($row30['premio']==6){
echo "<p><b>Comitê de Ética:</b></p>";
echo "<p>".utf8_encode($comite_etica)."</p>";
}
echo "<p><b>Apoio Financeiro:</b></p>";	
echo "<p>".utf8_encode($row30['apoio'])."</p>";
$hora = date("Y-n-j H:i:s");
//echo "Gerado em: ".$hora;
?>
</div>
<br />****************QUEBRA****************<br />
<?
}
?>
</div>