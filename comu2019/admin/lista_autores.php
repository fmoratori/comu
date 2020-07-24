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
$sql = "SELECT * FROM `tb_autores` WHERE trabalho_id IN (SELECT id FROM tb_trabalhos WHERE status = 4 AND painel!='') GROUP BY nome_cientifico";
$res = mysqlexecuta($id,$sql);
?>
<table>
<?
while ($row = mysql_fetch_array($res)) {
    $autor = $row['nome_cientifico'];
	echo "<p><span class='uppercase'>".$autor."***";
	$sql2 = "SELECT * FROM `tb_autores` WHERE `nome_cientifico` LIKE '$autor' AND trabalho_id IN (SELECT id FROM tb_trabalhos WHERE status = 4 AND `painel`!='')";
	$res2 = mysqlexecuta($id,$sql2);
	$ids=0;
	
	while($row2 = mysql_fetch_array($res2)){
		$ids=$ids.", ".$row2['trabalho_id'];
		//echo "<td>".$ids."</td>";
		//$num_trab = $num_trab.", ".$row2['trab_id'];
		}
	$sql3 = "SELECT * FROM `tb_trabalhos` WHERE `id` IN ($ids)";
	$res3 = mysqlexecuta($id,$sql3);
	$x=0;
	while($row3=mysql_fetch_array($res3)){



			if($row3['painel']<10){
                $painel = '00'.$row3['painel'];
            }
            if($row3['painel']>9 && $row3['painel']<100){
                $painel = '0'.$row3['painel'];
            }
            
            

            if($row3['area_id']<10){
				$area_id = '0'.$row3['area_id'];	
				}
			else{
				$area_id = $row3['area_id'];	
				}
	//	$num_apres = $area_id.'.'.$row3['painel'];
       	$num_apres = $area_id.'.'.$painel;
		$num[$x] = $num_apres;
		//echo ;
		//echo $num_apres;
		$x++;
	}
	$y=0;
	sort($num);
	echo " ";
	while($y<=$x){
		echo $num[$y].",&nbsp;";
		$y++;
		}
		$num="";
		$z=0;
		while($z<=$x){
			//$num[$z]='';
			$z++;
			}
		echo "</p> ";
	//echo "</tr>";
		$x=0;
}
?>
</table>