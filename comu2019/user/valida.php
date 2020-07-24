<?
session_start();
						//$horafim = strtotime("+30 minutes",$_SESSION['start']);
  						$val_end = $_GET['val'];
						$val=$_GET['val'];
						$val1 = base64_decode($val_end);
						$valida = $_SESSION['login'];
                        echo $valida;
                        break;
						if($_SESSION['logado']==true && $valida == $val1){
						$hora = date("Y-n-j H:i:s");
						
						$sql_usuario = "SELECT * FROM tb_usuario WHERE `cpf`='$valida' OR `email` LIKE '$valida'";
						$res_usuario = mysqlexecuta($id,$sql_usuario);
						
break;
						while($row_usuario = mysql_fetch_array($res_usuario)){	
						$user_id=$row_usuario['id'];	
						$sql4 = "SELECT * FROM tb_boleto WHERE user_id = $user_id";
						$res4 = mysqlexecuta($id,$sql4);
						$row4 = mysql_fetch_array($res4);					
												}
							}
							
							else{
								?>
								<meta http-equiv="refresh" content="0; url=./login.php?">
                                <?
							}
						$sql5 = "SELECT * FROM tb_usuario WHERE id = $user_id";
						$res5 = mysqlexecuta($id,$sql5);
						$row5 = mysql_fetch_array($res5);

$email = $row5['email'];
// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo é aberto para ser escrito
$fp = fopen("./logs/$email.txt", "a");
$data = date("d-m-Y, H:i:s");
$ip = getenv("REMOTE_ADDR");
$referer = $_SERVER['SCRIPT_FILENAME'];
$end_local = $_SERVER['SERVER_NAME'];
$navegador = $_SERVER['HTTP_USER_AGENT'];
$texto = $data." --- ".$ip." --- ".$referer." --- ".$navegador."\n";
$escreve = fwrite($fp, $texto);
 
// Fecha o arquivo
fclose($fp);


?>
