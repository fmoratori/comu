<?
$ver = $_GET['ver'];
$id_aval = $_GET['id_aval'];
    $sql_consulta_aval = "SELECT * FROM tb_avaliador WHERE id = $id_aval";
    $res_consulta_aval = mysqlexecuta($id,$sql_consulta_aval);
    $row_consulta_aval = mysql_fetch_array($res_consulta_aval);
    $areas_avaliacao = explode(',',$row_consulta_aval['area_avaliacao']);
?>

<h1 class="ls-title-intro ls-ico-eye">Cadastrar Avaliador</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=salva_edita_avaliador.php&ver=1&id_avaliador=<? echo $id_aval; ?>" class="ls-form-row" method="POST">
<fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Nome</b>
        <input type="text" name="nome" placeholder="Nome do Avaliador" value="<? echo $row_consulta_aval['nome'] ?>" required="required">
    </label>
 </fieldset>
 <br />
 <fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">E-mail</b>
        <input type="email" name="email" placeholder="E-mail" value="<? echo $row_consulta_aval['email'] ?>" required="required">
    </label>
 </fieldset>  
  <br />
 <fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Senha</b>
        <input type="text" name="senha" placeholder="Senha" value="<? echo $row_consulta_aval['senha'] ?>" required="required">
    </label>
 </fieldset> 
<br />
<?
    echo "<label class='ls-label-text'><b>&Aacute;reas para Avalia&ccedil&atilde;o</b><br /><br />";
    $sql_area = "SELECT * FROM tb_areas";
    $res_area = mysqlexecuta($id,$sql_area);
    while($row_area = mysql_fetch_array($res_area)){
    $id_area_aval = $row_area['id'];

    foreach($areas_avaliacao as $valores){
            if($valores==$id_area_aval){
                $teste = 'ok';
            }
    }
       if($teste == 'ok'){
        $checked = " checked='checked'";
        $teste ='';
        } 
       
        echo "<input type='checkbox' name=".$row_area['id'].$checked.">".utf8_encode($row_area['nome_area'])."<br />";
        $checked='';
        }
        echo "</label><br />";

?>
<fieldset>
<br />
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Salvar</button>
    </label>
</fieldset>
  </form>
</div>
<?
$texto = '%'.$_POST['texto'].'%';
$criterio = $_POST['criterio'];
if($criterio==''){
    $criterio = 'nome';
}
    $sql_consulta_avaliador = "SELECT * FROM tb_avaliador WHERE `$criterio` LIKE '$texto' ORDER BY `nome` ASC";
    $res_consulta_avaliador = mysqlexecuta($id,$sql_consulta_avaliador);
    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th class="hidden-xs">E-mail</th>
      <th class="hidden-xs">Senha</th>
      <th>A&ccedil;&otilde;es</th>
    </tr>
  </thead>
  <tbody>
<?
   while($row_consulta_avaliador = mysql_fetch_array($res_consulta_avaliador)){
        echo "<tr>";
        echo "<td>".utf8_encode($row_consulta_avaliador['nome'])."</td>";
        echo "<td>".$row_consulta_avaliador['email']."</td>";
        echo "<td>".$row_consulta_avaliador['senha']."</td>";
        echo "<td><a href='./principal_admin.php?pg=exclui_avaliador.php&id_avaliador=".$row_consulta_avaliador['id']."' class='ls-ico-remove' title='Excluir Avaliador'></a>&nbsp;";
        echo "</tr>";
   }

        echo "</table>";

?>