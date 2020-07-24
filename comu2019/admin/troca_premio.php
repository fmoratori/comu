<?
include "mysqlconecta.php";
include "mysqlexecuta.php";

$novo_premio = $_POST['novo_premio'];
$id_trabalho = $_GET['id_trabalho'];
if($id_trabalho!=''){
$sql_muda_premio = "UPDATE `tb_trabalhos` SET `premio`='$novo_premio' WHERE `id`=$id_trabalho;";
$res_muda_premio = mysqlexecuta($id,$sql_muda_premio);
}
?>
<script>
window.close();
</script>