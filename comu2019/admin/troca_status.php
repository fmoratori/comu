<?
include "mysqlconecta.php";
include "mysqlexecuta.php";

$novo_status = $_POST['novo_status'];
$id_trabalho = $_GET['id_trabalho'];
if($id_trabalho!=''){
$sql_muda_status = "UPDATE `tb_trabalhos` SET `status`='$novo_status' WHERE `id`=$id_trabalho;";
$res_muda_status = mysqlexecuta($id,$sql_muda_status);
}
?>
<script>
window.close();
</script>