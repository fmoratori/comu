<?php
include "mysqlconecta.php";
include "mysqlexecuta.php";

$usuario = $_GET['user'];
$ativ = $_GET['ativ'];
if($ativ!=''){
    $cat = $ativ.'00';
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs`='' WHERE `id`=$usuario AND `inscricao_obs`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs2`='' WHERE `id`=$usuario AND `inscricao_obs2`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs3`='' WHERE `id`=$usuario AND `inscricao_obs3`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs4`='' WHERE `id`=$usuario AND `inscricao_obs4`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ2="UPDATE `tb_boleto` SET `situacao`='cancelada', `categoria`='$cat' WHERE `user_id`=$usuario AND `categoria`=$ativ";	
    echo $sql_ativ2;
    $res_ativ2 = mysqlexecuta($id,$sql_ativ2);
    }        	
    echo utf8_decode("INSCRIÇÃO EM ATIVIDADE REMOVIDA");
?>