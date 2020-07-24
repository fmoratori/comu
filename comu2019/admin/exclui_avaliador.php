<?
$id_avaliador = $_GET['id_avaliador'];

    $sql_trabalho_avaliador = "SELECT * FROM tb_trabalhos WHERE `avaliador_id` = '$id_avaliador' ORDER BY `id`";
    $res_trabalho_avaliador = mysqlexecuta($id,$sql_trabalho_avaliador);
    $x=0;
    while($row_trabalho_avaliador = mysql_fetch_array($res_trabalho_avaliador)){
        $x++;
        }
    
if($x<=0){
//	$count = mysql_query("SELECT COUNT(*) FROM `tb_avaliador` WHERE email LIKE '$email'");
//	$inscritos =  mysql_result($count, 0);
//	if($inscritos<=0){
$sql="DELETE FROM `tb_avaliador` WHERE `id`= $id_avaliador";	
$res = mysqlexecuta($id,$sql);
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=cadastrar_avaliador.php&ver=1">
<?
	}
	else{
	echo "Não é possivel Excluir esse avaliador pois existe trabalho em sua área de avaliação.";
	}
//	}
//	else{
//	echo "Existe campo não preenchido";	
//	}
?>
