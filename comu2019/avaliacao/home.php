<?


$sql2 = "SELECT * FROM `tb_trabalhos` WHERE area_id = $area AND status>2 ORDER BY id ASC";
$res2 = mysqlexecuta($id,$sql2);
?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th class="hidden-xs">T&iacute;tulo</th>
      <th>Status</th>
      <!--th>Nota</th--->
      <th>A&ccedil;&otilde;es</th>
    </tr>
  </thead>
  <tbody>
<?
while($row2 = mysql_fetch_array($res2)){ 
$descricao = $row2['titulo'];
$descricao = substr($descricao, 0, 50);
$area_trab = $row2['area_id'];
$id_trab = $row2['id'];
$status = $row2['status'];
$sql8 = "SELECT * FROM `tb_status` WHERE id=$status";
$res8 = mysqlexecuta($id,$sql8);
$row8 = mysql_fetch_array($res8);
$count5 = mysql_query("SELECT COUNT(*) FROM tb_avaliacao WHERE trabalho_id=$id_trab AND avaliador_id=$id_usuario");
$status4 =  mysql_result($count5, 0);
 ?>
 <tr>
 <td><? echo $row2['id']; ?>  </p></td>
 <td><? echo utf8_encode($row2['titulo'])."..."; ?>  </p></td>
 <td><? echo utf8_encode($row8['status']); ?> </p></td>
 <!--td><? echo utf8_encode($row2['nota']); ?> </p></td-->
 
  <?
  if((($row2['status']=='3')||($row2['status']=='5')||($row2['status']=='6'))&&($status4<1)){
  ?>
  <td><a href="./principal.php?pg=avalia.php&id_trabalho=<? echo $row2['id'] ?>&aval=<? echo $usuario_id; ?>" class="ls-ico-text2"></a>
  <?
  }
  else{
    ?>
    <td><? if($status4>=1){ echo "<b>Já Avaliado.</b>"; } ?></td>
    <?
  }
  ?>
  </tr>
  <?
 }
 ?>
</tbody>
</table>
  </div>
</div>

</body>
</html>
