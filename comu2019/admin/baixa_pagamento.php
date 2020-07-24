<h1 class="ls-title-intro ls-ico-docs">Baixa Pagamento</h1>
<form action="./principal_admin.php?pg=finaliza_baixa_pagamento.php" class="ls-form row" method="POST">
  <fieldset>
      <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Id's Boleto (Separados por vírgula)</b>
      <textarea name="ids_boletos" rows="2" required ></textarea>
    </label>
  </fieldset>
  <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>
<?
$baixados = $_GET['baixados'];

if($baixados!=''){
    $sql_lista_boletos = "SELECT * FROM tb_boleto WHERE id IN ($baixados) ORDER BY `id`";
    $res_lista_boletos = mysqlexecuta($id,$sql_lista_boletos);
    ?>
    <table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Referente</th>
      <th class="hidden-xs">Valor</th>
      <th>Vencimento</th>
      <th>Situacao</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
<?
   while($row_lista_boletos = mysql_fetch_array($res_lista_boletos)){
        echo "<tr>";
        echo "<td>".utf8_encode($row_lista_boletos['referente'])."</td>";
        echo "<td>R$ ".$row_lista_boletos['valor']."</td>";
        echo "<td>".date('d/m/Y', strtotime($row_lista_boletos['vencimento']))."</td>";
        echo "<td>".$row_lista_boletos['situacao']."</td>";
        echo "<td>"."<a href='../boleto/boleto_banespa.php?id_boleto=".$row_lista_boletos['id']."' target='_blank' class='ls-ico-text' title='Exibe Boleto'></a>&nbsp;&nbsp;";
        echo "<a href='./principal_admin.php?pg=edita_boleto.php&id_boleto=".$row_lista_boletos['id']."' class='ls-ico-pencil' title='Dados Boleto'></a></td>";
        echo "</tr>";
   }
}
?>
</table>
