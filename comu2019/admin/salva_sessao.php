<?
$nome = $_POST['nome_sessao'];
$sigla_sessao = $_POST['sigla_sessao'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fim = $_POST['hora_fim'];


$sql_salva_sessao = "INSERT INTO `tb_sessao` SET `nome`='$nome', `sigla`='$sigla_sessao', `data_inicio`='$data_inicio', `data_fim`='$data_fim', `hora_inicio`='$hora_inicio', `hora_fim`='$hora_fim';";
$res_salva_sessao = mysqlexecuta($id,$sql_salva_sessao);

echo "<meta http-equiv='refresh' content='0; url=./principal_admin.php?pg=cria_sessao.php'>"
?>