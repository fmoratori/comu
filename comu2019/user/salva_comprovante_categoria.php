<?
$id_usuario = $_GET['id_usuario'];


// Verifica se o campo PDF está vazio
if ($_FILES['pdf']['name'] != "") {
// Caso queira mudar o nome do arquivo basta descomentar a linha abaixo e fazer a modificação
$_FILES['pdf']['name'] = $id_usuario.".pdf";
$tamanho = $_FILES['pdf']['size'];


// Move o arquivo para uma pasta
move_uploaded_file($_FILES['pdf']['tmp_name'],"./categoria/".$_FILES['pdf']['name']);
// $pdf_path é a variável que guarda o endereço em que o PDF foi salvo (para adicionar na base de dados)
$pdf_path = "PASTA/".$_FILES['pdf']['name'];
$sql8="UPDATE `tb_usuario` SET `categoria_valida` = 'A' WHERE id = $id_usuario";	
$res8 = mysqlexecuta($id,$sql8);	

//$tamanho = $tamanho/1024;
//$arquivo = "./ce/".$_FILES['pdf']['name'];
//$tamanho = filesize($arquivo);

?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=home.php&id_usuario=<? echo $id_usuario ?>&tamanho=<? echo $tamanho; ?>">
<?
} else {
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=home.php&id_usuario=<? echo $id_usuario ?>&tamanho=<? echo $tamanho; ?>">
<?
}
?>