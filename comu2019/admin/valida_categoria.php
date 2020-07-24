<?
include "mysqlconecta.php";
include "mysqlexecuta.php";
$msg = $_GET['msg'];
$user_id = $_GET['user_id'];

if($msg!=''){
$sql8="UPDATE `tb_usuario` SET `categoria_valida` = '$msg' WHERE id = $user_id";	

$res8 = mysqlexecuta($id,$sql8);
 echo "<h3>Op&ccedil;&atilde;o Armazenada com Sucesso!</h3>";
	}
?>
<table width="100%">
<tr>

<td bgcolor="#00CC00" width="33%">
<center><a href="./valida_categoria.php?msg=S&user_id=<? echo $user_id; ?>">
<b>APROVAR</b></a></center>
</td>

<td bgcolor="#FF0000" width="33%">
<center><a href="./valida_categoria.php?msg=N&user_id=<? echo $user_id; ?>">
<b>REJEITAR</b></a></center>
</td>
</tr>
</table>
<?
$sql10= "SELECT * FROM tb_usuario WHERE id = $user_id";
$res10 = mysqlexecuta($id,$sql10);
$row10 = mysql_fetch_array($res10);
	$categoria_id = $row10['categoria'];
	$sql14= "SELECT * FROM tb_categoria WHERE id = $categoria_id";
	$res14 = mysqlexecuta($id,$sql14);
	$row14 = mysql_fetch_array($res14);
	echo "<h2><center><b>".utf8_encode($row10['nome'])."</b></center></h2>";
	echo "<h2><center><b>".$row14['nome']."</b></center></h2>";
?>
<a href="./renom.php?id=<? echo $user_id; ?>" target="_blank">Transformar Para Imagem</a>
<center><img src="../user/categoria/<? echo $user_id ?>.jpg" /></center>
<?
//$link= 
?>
<center><iframe src=<? echo '../user/categoria/'.$user_id.'.pdf' ?> width="99%" height="600px" /></center>
