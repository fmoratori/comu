<?
$id_trabalho = $_GET['id_trabalho'];
$id_autor = $_GET['id_autor'];
$nome = trim(ucwords($_POST['nome']));
$email = trim($_POST['email']);
$nome_cientifico = $_POST['nome_cientifico'];
$inst = $_POST['inst'];
    $sql_edita_autor="UPDATE `tb_autores` SET `nome`='$nome', `nome_cientifico`='$nome_cientifico', `email`='$email', `inst1` = '$inst' WHERE `id`=$id_autor;";	
    //echo $sql_edita_autor;
    $res_edita_autor = mysqlexecuta($id,$sql_edita_autor);	
    echo "<meta http-equiv='refresh' content='0; url=./principal.php?pg=autores.php&id_trabalho=$id_trabalho'>";
?>
