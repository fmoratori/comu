<?
$id_trabalho = $_GET['id_trabalho'];
$departamento = $_POST['departamento'];
$instituto = $_POST['instituto'];
$instituicao = $_POST['instituicao'];
$idioma = $_GET['idioma'];
if($id_trabalho != ''){
    $sql_insere_instituicao="INSERT INTO `tb_instituicao` (`id`, `depto`, `inst`, `sigla_inst`, `trabalho_id`) VALUES (NULL, '$departamento', '$instituto', '$instituicao', '$id_trabalho')";
    $res_insere_instituicao = mysqlexecuta($id,$sql_insere_instituicao);
//    echo $res_insere_instituicao;
}
?>


<?
if($idioma==1 || $idioma==null){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=1">

<?
}
?>
<?
if($idioma==2){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2">

<?
}
?>
<?
if($idioma==3){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3">

<?
}
?>