<h1 class="ls-title-intro ls-ico-remove">Sair da Fila de Espera</h1>
<?
$id_ativ = $_GET['id_ativ'];
$id_boleto = $_GET['id_bol'];
$ver = $_GET['ver'];
$usuario = $id_usuario;
$ativ = $id_ativ;
//$ver ='s';
if($ver=='s' && $id_ativ!='' && $id_boleto!='' && $usuario!='' && $ativ!=''){
    
    echo $id_ativ.' - '.$id_boleto.' - '.$usuario.' - '.$ativ;
    $sql_remove_ativ="DELETE FROM `tb_boleto` WHERE `id`='$id_boleto' AND `categoria` = '$id_ativ'";	
    $res_remove_ativ = mysqlexecuta($id,$sql_remove_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs`='' WHERE `id`=$usuario AND `inscricao_obs`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs2`='' WHERE `id`=$usuario AND `inscricao_obs2`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs3`='' WHERE `id`=$usuario AND `inscricao_obs3`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs4`='' WHERE `id`=$usuario AND `inscricao_obs4`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    echo "<meta http-equiv='refresh' content='0; url=./principal.php?pg=atividades2.php'>";
	}
    else{
        echo "<h2>Desistir da Atividade? </h2><br /><br />";
        echo "<a href='./principal.php?pg=remover_atividade.php&id_ativ=$id_ativ&id_bol=$id_boleto&ver=s' class='ls-btn-primary'>SIM</a>";
        echo "<a href='./principal.php?pg=atividades2.php' class='ls-btn-primary-danger'>N&Atilde;O</a>";
   
    }

?>
