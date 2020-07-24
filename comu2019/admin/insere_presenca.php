<?php
$user = $_GET['us'];
$ativ = $_GET['at'];
include "./mysqlconecta.php";
include "./mysqlexecuta.php";

if($user!='' && $ativ!=''){
    $sql_atividades = "INSERT INTO `fmsys`.`tb_certificados` SET `usuario_id`=$user,`id_atividade`=$ativ;";
    $res_atividades = mysqlexecuta($id,$sql_atividades);
echo "PRESEN&Ccedil;A INSERIDA COM SUCESSO";
}