<?
$pular = $_GET['pular'];

if($pular == '1'){
$sql_salva_alteracao = "UPDATE `tb_usuario` SET `pesquisa`='n' WHERE `id`=$id_usuario";
$res_salva_alteracao = mysqlexecuta($id,$sql_salva_alteracao);
if($res_salva_alteracao){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=certificados.php">
<?
exit();
}
    
}
$resposta_1 = $_POST['resposta_1'];
$resposta_2 = $_POST['resposta_2'];
$resposta_3 = $_POST['resposta_3'];
$resposta_4 = $_POST['resposta_4'];
$resposta_5 = $_POST['resposta_5'];
$resposta_6 = $_POST['resposta_6'];
$resposta_7 = $_POST['resposta_7'];

if($id_usuario!=''){
    $id_pesquisa = $id_usuario;
}
else{
    include './mysqlconecta.php';
    include './mysqlexecuta.php';
    $id_pesquisa = $_SERVER['REMOTE_ADDR'];
}

$sql_salva_pesquisa = "INSERT INTO `tb_pesquisa` SET `usuario_id`='$id_pesquisa',`resposta_1`='$resposta_1',`resposta_2`='$resposta_2',`resposta_3`='$resposta_3',`resposta_4`='$resposta_4',`resposta_5`='$resposta_5',`resposta_6`='$resposta_6',`resposta_7`='$resposta_7'";
$res_salva_pesquisa = mysqlexecuta($id,$sql_salva_pesquisa);

if($id_usuario!=''){
$sql_salva_alteracao = "UPDATE `tb_usuario` SET `pesquisa`='s' WHERE `id`=$id_usuario";
$res_salva_alteracao = mysqlexecuta($id,$sql_salva_alteracao);
if($res_salva_alteracao){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=certificados.php">
<?
}
}
else{
    ?>
    <!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Sistema Para eventos">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>

    <div class="ls-box-filter"><p>Agradecemos por sua participação.</p></div>
    <?
}
?>