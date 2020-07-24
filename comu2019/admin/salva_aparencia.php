<?
$cor = $_POST['cor'];
if($cor!=''){
$sql_muda_cor = "UPDATE `tb_evento` SET `cor`='$cor' WHERE `id`=1;";
$res_muda_cor = mysqlexecuta($id,$sql_muda_cor);
}
echo "<meta http-equiv='refresh' content='0; url=./principal_admin.php?pg=aparencia.php'>"
?>