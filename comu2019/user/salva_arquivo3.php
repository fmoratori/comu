<?
$id_usuario = $_GET['id_usuario'];
// Nas versões do PHP anteriores a 4.1.0, deve ser usado $HTTP_POST_FILES
// ao invés de $_FILES.

// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
$_FILES['userfile']['name'] = $id_usuario.".jpg";
$uploaddir = './pagamentos/';//<----This is all I changed
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
$_FILES['jpg']['name'] = $id_usuario.".jpg";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=principal_trabalhos.php">
<?
} 


else {
    echo "  <div id='apDiv2'>Falha no Upload do Arquivo! Tamanho m&aacute;ximo do Arquivo: 2mb\n</div>";
}
print "</pre>";







?>