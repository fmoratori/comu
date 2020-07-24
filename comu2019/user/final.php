<?
$id_trabalho = $_GET['id_trabalho'];
$link = $_SESSION['link'];

    $sql_finaliza_envio="UPDATE `tb_trabalhos` SET `status`='3', `link`='$link' WHERE `id`=$id_trabalho;";	
    $res_finaliza_envio = mysqlexecuta($id,$sql_finaliza_envio);	
    echo "<meta http-equiv='refresh' content='0; url=./principal.php?pg=finalizado.php&id_trabalho=$id_trabalho'>";

?>