<?
include "mysqlconecta.php";
include "mysqlexecuta.php";

$nova_categoria = $_POST['nova_categoria'];
$user_id = $_GET['id_usuario'];
if($user_id!=''){
$sql_muda_categoria = "UPDATE `tb_usuario` SET `categoria`='$nova_categoria' WHERE `id`=$user_id";
$res_muda_categoria = mysqlexecuta($id,$sql_muda_categoria);

$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

    $sql_categorias = "SELECT * FROM tb_categoria WHERE id = $nova_categoria";
    $res_categorias = mysqlexecuta($id,$sql_categorias);
    $row_categorias = mysql_fetch_array($res_categorias);
    $referente = $row_categorias['nome'];

        if((strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento1']))){
	 		$valor = $row_categorias['valor1'];
			$vencimento = $row_evento['vencimento1'];
//            echo "<td>".$row_categorias['valor1']."</td>"; 
//            echo "<td>".$row_evento['vencimento1']."</td>"; 
		}
		else if((strtotime(date('Y-m-d')) > strtotime($row_evento['vencimento1'])) && (strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento2']))){
	 		$valor = $row_categorias['valor2'];
			$vencimento = $row_evento['vencimento2'];
//            echo "<td>".$row_categorias['valor2']."</td>"; 
//            echo "<td>".$row_evento['vencimento2']."</td>"; 		
}
		else if((strtotime(date('Y-m-d')) > strtotime($row_evento['vencimento2'])) && (strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento3']))){
	 		$valor = $row_categorias['valor3'];
			$vencimento = $row_evento['vencimento3'];
//            echo "<td>".$row_categorias['valor3']."</td>"; 
//            echo "<td>".$row_evento['vencimento3']."</td>";
     		}



    $sql_categorias2 = "SELECT * FROM tb_categoria";
    $res_categorias2 = mysqlexecuta($id,$sql_categorias2);

while($row_categorias2 = mysql_fetch_array($res_categorias2)){
if($ids_categorias!=''){
$ids_categorias = $ids_categorias.','.$row_categorias2['id'];
}
else{
$ids_categorias = $row_categorias2['id'];
}
}
//$ids_categorias = '9,8,7,6,5,4,3,2,1';
$sql_muda_boleto = "UPDATE `tb_boleto` SET `categoria`='$nova_categoria', `referente`='$referente', `valor`='$valor', `vencimento`='$vencimento' WHERE `user_id`='$user_id' AND `categoria` IN ($ids_categorias)";
$res_muda_boleto = mysqlexecuta($id,$sql_muda_boleto);
$x=0;
echo "<h1>Categoria Atualizada com sucesso</h1>";
}
exit();

?>
<script>
window.close();
</script>