<?

$ver = $_GET['ver'];

?>
<h1 class="ls-title-intro ls-ico-pencil">Gera Arquivo Trabalhos</h1>
<div class="ls-box-filter">
  <form action="arquivos_resumos.php" class="ls-form ls-form-inline row" method="POST">
    <label class="ls-label col-md-4">

      <div class="ls-custom-select ">

        <select class="ls-custom" name="area">



<option value="">Selecione a Área</option>

<?

$sql4 = "SELECT * FROM `tb_areas` ORDER BY id ASC";

$res4 = mysqlexecuta($id,$sql4);

while ($row4 = mysql_fetch_array($res4)) {

?>

	    <option value="<? echo $row4['id'] ?>"><? echo $row4['id'].'-'.utf8_encode($row4['nome_area']); ?> </option>  

<?	

}

?>

        </select>

        </div>

        </label>
</fieldset>
<hr />
<fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Painel Inicío</b><input type="text" name="inicio" placeholder="Texto da Busca" value="" />
        <b class="ls-label-text">Painel Fim</b><input type="text" name="fim" placeholder="Texto da Busca" value="" />
    </label>
    </fieldset>

<fieldset>

    <label class="ls-label col-md-2s">

        <button class="ls-btn" formtarget="_blank">Buscar</button>

    </label>

</fieldset>

  </form>

</div>
