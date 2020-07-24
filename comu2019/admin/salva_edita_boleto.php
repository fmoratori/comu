<?
$id_boleto = $_GET['id_boleto'];
$id_usuario = $_POST['id_usuario'];
$referente = utf8_decode($_POST['referente']);
$valor = $_POST['valor'];
$vencimento = $_POST['vencimento'];
$situacao = $_POST['situacao'];
$observacao = $_POST['observacao'];

$sql_insere_boleto="UPDATE `tb_boleto` SET `referente`='$referente',`valor`='$valor',`vencimento`='$vencimento',`situacao`='$situacao',`observacao`='$observacao' WHERE `id`='$id_boleto';";
$res_insere_boleto = mysqlexecuta($id,$sql_insere_boleto);
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=boletos.php&id_inscrito=<? echo $id_usuario; ?>">
