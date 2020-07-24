<?
$id_trabalho = $_GET['id_trabalho'];
$idioma = $_GET['idioma'];

// Verifica se o campo PDF está vazio
if ($_FILES['pdf']['name'] != "") {
// Caso queira mudar o nome do arquivo basta descomentar a linha abaixo e fazer a modificação
$_FILES['pdf']['name'] = "ce_".$id_trabalho.".pdf";
$tamanho = $_FILES['pdf']['size'];


// Move o arquivo para uma pasta
move_uploaded_file($_FILES['pdf']['tmp_name'],"./ce/".$_FILES['pdf']['name']);
// $pdf_path é a variável que guarda o endereço em que o PDF foi salvo (para adicionar na base de dados)
$pdf_path = "PASTA/".$_FILES['pdf']['name'];
//$tamanho = $tamanho/1024;
//$arquivo = "./ce/".$_FILES['pdf']['name'];
//$tamanho = filesize($arquivo);

?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho ?>&tamanho=<? echo $tamanho; ?>&idioma=<? echo $idioma; ?>">
<?
} else {
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho ?>&tamanho=<? echo $tamanho; ?>&idioma=<? echo $idioma; ?>">
<?
}
?>