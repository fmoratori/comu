<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-eye">Cadastrar Avaliador</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=salva_avaliador.php&ver=1" class="ls-form-row" method="POST">
<fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Nome</b>
        <input type="text" name="nome" placeholder="Nome do Avaliador" value="" required="required">
    </label>
 </fieldset>
 <br />
 <fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">E-mail</b>
        <input type="email" name="email" placeholder="E-mail" value="" required="required">
    </label>
 </fieldset>  
  <br />
 <fieldset>
 <?
     $senha = rand (1111, 9999);
 ?>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Senha</b>
        <input type="text" name="senha" placeholder="Senha" value="<? echo $senha; ?>" required="required">
    </label>
 </fieldset> 
<br />
<?
    echo "<label class='ls-label-text'><b>&Aacute;reas para Avalia&ccedil&atilde;o</b><br /><br />";
    $sql_area = "SELECT * FROM tb_areas";
    $res_area = mysqlexecuta($id,$sql_area);
    while($row_area = mysql_fetch_array($res_area)){
        echo "<input type='checkbox' name=".$row_area['id'].">".utf8_encode($row_area['nome_area'])."<br />";
        }
        echo "</label><br />";

?>
<fieldset>
<br />
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Criar</button>
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
        echo "<td><a href='./principal_admin.php?pg=envia_email_aval.php&id=".$row_consulta_avaliador['id']."' class='ls-ico-envelope' title='E-mail Avaliador Novo' target='_blank'></a>&nbsp;&nbsp;".utf8_encode($row_consulta_avaliador['nome'])."</td>";
        echo "<td>".$row_consulta_avaliador['email']."</td>";
        echo "<td>".$row_consulta_avaliador['senha']."</td>";
        echo "<td><a href='./principal_admin.php?pg=exclui_avaliador.php&id_avaliador=".$row_consulta_avaliador['id']."' class='ls-ico-remove' title='Excluir Avaliador'></a>&nbsp;";
        echo "</tr>";
   }

        echo "</table>";

?>