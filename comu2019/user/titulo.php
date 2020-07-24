<h1 class="ls-title-intro ls-ico-pencil2">Edita Trabalhos</h1>
<?
    $id_trabalho = $_GET['id_trabalho'];
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
?>
<form action="./principal.php?pg=armazena_titulo_2.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form row" method="POST">
    <label class="ls-label col-md-8">
      <b class="ls-label-text">T&iacute;tulo (Somente T&iacute;tulo)</b>
      <input type="text" name="titulo" placeholder="T&iacute;tulo" value="<? echo $row_trabalhos['titulo']; ?>" required >
    </label>
      </fieldset>
    <a href="./principal.php?pg=autores_2.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
    <button class="ls-btn-dark ls-ico-chevron-right">Pr&oacute;ximo</button>

  <!--div class="ls-actions-btn">
  </div-->
</form>