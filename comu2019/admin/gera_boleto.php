<h1 class="ls-title-intro ls-ico-user">Novo Boleto</h1>
<?
$id_usuario = $_GET['id_usuario'];
?>
<div class="ls-box-filter">
  <form action="principal_admin.php?pg=salva_novo_boleto.php&id_usuario=<? echo $id_usuario; ?>" class="ls-form-row" method="POST">
    <fieldset>
        <label class="ls-label col-md-2">
        <b class="ls-label-text">ID Usuário </b>
        <input type="text" name="id_usuario" placeholder="Id Usuario" value="<? echo $id_usuario; ?>" readonly="readonly">
        </label>
    </fieldset>

    <fieldset>
        <label class="ls-label col-md-6">
        <b class="ls-label-text">Referente </b>
        <input type="text" name="referente" placeholder="Descrição do Boleto" value="" required="required">
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-4">
        <b class="ls-label-text">Valor </b>
        <input type="number" name="valor" placeholder="Valor do Boleto" value="" required="required">
        </label>
    </fieldset>
    <fieldset>
        <label class="ls-label col-md-4">
        <b class="ls-label-text">Vencimento </b>
        <input type="date" name="vencimento" placeholder="Vencimento do Boleto" value="" required="required">
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