<?
$id_trabalho = $_GET['id_trabalho'];
$id_autor = $_GET['id_autor'];
$ordem = $_POST[$id_autor];
if($ordem>99){
        ?>
        <p><div class="ls-alert-danger">Utilize apenas valores entre <b>1 e 99</b>
        <br /><br />
        <a href="./principal.php?pg=altera_ordenacao.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Voltar</a>
        </div></p>
<?
exit();
}
if($id_trabalho != ''){
    $sql_altera_ordem="UPDATE `tb_autores` SET `ordenacao`=$ordem WHERE `id`=$id_autor AND `trabalho_id`=$id_trabalho;";
//   echo $sql_altera_ordem;
    $res_altera_ordem = mysqlexecuta($id,$sql_altera_ordem);

//   exit();
}
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=altera_ordenacao.php&id_trabalho=<? echo $id_trabalho; ?>">