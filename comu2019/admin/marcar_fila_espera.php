<?
$sql_ativ4 = "SELECT * FROM `tb_atividades` ORDER BY id ASC";
$res_ativ4 = mysqlexecuta($id,$sql_ativ4);

while($row_ativ4 = mysql_fetch_array($res_ativ4)){

echo $ativ = $row_ativ4['id'];
//$ativ = 106;
$count2 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE categoria=$ativ AND situacao!='cancelada' ORDER BY id ASC");
$inscritos2 =  mysql_result($count2, 0);
$sql_ativ = "SELECT * FROM tb_atividades WHERE id = $ativ";
$res_ativ = mysqlexecuta($id,$sql_ativ);
$row_ativ = mysql_fetch_array($res_ativ);

$sql_ativ2 = "SELECT * FROM `tb_boleto` WHERE categoria=$ativ AND situacao!='cancelada' ORDER BY id ASC";
$res_ativ2 = mysqlexecuta($id,$sql_ativ2);
$t=1;
while($row_ativ2 = mysql_fetch_array($res_ativ2)){

echo $t." - - ";
$lista_espera=0;
echo $row_ativ2['id']." - ".$row_ativ2['situacao'];
$boleto = $row_ativ2['id'];
if($t>$row_ativ['capacidade']){
     $diferenca = $inscritos2 - $row_ativ['capacidade'];
    echo " - ESPERA";
    $lista_espera=1;
    $sql_ativ3="UPDATE `tb_boleto` SET `lista`='1' WHERE `id`=$boleto";	
    $res_ativ3 = mysqlexecuta($id,$sql_ativ3);
    
}

echo "<br />";
$t++;
}
//echo "TESTE _ _ ".$diferenca;
}
?>