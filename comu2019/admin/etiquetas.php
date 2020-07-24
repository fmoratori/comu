<head>

<style type="text/css">



<!--

.uppercase {

    text-transform: uppercase;

}

-->

</style>

</head>

<?

include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL



$sql8 = "SELECT * FROM `tb_sessao` ORDER BY id ASC";

$res8 = mysqlexecuta($id,$sql8);



while($row8 = mysql_fetch_array($res8)){

    $total_sessao=0;

$sessao = $row8['id'];

$data_inicio = date('d/m/Y', strtotime($row8['data_inicio']));
echo "<table border='1'>";
echo "<tr><td colspan='3'><p align='center'><b>".$row8['nome']." - ".$data_inicio." - ".$row8['hora_inicio']."-".$row8['hora_fim']."</b></p></td></tr>";



//$sql4 = "SELECT * FROM `tb_areas`";

$sql4 = "SELECT * FROM `tb_areas` WHERE id < 23 ORDER BY id ASC";

$res4 = mysqlexecuta($id,$sql4);

$tot_area=0;







while($row4 = mysql_fetch_array($res4)){

	$area=$row4['id'];



$sql = "SELECT * FROM `tb_trabalhos` WHERE area_id=$area AND status LIKE '4' AND sessao_id='$sessao' ORDER BY painel ASC";
$res = mysqlexecuta($id,$sql);
$sql3 = "SELECT * FROM `tb_areas` WHERE id = $area";
$res3 = mysqlexecuta($id,$sql3);
$row3 = mysql_fetch_array($res3);

	$count = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE area_id=$area AND status LIKE '4' AND sessao_id=$sessao ORDER BY painel ASC");
	$inscritos =  mysql_result($count, 0);
if($inscritos!=0){	
echo "<tr><td colspan='3'><b><center>".$row4['id']." - ".$row4['nome_area']."</center></b></td></tr>";
}
?>

<html>

<body>



<!--table height="48" border="1" bordercolor="#000000" bgcolor="#FFFFFF" width="100%"-->

<?



 //Exibe as linhas encontradas na consulta

$tot_area=0;

while ($row = mysql_fetch_array($res)) {

$tot_area++;	

$total_sessao++;	

$contagem = $contagem+1;

$id_trabalho = $row['id'];

if($row['area_id']<10){

$area_id='0'.$row['area_id'];

}

else{

$area_id=$row['area_id'];

}

$sql5 = "SELECT * FROM `tb_instituicao` WHERE `trabalho_id`= $id_trabalho ORDER BY `id` ASC";

$res5 = mysqlexecuta($id,$sql5);

//$row5 = mysql_fetch_array($res5);



$titulo = $row['titulo'];

?>

<p>

   <tr>
	<? echo "<td>".$row['id']."</td><td>".$area_id.".".$row['painel']."</td><td><span class='uppercase'>".trim($titulo)."</span>.</td>" ?>
	</tr>
    

   

   <?

}

//   echo "<br /><br />------------------------------".$tot_area."----------------------------------<br /><br />";


?>

</p>

<!--/tr-->

<!--/table-->

<?

}

   echo "<tr><td colspan='3'>------------------------------TOTAL SESS&Atilde;O: ".$total_sessao."----------------------------------</td></tr>";
echo "</table>";



}

   ?>

</body></html>





