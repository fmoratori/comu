<?
$ids_certificados = $_POST['ids_certificados'];
$id_atividade = $_POST['id_atividade'];
$carga_horaria = $_POST['carga_horaria'];

$ids_certificados = str_replace(" ","",$ids_certificados);

$ids = explode(",", $ids_certificados);
$total = count($ids);
$x=0;
while($x<$total){
    $id_usuario = $ids[$x];
    $validacao = md5($id_usuario+$id_atividade);
    $sql_insere_certificados="INSERT INTO `tb_certificados` (`usuario_id`, `id_atividade`, `carga_horaria`, `validacao`) VALUES ('$id_usuario', '$id_atividade', '$carga_horaria', '$validacao')";
    $res_insere_autores = mysqlexecuta($id,$sql_insere_certificados);
   // echo $res_insere_autores;
$x++;
}
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=gerar_certificados.php">