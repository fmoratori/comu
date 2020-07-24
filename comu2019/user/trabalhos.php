<?
if($idioma==1 || $idioma==null){
?>


<h1 class="ls-title-intro ls-ico-pencil2">Trabalhos</h1>
<?
$id_trabalho = $_GET['id_trabalho'];

$caracteres = $_GET['caracteres'];

    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
if($row_trabalhos!= NULL){
    $id_area_trabalho = $row_trabalhos['area_id'];
    $area_trabalho = "SELECT * FROM tb_areas WHERE id=$id_area_trabalho";
    $res_area_trabalho = mysqlexecuta($id,$area_trabalho);
    $row_area_trabalho = mysql_fetch_array($res_area_trabalho);
}


if($row_usuario['categoria']==10 || $row_usuario['categoria']==11){
$sql_areas = "SELECT * FROM tb_areas WHERE id > 25 ORDER BY id";
$res_areas = mysqlexecuta($id,$sql_areas);
}
else{
$sql_areas = "SELECT * FROM tb_areas WHERE id <= 25 ORDER BY id";
$res_areas = mysqlexecuta($id,$sql_areas);
}

$sql_premios = "SELECT * FROM tb_premio ORDER BY id";
$res_premios = mysqlexecuta($id,$sql_premios);
?>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*3),2); ?>" class="ls-animated"></div>
<br />
<?
if($caracteres != NULL){
    ?>
    <div class="ls-alert-danger"><strong>ATENÇÃO!</strong> Você ultrapassou o limite de 3500 caracteres. Total de Caracteres: <b><? echo $caracteres ?></b></div>
    <?
}
?>
<!--div class="ls-alert-warning">Limite de Caracteres: <b>3500</b> (N&atilde;o inclui t&iacute;tulo e autores).<br />Somente serão aceitos resumos de trabalhos quantitativos se apresentarem valores quantitativos como média e erro.</div--->

<form action="./principal.php?pg=armazena1.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=1" class="ls-form row" method="POST">
  <fieldset>
    <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Prize Area</b>
      <div class="ls-custom-select">
        <select name="area" class="ls-select">
<?
    echo "<option value='".$id_area_trabalho."'>".$row_area_trabalho['nome_area']."</option><br />";
    while($row_areas=mysql_fetch_array($res_areas)){
        echo "<option value='".$row_areas['id']."'>".$row_areas['nome_area']."</option><br />";
    }
?>

        </select>
      </div>
    </label>



  <fieldset>
    <!-- Exemplo com Radio button -->
    <!--div class="ls-label col-md-5">
      <p>Prêmio:</p>
<?
    while($row_premios=mysql_fetch_array($res_premios)){
        $checked = '';
if($row_premios['id']==$row_trabalhos['premio']){ $checked =' checked'; }
$premio =  $row_trabalhos['premio'];
?>
      <label class="ls-label-text"><input type="radio" required="required" checked="checked" <? echo $checked; ?> value="<? echo '6'; ?>" name="premio"><? echo "Envio Tardio" ?></label>
<?
}
?>
    </div-->
  </fieldset>




    <label class="ls-label col-md-8">
      <b class="ls-label-text">Title</b>
      <input type="text" name="titulo" placeholder="Title" value="<? echo $row_trabalhos['titulo']; ?>" required >
    </label>
    <!--label class="ls-label col-md-8">
      <b class="ls-label-text">Introdução</b>
      <textarea name="introducao" rows="10" required ><? echo $row_trabalhos['introducao']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Objetivos</b>
      <textarea name="objetivos"  rows="10" required ><? echo $row_trabalhos['objetivos']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Métodos</b>
      <textarea name="metodos" rows="10" required ><? echo $row_trabalhos['metodos']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Resultados</b>
      <textarea name="resultados" rows="10" required ><? echo $row_trabalhos['resultados']; ?></textarea>
    </label>

    <label class="ls-label col-md-8">
      <b class="ls-label-text">Conclusão</b>
      <textarea name="conclusao" rows="10" required ><? echo $row_trabalhos['conclusao']; ?></textarea>
    </label>

     <label class="ls-label col-md-8">
      <b class="ls-label-text">Apoio Financeiro</b>
      <input type="text" name="apoio" placeholder="" value="<? echo $row_trabalhos['apoio']; ?>" required >
    </label>
    
     <label class="ls-label col-md-8">
      <b class="ls-label-text">Código do Comitê de Ética</b>
      <input type="text" name="comite" placeholder="" value="<? echo $row_trabalhos['comite']; ?>" >
    </label--->
<?
if($row_trabalhos['status']==6){
    ?>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Mensagem ao Avaliador (Escreve aqui algum comentário que queira enviar ao avaliador):</b>
      <textarea data-ls-module="charCounter" maxlength="150" name="justifique"><? echo $row_trabalhos['msg_avaliador']; ?></textarea>
    </label>
    <?
    }
    ?>
  </fieldset>
    <a href="./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=1" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
    <button class="ls-btn-dark ls-ico-chevron-right">Pr&oacute;ximo</button>

  <!--div class="ls-actions-btn">
  </div-->
</form>
<?
}
?>




<?
if($idioma==2){
?>


<h1 class="ls-title-intro ls-ico-pencil2">Abstract</h1>
<?
$id_trabalho = $_GET['id_trabalho'];

$caracteres = $_GET['caracteres'];

    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
if($row_trabalhos!= NULL){
    $id_area_trabalho = $row_trabalhos['area_id'];
    $area_trabalho = "SELECT * FROM tb_areas WHERE id=$id_area_trabalho";
    $res_area_trabalho = mysqlexecuta($id,$area_trabalho);
    $row_area_trabalho = mysql_fetch_array($res_area_trabalho);
}


if($row_usuario['categoria']==10 || $row_usuario['categoria']==11){
$sql_areas = "SELECT * FROM tb_areas WHERE id > 25 ORDER BY id";
$res_areas = mysqlexecuta($id,$sql_areas);
}
else{
$sql_areas = "SELECT * FROM tb_areas WHERE id <= 25 ORDER BY id";
$res_areas = mysqlexecuta($id,$sql_areas);
}

$sql_premios = "SELECT * FROM tb_premio ORDER BY id";
$res_premios = mysqlexecuta($id,$sql_premios);
?>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*3),2); ?>" class="ls-animated"></div>
<br />
<?
if($caracteres != NULL){
    ?>
    <div class="ls-alert-danger"><strong>ATENÇÃO!</strong> Você ultrapassou o limite de 3500 caracteres. Total de Caracteres: <b><? echo $caracteres ?></b></div>
    <?
}
?>
<div class="ls-alert-warning">Limit of Character: <b>3500</b> (Not included title e authors).<br /></div>

<form action="./principal.php?pg=armazena1.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-form row" method="POST">
  <fieldset>
    <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Area</b>
      <div class="ls-custom-select">
        <select name="area" class="ls-select">
<?
    echo "<option value='".$id_area_trabalho."'>".$row_area_trabalho['nome_area']."</option><br />";
    while($row_areas=mysql_fetch_array($res_areas)){
        echo "<option value='".$row_areas['id']."'>".$row_areas['nome_area']."</option><br />";
    }
?>

        </select>
      </div>
    </label>



  <fieldset>
    <!-- Exemplo com Radio button -->
    <!--div class="ls-label col-md-5">
      <p>Prêmio:</p>
<?
    while($row_premios=mysql_fetch_array($res_premios)){
        $checked = '';
if($row_premios['id']==$row_trabalhos['premio']){ $checked =' checked'; }
$premio =  $row_trabalhos['premio'];
?>
      <label class="ls-label-text"><input type="radio" required="required" checked="checked" <? echo $checked; ?> value="<? echo '6'; ?>" name="premio"><? echo "Envio Tardio" ?></label>
<?
}
?>
    </div-->
  </fieldset>




    <label class="ls-label col-md-8">
      <b class="ls-label-text">Title</b>
      <input type="text" name="titulo" placeholder="T&iacute;tulo" value="<? echo $row_trabalhos['titulo']; ?>" required >
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">introduction</b>
      <textarea name="introducao" rows="10" required ><? echo $row_trabalhos['introducao']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Objectives</b>
      <textarea name="objetivos"  rows="10" required ><? echo $row_trabalhos['objetivos']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Methods</b>
      <textarea name="metodos" rows="10" required ><? echo $row_trabalhos['metodos']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Results</b>
      <textarea name="resultados" rows="10" required ><? echo $row_trabalhos['resultados']; ?></textarea>
    </label>

    <label class="ls-label col-md-8">
      <b class="ls-label-text">Conclusion</b>
      <textarea name="conclusao" rows="10" required ><? echo $row_trabalhos['conclusao']; ?></textarea>
    </label>

     <label class="ls-label col-md-8">
      <b class="ls-label-text">Financial Support</b>
      <input type="text" name="apoio" placeholder="" value="<? echo $row_trabalhos['apoio']; ?>" required >
    </label>
    
     <label class="ls-label col-md-8">
      <b class="ls-label-text">Ethics Committee</b>
      <input type="text" name="comite" placeholder="" value="<? echo $row_trabalhos['comite']; ?>" >
    </label>
<?
if($row_trabalhos['status']==6){
    ?>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Mensagem ao Avaliador (Escreve aqui algum comentário que queira enviar ao avaliador):</b>
      <textarea data-ls-module="charCounter" maxlength="150" name="justifique"><? echo $row_trabalhos['msg_avaliador']; ?></textarea>
    </label>
    <?
    }
    ?>
  </fieldset>
    <a href="./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
    <button class="ls-btn-dark ls-ico-chevron-right">Next</button>

  <!--div class="ls-actions-btn">
  </div-->
</form>
<?
}
?>



<?
if($idioma==3){
?>


<h1 class="ls-title-intro ls-ico-pencil2">Resumen</h1>
<?
$id_trabalho = $_GET['id_trabalho'];

$caracteres = $_GET['caracteres'];

    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
if($row_trabalhos!= NULL){
    $id_area_trabalho = $row_trabalhos['area_id'];
    $area_trabalho = "SELECT * FROM tb_areas WHERE id=$id_area_trabalho";
    $res_area_trabalho = mysqlexecuta($id,$area_trabalho);
    $row_area_trabalho = mysql_fetch_array($res_area_trabalho);
}


if($row_usuario['categoria']==10 || $row_usuario['categoria']==11){
$sql_areas = "SELECT * FROM tb_areas WHERE id > 25 ORDER BY id";
$res_areas = mysqlexecuta($id,$sql_areas);
}
else{
$sql_areas = "SELECT * FROM tb_areas WHERE id <= 25 ORDER BY id";
$res_areas = mysqlexecuta($id,$sql_areas);
}

$sql_premios = "SELECT * FROM tb_premio ORDER BY id";
$res_premios = mysqlexecuta($id,$sql_premios);
?>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*3),2); ?>" class="ls-animated"></div>
<br />
<?
if($caracteres != NULL){
    ?>
    <div class="ls-alert-danger"><strong>ATENÇÃO!</strong> Você ultrapassou o limite de 3500 caracteres. Total de Caracteres: <b><? echo $caracteres ?></b></div>
    <?
}
?>
<div class="ls-alert-warning">Límite de Caracteres: <b>3500</b> (no incluye titulos y autores).<br /></div>

<form action="./principal.php?pg=armazena1.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3" class="ls-form row" method="POST">
  <fieldset>
    <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Area</b>
      <div class="ls-custom-select">
        <select name="area" class="ls-select">
<?
    echo "<option value='".$id_area_trabalho."'>".$row_area_trabalho['nome_area']."</option><br />";
    while($row_areas=mysql_fetch_array($res_areas)){
        echo "<option value='".$row_areas['id']."'>".$row_areas['nome_area']."</option><br />";
    }
?>

        </select>
      </div>
    </label>



  <fieldset>
    <!-- Exemplo com Radio button -->
    <!--div class="ls-label col-md-5">
      <p>Prêmio:</p>
<?
    while($row_premios=mysql_fetch_array($res_premios)){
        $checked = '';
if($row_premios['id']==$row_trabalhos['premio']){ $checked =' checked'; }
$premio =  $row_trabalhos['premio'];
?>
      <label class="ls-label-text"><input type="radio" required="required" checked="checked" <? echo $checked; ?> value="<? echo '6'; ?>" name="premio"><? echo "Envio Tardio" ?></label>
<?
}
?>
    </div-->
  </fieldset>




    <label class="ls-label col-md-8">
      <b class="ls-label-text">Titulo</b>
      <input type="text" name="titulo" placeholder="T&iacute;tulo" value="<? echo $row_trabalhos['titulo']; ?>" required >
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Introducción</b>
      <textarea name="introducao" rows="10" required ><? echo $row_trabalhos['introducao']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Objectivos</b>
      <textarea name="objetivos"  rows="10" required ><? echo $row_trabalhos['objetivos']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Metodos</b>
      <textarea name="metodos" rows="10" required ><? echo $row_trabalhos['metodos']; ?></textarea>
    </label>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Resultados</b>
      <textarea name="resultados" rows="10" required ><? echo $row_trabalhos['resultados']; ?></textarea>
    </label>

    <label class="ls-label col-md-8">
      <b class="ls-label-text">Conclusion</b>
      <textarea name="conclusao" rows="10" required ><? echo $row_trabalhos['conclusao']; ?></textarea>
    </label>

     <label class="ls-label col-md-8">
      <b class="ls-label-text">Soporte Financiero</b>
      <input type="text" name="apoio" placeholder="" value="<? echo $row_trabalhos['apoio']; ?>" required >
    </label>
    
     <label class="ls-label col-md-8">
      <b class="ls-label-text">Comité de Ética</b>
      <input type="text" name="comite" placeholder="" value="<? echo $row_trabalhos['comite']; ?>" >
    </label>
<?
if($row_trabalhos['status']==6){
    ?>
    <label class="ls-label col-md-8">
      <b class="ls-label-text">Mensagem ao Avaliador (Escreve aqui algum comentário que queira enviar ao avaliador):</b>
      <textarea data-ls-module="charCounter" maxlength="150" name="justifique"><? echo $row_trabalhos['msg_avaliador']; ?></textarea>
    </label>
    <?
    }
    ?>
  </fieldset>
    <a href="./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
    <button class="ls-btn-dark ls-ico-chevron-right">Next</button>

  <!--div class="ls-actions-btn">
  </div-->
</form>
<?
}
?>

