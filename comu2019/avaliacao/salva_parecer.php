<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];
$nota4 = $_POST['nota4'];
$nota5 = $_POST['nota5'];
$nota6 = $_POST['nota6'];
$nota7 = $_POST['nota7'];
$nota8 = $_POST['nota8'];
$trabalho_id = $_GET['id_trabalho'];
$val_end = $_GET['val'];
$val=$val_end;
$val1 = base64_decode($val_end);
$valida = $_SESSION['login'];
$parecer1 = utf8_decode($_POST['parecer']);
$parecer2 = str_replace('"',"``",$parecer1);
$parecer = str_replace("'","`",$parecer2);
$parecer_ant = utf8_decode($_POST['parecer_ant']);
$hora = date("Y-n-j H:i:s");
$aval = $_GET['aval_id'];
$aval = $_SESSION['usuario'];
$nota = $_POST['nota'];
//include "./header.php";
//include "./verifica_sessao.php";  
$hora = date("Y-m-d H:i:s");
$parecer = " --- ".$aval." - ".$hora." - ".$parecer." --------- ".$parecer_ant;
$sql53="INSERT INTO `tb_avaliacao` SET `avaliador_id`='$aval',`trabalho_id`='$trabalho_id',`nota1`='$nota1',`nota2`='$nota2',`nota3`='$nota3',`nota4`='$nota4',`nota5`='$nota5',`nota6`='$nota6',`nota7`='$nota7',`nota8`='$nota8',`created_on`='$hora'";	
$res53 = mysqlexecuta($id,$sql53);
?>
<meta http-equiv="refresh" content="0; url=./principal.php">