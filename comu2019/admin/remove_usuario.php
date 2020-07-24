<script>
function confirmExclusao() {
   if (confirm("Tem certeza que deseja excluir essa inscrição?")) {
      location.href="deletar_categoria.jsp?acao=deletar";
   }
}
</script>
<?
$id_user = $_GET['id_inscrito'];
if($id_user!=''){
 //   $sql_remove = "DELETE FROM `tb_usuario` WHERE `id`=$id_user";
  //  $res_remove = mysqlexecuta($id,$sql_remove);
    echo "<div class='ls-alert-danger'><b>AÇÃO NÃO PERMITIDA</b><br />";
}
else{
    echo "<div class='ls-alert-danger'><b>USu&Aacute;RIO INV&Aacute;LIDO</b><br />";    
}
?>