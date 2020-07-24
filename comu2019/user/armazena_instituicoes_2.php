<?
$id_trabalho = $_GET['id_trabalho'];
$departamento = $_POST['departamento'];
$instituto = $_POST['instituto'];
$instituicao = $_POST['instituicao'];
if($id_trabalho != ''){
    $sql_insere_instituicao="INSERT INTO `tb_instituicao` (`id`, `depto`, `inst`, `sigla_inst`, `trabalho_id`) VALUES (NULL, '$departamento', '$instituto', '$instituicao', '$id_trabalho')";
    $res_insere_instituicao = mysqlexecuta($id,$sql_insere_instituicao);
//    echo $res_insere_instituicao;
}
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=instituicoes_2.php&id_trabalho=<? echo $id_trabalho; ?>">
