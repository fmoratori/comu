<?
$id_trabalho = $_GET['id_trabalho'];
    $sql_instituicao = "SELECT * FROM tb_instituicao WHERE trabalho_id=$id_trabalho";
    $res_instituicao = mysqlexecuta($id,$sql_instituicao);

?>


<?
if($idioma==1 || $idioma==null){
    ?>
<h1 class="ls-title-intro ls-ico-pencil2">Autores</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/5)*2),2); ?>" class="ls-animated"></div>
<br />
<!--div class="ls-alert-warning"><strong>Insira os Autores na Ordem de Apresentação. </strong></div--->
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_autores.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Nome</b>
      <input type="text" name="nome" placeholder="Nome Completo" value="" required >
    </label>
    <label class="ls-label col-md-4">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" placeholder="E-mail" required >
  </label>
    <!--label class="ls-label col-md-4">
      <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
      <div class="ls-custom-select">
        <select class="ls-custom" name="inst">
          <option selected="selected">Selecione</option>
<?
    while($row_instituicao = mysql_fetch_array($res_instituicao)){
?>
          <option value="<? echo $row_instituicao['id']; ?>"><? echo $row_instituicao['depto'].'/'.$row_instituicao['inst'].'/'.$row_instituicao['sigla_inst']; ?></option>
<?
}
?>
        </select>
      </div>
    </label--->
<hr />
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
</div>
<?
    $sql_autores = "SELECT * FROM tb_autores WHERE trabalho_id=$id_trabalho ORDER BY `ordenacao` ASC";
    $res_autores = mysqlexecuta($id,$sql_autores);

?>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th class="hidden-xs">Nome</th>
      <th class="hidden-xs">E-mail</th>
      <th>Nome Cient&iacute;fico</th>      
      <!---th class="hidden-xs">Institui&ccedil;&atilde;o</th---->      
      <th></th>  
    </tr>
  </thead>
  <tbody>
<?
$x=0;
    while($row_autores = mysql_fetch_array($res_autores)){
        $inst_autor = $row_autores['inst1'];
        $sql_inst_autor = "SELECT * FROM tb_instituicao WHERE id = $inst_autor";
        $res_inst_autor = mysqlexecuta($id,$sql_inst_autor);
        $row_inst_autor = mysql_fetch_array($res_inst_autor);
?>
    <tr>
      <td><? echo $row_autores['nome']; ?></td>
      <td><? echo $row_autores['email']; ?></td>
      <td><a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>"><? echo $row_autores['nome_cientifico']; ?></a></td>
      <!---td><? //echo $row_inst_autor['depto'].'/'.$row_inst_autor['inst'].'/'.$row_inst_autor['sigla_inst']; ?></td--->
<?
    if($row_autores['ordenacao']==100){
        ?>
              <td><B>ORIENTADOR</B></td>
        <?
    }
    else{
?>      
      <td>
      <a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-pencil"></a>
      <a href="./principal.php?pg=remove_autores.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-remove"></a></td>
<?
}
?>
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
<a href="./principal.php?pg=orientador.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<a href="./principal.php?pg=altera_ordenacao.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-up">Alterar Ordem dos Autores</a>
<a href="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-right">Próximo</a>

<!--form action="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form-->

<?    
}



}   
?>


<?
if($idioma==2){
    ?>
<h1 class="ls-title-intro ls-ico-pencil2">Authors</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/5)*2),2); ?>" class="ls-animated"></div>
<br />
<!--div class="ls-alert-warning"><strong>Insira os Autores na Ordem de Apresentação. </strong></div--->
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_autores.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Name</b>
      <input type="text" name="nome" placeholder="Name" value="" <? echo $disabled; ?> required >
    </label>
    <label class="ls-label col-md-4">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" placeholder="E-mail" <? echo $disabled; ?> required >
  </label>
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Filiation</b>
      <div class="ls-custom-select">
        <select class="ls-custom" name="inst" <? echo $disabled; ?> >
          <option selected="selected">Choose</option>
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
    <button class="ls-btn">Save</button>
  </div>
</form>
</div>
<?
    $sql_autores = "SELECT * FROM tb_autores WHERE trabalho_id=$id_trabalho ORDER BY `ordenacao` ASC";
    $res_autores = mysqlexecuta($id,$sql_autores);

?>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th class="hidden-xs">Name</th>
      <th class="hidden-xs">E-mail</th>
      <th>Scientific Name</th>      
      <th class="hidden-xs">Filiation</th>    
      <th></th>  
    </tr>
  </thead>
  <tbody>
<?
$x=0;
    while($row_autores = mysql_fetch_array($res_autores)){
        $inst_autor = $row_autores['inst1'];
        $sql_inst_autor = "SELECT * FROM tb_instituicao WHERE id = $inst_autor";
        $res_inst_autor = mysqlexecuta($id,$sql_inst_autor);
        $row_inst_autor = mysql_fetch_array($res_inst_autor);
?>
    <tr>
      <td><? echo $row_autores['nome']; ?></td>
      <td><? echo $row_autores['email']; ?></td>
      <td><a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>"><? echo $row_autores['nome_cientifico']; ?></a></td>
      <td><? echo $row_inst_autor['depto'].'/'.$row_inst_autor['inst'].'/'.$row_inst_autor['sigla_inst']; ?></td>
<?
    if($row_autores['ordenacao']==100){
        ?>
              <td><B>ORIENTADOR</B></td>
        <?
    }
    else{
?>      
      <td>
      <a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-pencil"></a>
      <a href="./principal.php?pg=remove_autores.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-remove"></a></td>
<?
}
?>
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
<a href="./principal.php?pg=orientador.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<a href="./principal.php?pg=altera_ordenacao.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-up">Alterar Ordem dos Autores</a>
<a href="./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-right">Próximo</a>

<!--form action="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form-->

<?    
}



}   
?>


<?
if($idioma==3){
    ?>
<h1 class="ls-title-intro ls-ico-pencil2">Autores</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*2),2); ?>" class="ls-animated"></div>
<br />
<!--div class="ls-alert-warning"><strong>Insira os Autores na Ordem de Apresentação. </strong></div--->
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_autores.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Nombre</b>
      <input type="text" name="nome" placeholder="Nombre" value="" <? echo $disabled; ?> required >
    </label>
    <label class="ls-label col-md-4">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" placeholder="E-mail" <? echo $disabled; ?> required >
  </label>
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Filiación</b>
      <div class="ls-custom-select">
        <select class="ls-custom" name="inst" <? echo $disabled; ?> >
          <option selected="selected">Choose</option>
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
    <button class="ls-btn">Save</button>
  </div>
</form>
</div>
<?
    $sql_autores = "SELECT * FROM tb_autores WHERE trabalho_id=$id_trabalho ORDER BY `ordenacao` ASC";
    $res_autores = mysqlexecuta($id,$sql_autores);

?>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th class="hidden-xs">Nombre</th>
      <th class="hidden-xs">E-mail</th>
      <th>Nombre Científico</th>      
      <th class="hidden-xs">Filiación</th>    
      <th></th>  
    </tr>
  </thead>
  <tbody>
<?
$x=0;
    while($row_autores = mysql_fetch_array($res_autores)){
        $inst_autor = $row_autores['inst1'];
        $sql_inst_autor = "SELECT * FROM tb_instituicao WHERE id = $inst_autor";
        $res_inst_autor = mysqlexecuta($id,$sql_inst_autor);
        $row_inst_autor = mysql_fetch_array($res_inst_autor);
?>
    <tr>
      <td><? echo $row_autores['nome']; ?></td>
      <td><? echo $row_autores['email']; ?></td>
      <td><a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>"><? echo $row_autores['nome_cientifico']; ?></a></td>
      <td><? echo $row_inst_autor['depto'].'/'.$row_inst_autor['inst'].'/'.$row_inst_autor['sigla_inst']; ?></td>
<?
    if($row_autores['ordenacao']==100){
        ?>
              <td><B>ORIENTADOR</B></td>
        <?
    }
    else{
?>      
      <td>
      <a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-pencil"></a>      
      <a href="./principal.php?pg=remove_autores.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>&idioma=3" class="ls-ico-remove"></a></td>
<?
}
?>
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
<a href="./principal.php?pg=orientador.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<a href="./principal.php?pg=altera_ordenacao.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-up">Alterar Ordem dos Autores</a>
<a href="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-right">Próximo</a>

<!--form action="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form-->

<?    
}



}   
?>
