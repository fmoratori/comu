<?
$id_usuario = $_POST['id_usuario'];
$referente = $_POST['referente'];
$valor = $_POST['valor'];
$vencimento = $_POST['vencimento'];
$situacao = 'NP';

$sql_insere_boleto="INSERT INTO `tb_boleto` (`id`, `user_id`, `referente`, `valor`, `vencimento`, `situacao`) VALUES (NULL, '$id_usuario', '$referente', '$valor', '$vencimento', '$situacao')";
$res_insere_boleto = mysqlexecuta($id,$sql_insere_boleto);
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=boletos.php&id_inscrito=<? echo $id_usuario; ?>">
