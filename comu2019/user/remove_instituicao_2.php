<?
$id_trabalho = $_GET['id_trabalho'];
$id_instituicao = $_GET['id_instituicao'];
$sql_autores_inst = "SELECT * FROM `tb_autores` WHERE inst1 = $id_instituicao";
$res_autores_inst = mysqlexecuta($id,$sql_autores_inst);
    while($row_autores_inst = mysql_fetch_array($res_autores_inst)){
        $y++;
        }
if($y<1){
    $sql_remove_instituicao="DELETE FROM `fmsys_eventos`.`tb_instituicao` WHERE `id`=$id_instituicao AND `trabalho_id` = '$id_trabalho'";	
    $res_remove_instituicao = mysqlexecuta($id,$sql_remove_instituicao);	
    echo $res_remove_instituicao;
    echo "<meta http-equiv='refresh' content='0; url=./principal.php?pg=instituicoes_2.php&id_trabalho=$id_trabalho'>";
}
else{
    echo "<meta http-equiv='refresh' content='0; url=./principal.php?pg=instituicoes_2.php&id_trabalho=$id_trabalho&msg=1'>";
}
?>
