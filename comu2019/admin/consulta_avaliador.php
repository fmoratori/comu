<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-eye">Consultar Avaliador</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=consulta_avaliador.php&ver=1" class="ls-form-row" method="POST">
<fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Digite o Texto</b>
        <input type="text" name="texto" placeholder="Texto da Busca" value="">
    </label>
 </fieldset>
 <br />   
 <fieldset>
    <div class="ls-label col-md-3 ls-form" role='search'>
      <b class="ls-label-text">Critério de Busca</b>
      <label class="ls-label-text">
        <input type="radio" name="criterio" value="nome">
        Nome
        <input type="radio" name="criterio" value="email">
        E-mail
      </label>
    </div>
  </fieldset>
<br />
<fieldset>
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Buscar</button>
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
if($ver==1){
    $sql_consulta_avaliador = "SELECT * FROM tb_avaliador WHERE `$criterio` LIKE '$texto' ORDER BY `id`";
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
        echo "<td><a href='./principal_admin.php?pg=envia_email_novo_aval.php&id=".$row_consulta_avaliador['id']."' class='ls-ico-envelope' title='E-mail Avaliador Novo' target='_blank'></a>&nbsp;&nbsp;".utf8_encode($row_consulta_avaliador['nome'])."</td>";
        echo "<td>".$row_consulta_avaliador['email']."</td>";
        echo "<td>".$row_consulta_avaliador['senha']."</td>";
        echo "<td><a href='./principal_admin.php?pg=editar_avaliador.php&id_aval=".$row_consulta_avaliador['id']."' class='ls-ico-pencil' title='Edita Avaliador'></a>&nbsp;";
        echo "</tr>";
   }

        echo "</table>";
}
?>