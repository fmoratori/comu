<?
$sql_usp = "SELECT * FROM tb_usuario";
$res_usp = mysqlexecuta($id,$sql_usp);

while($row_usp = mysql_fetch_array($res_usp)){
$id_usuario = $row_usp['id'];


    $count_boleto122 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE `user_id`=$id_usuario");
    $inscritos_boleto122 =  mysql_result($count_boleto122, 0);

echo $row_usp['nome']." - ".$inscritos_boleto122."<br /><br />";

}
?>