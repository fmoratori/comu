<?
$div = $_GET['div'];

if($div==2){
$nome_evento = $_POST['nome_evento'];
$sigla_evento = $_POST['sigla_evento'];
$local = $_POST['local_evento'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];

$sql_muda_dados = "UPDATE `tb_evento` SET `nome_evento`='$nome_evento',`sigla`='$sigla_evento', `local`='$local', `inicio`='$inicio', `fim`='$fim' WHERE `id`=1;";
$res_muda_dados = mysqlexecuta($id,$sql_muda_dados);
}

if($div==3){
$inicio_inscricao = $_POST['inicio_inscricao'];
$fim_inscricao = $_POST['fim_inscricao'];
$num_trabalhos = $_POST['num_trabalhos'];

$sql_muda_dados = "UPDATE `tb_evento` SET `dia_ini_insc`='$inicio_inscricao',`dia_fim_insc`='$fim_inscricao', `num_trabalhos`='$num_trabalhos', `inicio`='$inicio', `fim`='$fim' WHERE `id`=1;";
$res_muda_dados = mysqlexecuta($id,$sql_muda_dados);
}


echo "<meta http-equiv='refresh' content='0; url=./principal_admin.php?pg=aparencia.php'>"
?>