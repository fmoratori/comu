<?
$id_trabalho = $_GET['id_trabalho'];
$nome = trim(ucwords($_POST['nome']));
$email = trim($_POST['email']);
$inst = $_POST['inst'];
				$frase2 = explode(" ", $nome);
				$ultimaPalavra = $frase2[count($frase2)-1];
				$x=0;
				while($x < count($frase2)-1){
					if($frase2[$x] != "Da" && $frase2[$x] != "De" && $frase2[$x] != "Do" && $frase2[$x] != "Dos" && $frase2[$x] != "E"){
					$iniciais = substr($frase2[$x],0,1);
					$iniciais2 = $iniciais2.$iniciais.". ";
					}
					$x++;
					}
				
				$nome_cientifico= $ultimaPalavra.", ".$iniciais2;
				$iniciais2 = "";
	$sql_conta_autores = mysql_query("SELECT COUNT(*) FROM `tb_autores` WHERE `trabalho_id`=$id_trabalho");
	$res_conta_autores =  mysql_result($sql_conta_autores, 0);
	$total_autores = $res_conta_autores;
    $ordenacao = $total_autores+1;

if(($id_trabalho != '')&&($id_trabalho==$id_usuario)){
    $sql_insere_autores="INSERT INTO `tb_autores` (`id`, `nome`, `nome_cientifico`, `email`, `inst1`, `trabalho_id`,`ordenacao`) VALUES (NULL, '$nome', '$nome_cientifico', '$email', '$inst', '$id_trabalho', '$ordenacao')";
    $res_insere_autores = mysqlexecuta($id,$sql_insere_autores);
 //   echo $res_insere_autores;
}
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=autores_2.php&id_trabalho=<? echo $id_trabalho; ?>">
