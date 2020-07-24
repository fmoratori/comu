<?
$id_atividade = $_GET['id_atividade'];
$sessao = $_POST['sessao'];
$texto = utf8_decode($_POST['texto']);
$sala = $_POST['sala'];
$vagas = $_POST['vagas'];
$valor = $_POST['valor'];

$sql_edita_atividade = "UPDATE `tb_atividades` SET `nome`='$texto', `sessao`='$sessao', `valor`='$valor', `sala`='$sala', `capacidade`='$vagas' WHERE `id`=$id_atividade;";
$res_edita_atividade = mysqlexecuta($id,$sql_edita_atividade);
echo "<meta http-equiv='refresh' content='0; url=./principal_admin.php?pg=editar_atividade.php&id_atividade=$id_atividade'>"
?>