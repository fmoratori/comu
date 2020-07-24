<h1 class="ls-title-intro ls-ico-cart">Recibos</h1>
<!--div class="ls-alert-warning"> N&atilde;o h&aacute; recibos dispon&iacute;veis</div-->
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Categoria</th>
      <th class="hidden-xs">Valor</th>
      <th class="hidden-xs">Situação do Pagamento</th>
      <th class="hidden-xs">Opções</th>
    </tr>
  </thead>
  <tbody>
<?
$sql_boleto = "SELECT * FROM tb_boleto WHERE user_id = $id_usuario";
$res_boleto = mysqlexecuta($id,$sql_boleto);

    while($row_boleto = mysql_fetch_array($res_boleto)){
$id_bol = $row_boleto['id'];
?>
    <tr>
      <td><a href="gera_recibo.php?id_bol=<? echo $row_boleto['id']; ?>" target="_blank" title=""><? echo $row_boleto['referente']; ?></a></td>
      <td class="hidden-xs"><? echo "R$ ".$row_boleto['valor']; ?></td>
<?
if($row_boleto['situacao']=='PG'){
?>
      <td class="hidden-xs"><? echo "Pago" ?> </td><td><a href="gera_recibo.php?id_bol=<? echo $id_bol; ?>" target="_blank">Gerar Recibo</a></td>
<?
}
}
?>
