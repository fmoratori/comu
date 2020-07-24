<h1 class="ls-title-intro ls-ico-docs">Gerar Certificados</h1>
<form action="./principal_admin.php?pg=insere_certificados.php" class="ls-form row" method="POST">
  <fieldset>
      <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Atividade</b>
      <div class="ls-custom-select">
        <select name="id_atividade" class="ls-select">
<?
$sql_atividades = "SELECT * FROM tb_atividades";
$res_atividades = mysqlexecuta($id,$sql_atividades);
    while($row_atividades=mysql_fetch_array($res_atividades)){
        echo "<option value='".$row_atividades['id']."'>".$row_atividades['nome']."</option><br />";
    }
?>
        </select>
      </div>
      </label>
      <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">CPF's Usuários (Separados por vírgula)</b>
      <textarea name="ids_certificados" rows="2" required ><? echo $row_trabalhos['introducao']; ?></textarea>
    </label>
      <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Carga Horário (Somente N&uacute;meros)</b>
        <input type="number" name="carga_horaria" required="required" value="">
    </label>
  </fieldset>
  <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>