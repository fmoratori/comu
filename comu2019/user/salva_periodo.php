<?
$periodo = $_POST['periodo'];
$cpf_altera_dados = $row_usuario['cpf'];
$sql_salva_alteracao = "UPDATE `tb_usuario` SET `periodo`='$periodo' WHERE `cpf`=$cpf_altera_dados";
$res_salva_alteracao = mysqlexecuta($id,$sql_salva_alteracao);



?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=atividades2.php">