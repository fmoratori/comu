<?
$id_trabalho = $_GET['id_trabalho'];
$id_autor = $_GET['id_autor'];
$sql_instituicao = "SELECT * FROM tb_instituicao WHERE trabalho_id=$id_trabalho";
$res_instituicao = mysqlexecuta($id,$sql_instituicao);
$sql_autores = "SELECT * FROM tb_autores WHERE id=$id_autor";
$res_autores = mysqlexecuta($id,$sql_autores);
$row_autores = mysql_fetch_array($res_autores)
?>
<h1 class="ls-title-intro ls-ico-pencil2">Autores</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="30" class="ls-animated"></div>
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_edita_autor_2.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $id_autor; ?>" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Nome</b>
      <input type="text" name="nome" placeholder="Nome Completo" value="<? echo $row_autores['nome']; ?>" required >
    </label>
    <label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" placeholder="E-mail" value="<? echo $row_autores['email']; ?>" required >
  </label>
    <label class="ls-label col-md-3">
    <b class="ls-label-text">Nome Cient&iacute;fico</b>
    <input type="text" name="nome_cientifico" placeholder="" value="<? echo $row_autores['nome_cientifico']; ?>" required >
  </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Filia&ccedil;&atilde;o</b>
      <div class="ls-custom-select">
        <select class="ls-custom" name="inst">
          <option value="<? echo $row_autores['inst1']; ?>">Selecione</option>
<?
    while($row_instituicao = mysql_fetch_array($res_instituicao)){
?>
          <option value="<? echo $row_instituicao['id']; ?>"><? echo $row_instituicao['depto'].'/'.$row_instituicao['inst'].'/'.$row_instituicao['sigla_inst']; ?></option>
<?
}
?>
        </select>
      </div>
    </label>
<hr />
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
</div>
