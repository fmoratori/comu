<?
$id_trabalho = $_GET['id_trabalho'];
$msg = $_GET['msg'];
?>
<h1 class="ls-title-intro ls-ico-pencil2">Institui&ccedil;&otilde;es</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="0" class="ls-animated"></div>
<br />
<div class="ls-alert-warning"><strong>Insira aqui as institui&ccedil;&otilde;es de todos os autores.</strong></div>
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_instituicoes_2.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Departamento</b>
      <input type="text" name="departamento" placeholder="Departamento" value="" required >
    </label>
    <label class="ls-label col-md-4">
    <b class="ls-label-text">Sigla Instituto</b>
    <input type="text" name="instituto" placeholder="Instituto" required >
  </label>
  <label class="ls-label col-md-4">
    <b class="ls-label-text">Sigla Institui&ccedil;&atilde;o</b>
    <input type="text" name="instituicao" placeholder="Institui&ccedil;&atilde;o" required >
  </label>
<hr />
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
</div>
<?
    $sql_instituicao = "SELECT * FROM tb_instituicao WHERE trabalho_id=$id_trabalho";
    $res_instituicao = mysqlexecuta($id,$sql_instituicao);

if($msg==1){
?>
<div class="ls-alert-danger ls-dismissable">
  <span class="ls-dismiss" data-ls-module="dismiss">&times;</span>
  <strong>N&atilde;o &eacute; poss&iacute;vel remover essa institui&ccedil;&atilde;o pois existem autores vinculados a ela.</strong>
</div>
<?
}
?>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Departamento</th>
      <th class="hidden-xs">Instituto</th>
      <th class="hidden-xs">Institui&ccedil;&atilde;o</th>
      <th></th>  
    </tr>
  </thead>
  <tbody>
<?
$x=0;
    while($row_instituicao = mysql_fetch_array($res_instituicao)){
?>
    <tr>
      <td><? echo $row_instituicao['depto']; ?></td>
      <td><? echo $row_instituicao['inst']; ?></td>
      <td><? echo $row_instituicao['sigla_inst']; ?></td>
      <td><a href="./principal.php?pg=remove_instituicao_2.php&id_trabalho=<? echo $id_trabalho; ?>&id_instituicao=<? echo $row_instituicao['id']; ?>" class="ls-ico-remove"></a></td>
    </tr>
<?              
$x++;
    }
?>
  </tbody>
</table>
<?
if($x>0){
?>
<form action="./principal.php?pg=autores_2.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>

<?    
}