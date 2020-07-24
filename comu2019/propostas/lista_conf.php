<h1 class="ls-title-intro ls-ico-home">Propostas Conferências</h1>
<p><h2><center><a href="./gera_conf.php" target="_blank">Gerar Arquivo</a></center></h2></p>
<table class="ls-table">
  <thead>
    <tr>
      <th>Título</th>
      <th class="hidden-xs">Nome do Proponente</th>
      <th>Telefone Proponente</th>
      <th class="hidden-xs">Data de envio</th>
    </tr>
  </thead>
  <tbody>
<?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
$valida = $_GET['valida'];
//echo $valida;
$sql = "SELECT * FROM `tb_propostas_conf_2018`";
$res = mysqlexecuta($id,$sql);
    $count_conf = mysql_query("SELECT COUNT(*) FROM `tb_propostas_conf_2018`");
	$conf =  mysql_result($count_conf, 0);
echo "<center>Total de Propostas: $conf</center>";
while($row = mysql_fetch_array($res)){
?>
    <tr>
      <td><a href="./admin.php?pg=edita_conf.php&valida=<?echo $row['valida']; ?>" title=""><? echo $row['titulo_conf']; ?></a></td>
      <td class="hidden-xs"><? echo $row['nome_prop']; ?></td>
      <td><? echo $row['tel_prop']; ?></td>
      <td class="hidden-xs"><? echo $row['created_on']; ?></td>
    </tr>
    
<?    
}
?>
  </tbody>
</table>