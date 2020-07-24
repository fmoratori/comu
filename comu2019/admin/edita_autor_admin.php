<!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>

<?
include './mysqlconecta.php';
include './mysqlexecuta.php';
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
<form action="./armazena_edita_autor_admin.php?id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $id_autor; ?>" class="ls-form ls-form-horizontal" method="POST">
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
