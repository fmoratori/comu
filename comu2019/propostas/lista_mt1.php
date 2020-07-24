<h1 class="ls-title-intro ls-ico-home">Propostas Módulos Temáticos</h1>
<p><h2><center><a href="./gera_mt.php" target="_blank">Gerar Arquivo</a></center></h2></p>
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
$sql1 = "SELECT * FROM `tb_propostas_mt_2018`";
$res1 = mysqlexecuta($id,$sql1);
    $count_mt = mysql_query("SELECT COUNT(*) FROM `tb_propostas_mt_2018`");
	$mt =  mysql_result($count_mt, 0);
echo "<center>Total de Propostas: $mt</center>";
while($row1 = mysql_fetch_array($res1)){
?>
    <tr>
      <td><a href="./admin.php?pg=edita_mt1.php&valida=<?echo $row1['valida']; ?>" title=""><? echo $row1['titulo_mt']; ?></a></td>
      <td class="hidden-xs"><? echo $row1['nome_prop']; ?></td>
      <td><? echo $row1['tel_prop']; ?></td>
      <td class="hidden-xs"><? echo $row1['created_on']; ?></td>
    </tr>
    
<?    
}
?>
  </tbody>
</table>