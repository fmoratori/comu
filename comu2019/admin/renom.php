<?
$id = $_GET['id'];
$de = "../user/categoria/$id.pdf";
$para = "../user/categoria/$id.jpg";
 echo $de;
if(rename($de, $para)){
    echo "Arquivo renomeado com sucesso.";
?>
<script>
window.close();
</script>
<?

}
  else
    echo "Não foi possível renomear o arquivo.";
	
?>