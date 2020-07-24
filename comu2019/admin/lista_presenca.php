<?

$user = $_GET['us'];
$ativ = $_GET['at'];
include "./mysqlconecta.php";
include "./mysqlexecuta.php";

    	$sql_atividades = "SELECT * FROM `fmsys`.`tb_certificados` ORDER BY id_atividade DESC";
    	$res_atividades = mysqlexecuta($id,$sql_atividades);
        echo "<table border='1'>";
    	while($row_atividades = mysql_fetch_array($res_atividades)){
        $id3 = $row_atividades['usuario_id'];
        $id2 = $row_atividades['id_atividade'];
    	$sql_atividades2 = "SELECT * FROM tb_atividades WHERE id = $id2";
    	$res_atividades2 = mysqlexecuta($id,$sql_atividades2);
        $row_atividades2 = mysql_fetch_array($res_atividades2);

        
    	$sql_atividades3 = "SELECT * FROM tb_usuario WHERE id = $id3";
    	$res_atividades3 = mysqlexecuta($id,$sql_atividades3);
        $row_atividades3 = mysql_fetch_array($res_atividades3);
	echo "<tr><td>".$row_atividades3['nome']."</td><td>".$row_atividades2['nome']."</td></tr>";
}
        echo "</table>";
?>
