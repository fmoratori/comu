<?
$id_trabalho = $_GET['id_trabalho'];
$msg = $_GET['msg'];
?>




<?
if($idioma==1 || $idioma==null){
?>

<h1 class="ls-title-intro ls-ico-pencil2">Institui&ccedil;&otilde;es</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="0" class="ls-animated"></div>
<br />
<!--div class="ls-alert-warning"><strong>Insira aqui as instituições de todos os autores.</strong></div--->
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
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
      <td><a href="./principal.php?pg=remove_instituicao.php&id_trabalho=<? echo $id_trabalho; ?>&id_instituicao=<? echo $row_instituicao['id']; ?>" class="ls-ico-remove"></a></td>
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
<form action="./principal.php?pg=orientador.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>

<?    
}



}
?>







<?
if($idioma==2){
?>

<h1 class="ls-title-intro ls-ico-pencil2">Instituitions</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="0" class="ls-animated"></div>
<br />
<!--div class="ls-alert-warning"><strong>Insira aqui as instituições de todos os autores.</strong></div-->
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Departament</b>
      <input type="text" name="departamento" placeholder="Departament" value="" required >
    </label>
    <label class="ls-label col-md-4">
    <b class="ls-label-text">Institute</b>
    <input type="text" name="instituto" placeholder="Institute" required >
  </label>
  <label class="ls-label col-md-4">
    <b class="ls-label-text">Instituition</b>
    <input type="text" name="instituicao" placeholder="Instituition" required >
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
      <th>Departament</th>
      <th class="hidden-xs">Institute</th>
      <th class="hidden-xs">Instituition</th>
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
      <td><a href="./principal.php?pg=remove_instituicao.php&id_trabalho=<? echo $id_trabalho; ?>&id_instituicao=<? echo $row_instituicao['id']; ?>&idioma=2" class="ls-ico-remove"></a></td>
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
<form action="./principal.php?pg=orientador.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Next</button>
  </div>
</form>

<?    
}



}
?>






<?
if($idioma==3){
?>

<h1 class="ls-title-intro ls-ico-pencil2">Instituiciones</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="0" class="ls-animated"></div>
<br />
<!--div class="ls-alert-warning"><strong>Insira aqui as instituições de todos os autores.</strong></div-->
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Setor</b>
      <input type="text" name="departamento" placeholder="Setor" value="" required >
    </label>
    <label class="ls-label col-md-4">
    <b class="ls-label-text">Instituto</b>
    <input type="text" name="instituto" placeholder="Instituto" required >
  </label>
  <label class="ls-label col-md-4">
    <b class="ls-label-text">Institución</b>
    <input type="text" name="instituicao" placeholder="Institución" required >
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
      <th>Setor</th>
      <th class="hidden-xs">Instituto</th>
      <th class="hidden-xs">Institución</th>
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
      <td><a href="./principal.php?pg=remove_instituicao.php&id_trabalho=<? echo $id_trabalho; ?>&id_instituicao=<? echo $row_instituicao['id']; ?>&idioma=3" class="ls-ico-remove"></a></td>
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
<form action="./principal.php?pg=orientador.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Próximo</button>
  </div>
</form>

<?    
}



}
?>