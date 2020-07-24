<?
$sessao = $_POST['sessao'];
$texto = utf8_decode($_POST['texto']);
$sala = $_POST['sala'];
$vagas = $_POST['vagas'];

$sql_salva_atividade = "INSERT INTO `tb_atividades` SET `nome`='$texto', `sala`='$sala', `capacidade`=$vagas, `sessao`='$sessao';";
$res_salva_atividade = mysqlexecuta($id,$sql_salva_atividade);

echo "<meta http-equiv='refresh' content='0; url=./principal_admin.php?pg=cria_atividade.php'>"
?>