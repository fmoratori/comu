<h1 class="ls-title-intro ls-ico-user">Análise De Comprovantes</h1>
<table class="ls-table ls-no-hover ls-table-striped">
<?
$opcao = $_POST['opcao'];
$texto = "'%".$_POST['nome']."%'";
$sql10= "SELECT * FROM tb_usuario WHERE categoria_valida = 'A' ORDER BY 'updated_on' DESC";

$res10 = mysqlexecuta($id,$sql10);
    echo "<thead>";
	echo "<tr>";
	echo "<td>"."ID"."</td>";
	echo "<td>"."NOME"."</td>";
	echo "<td>"."INSTITUIÇÃO"."</td>";	
	echo "<td>"."EMAIL"."</td>";
	echo "<td>"."CATEGORIA"."</td>";
	echo "<td>"."CATEGORIA COMPROVADA?"."</td>";
	echo "</tr>";
    echo "</thead>";	
	$cont=0;
while($row10 = mysql_fetch_array($res10)){
	$id_usuario = $row10['id'];
	echo "<tr>";
	echo "<td>".$row10['id']."</td>";
	$user_id=$row10['id'];
	echo "<td>"."<a href='./user_info.php?user_id=$user_id' target='_blank'>".utf8_encode($row10['nome'])."</a></td>";
	echo "<td>".utf8_encode($row10['instituicao'])."</td>";
	echo "<td>".$row10['email']."</td>";
	$categoria_id = $row10['categoria'];
	$sql14= "SELECT * FROM tb_categoria WHERE id = $categoria_id";
	$res14 = mysqlexecuta($id,$sql14);
	$row14 = mysql_fetch_array($res14);
	echo "<td>".utf8_encode($row14['nome'])."</td>";
	echo "<td><center>".$row10['categoria_valida']."<br /><a href='./valida_categoria.php?user_id=$user_id' target='_blank'>Validar Agora</a> "."</center></td>";
	echo "</tr>";	
	$cont++;
	}
	echo "<center><b> Total de Análises Pendentes: ".$cont."</b></center>";

?>
</table>
</body>
</html>