<?
$id_trabalho = $_GET['id_trabalho'];
$nome = trim(ucwords($_POST['nome']));
$email = trim($_POST['email']);
$inst = $_POST['inst'];
$idioma = $_GET['idioma'];
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

if($id_trabalho != ''){
    $sql_insere_autores="INSERT INTO `tb_autores` (`id`, `nome`, `nome_cientifico`, `email`, `inst1`, `trabalho_id`,`ordenacao`) VALUES (NULL, '$nome', '$nome_cientifico', '$email', '$inst', '$id_trabalho', 100)";
    $res_insere_autores = mysqlexecuta($id,$sql_insere_autores);
 //   echo $res_insere_autores;
}
?>

<?
if($idioma==1 || $idioma==null){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=1">
<?
}
?>
<?
if($idioma==2){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2">
<?
}
?>
<?
if($idioma==3){
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3">
<?
}
?>