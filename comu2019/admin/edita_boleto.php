<h1 class="ls-title-intro ls-ico-user">Novo Boleto</h1>
<?
$id_boleto = $_GET['id_boleto'];
$sql_lista_boletos = "SELECT * FROM tb_boleto WHERE `id` = '$id_boleto' ORDER BY `id`";
$res_lista_boletos = mysqlexecuta($id,$sql_lista_boletos);
$row_lista_boletos = mysql_fetch_array($res_lista_boletos)
?>
<div class="ls-box-filter">
  <form action="principal_admin.php?pg=salva_edita_boleto.php&id_boleto=<? echo $id_boleto; ?>" class="ls-form-row" method="POST">
    <fieldset>
        <label class="ls-label col-md-2">
        <b class="ls-label-text">ID Usuário </b>
        <input type="text" name="id_usuario" placeholder="Id Usuario" value="<? echo $row_lista_boletos['user_id']; ?>" readonly="readonly">
        </label>
    </fieldset>
<br />
    <fieldset>
        <label class="ls-label col-md-6">
        <b class="ls-label-text">Referente </b>
        <input type="text" name="referente" placeholder="Descrição do Boleto" value="<? echo utf8_encode($row_lista_boletos['referente']); ?>" required="required">
        </label>
    </fieldset>
<br />
    <fieldset>
        <label class="ls-label col-md-4">
        <b class="ls-label-text">Valor </b>
        <input type="number" name="valor" placeholder="Valor do Boleto" value="<? echo $row_lista_boletos['valor']; ?>" required="required">
        </label>
    </fieldset>
<br />
    <fieldset>
        <label class="ls-label col-md-4">
        <b class="ls-label-text">Vencimento </b>
        <input type="date" name="vencimento" placeholder="Vencimento do Boleto" value="<? echo $row_lista_boletos['vencimento']; ?>" required="required">
        </label>
    </fieldset>
<br />
    <fieldset>
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Situação</b>
      <div class="ls-custom-select">
        <select class="ls-custom" name="situacao">
          <option selected="selected" value="<? echo $row_lista_boletos['situacao']; ?>">Selecione</option>
          <option value="NP">Não Pago</option>
          <option value="PG">Pago</option>
          <option value="IS">Isento</option>
        </select>
      </div>
    </label>
    </fieldset>
<br />
    <fieldset>
        <label class="ls-label col-md-6">
        <b class="ls-label-text">Observação </b>
        <input type="text" name="observacao" placeholder="Observações" value="<? echo $row_lista_boletos['observacao']; ?>">
        </label>
    </fieldset>
<br />
    <fieldset>
        <label class="ls-label col-md-2s">
            <button class="ls-btn">Salvar</button>
        </label>
    </fieldset>
  </form>
</div>