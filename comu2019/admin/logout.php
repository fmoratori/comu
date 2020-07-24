<?
session_start();
$data_atual = date("Y-n-j H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
			$registra = "LOGOUT: ".$_SESSION["hora"]." # ".$data_atual." # ".$ip." # ".$_SESSION['login']." # ".$_SESSION['usuario']."; \r\n";
			$abre = fopen("./logs/".$_SESSION['usuario']."_log.txt", "r");
			$conta = fread($abre, filesize("./logs/".$_SESSION['usuario']."_log.txt"));
			fclose($abre);
			#Adiciona o novo texto
			$fp = fopen("./logs/".$_SESSION['usuario']."_log.txt", "a");
			fputs ($fp, $registra);
			fclose ($fp);
$_SESSION["email"] = "null";
$_SESSION["login"] = 'null';
$_SESSION["senha"] = "null";
$_SESSION["logado"] = false;
session_unset();
session_destroy();
header("location:./login.php");
?>