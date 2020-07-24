<h1 class="ls-title-intro ls-ico-home">Propostas Simpósios</h1>
<p><h2><center><a href="./gera_simp.php" target="_blank">Gerar Arquivo</a></center></h2></p>
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
$sql1 = "SELECT * FROM `tb_propostas_simp_2018`";
$res1 = mysqlexecuta($id,$sql1);
    $count_simp = mysql_query("SELECT COUNT(*) FROM `tb_propostas_simp_2018`");
	$simp =  mysql_result($count_simp, 0);
echo "<center>Total de Propostas: $simp</center>";
while($row1 = mysql_fetch_array($res1)){
?>
    <tr>
      <td><a href="./admin.php?pg=edita_simp.php&valida=<?echo $row1['valida']; ?>" title=""><? echo $row1['titulo_curso']; ?></a></td>
      <td class="hidden-xs"><? echo $row1['nome_prop']; ?></td>
      <td><? echo $row1['tel_prop']; ?></td>
      <td class="hidden-xs"><? echo $row1['created_on']; ?></td>
    </tr>
    
<?    
}
?>
  </tbody>
</table>