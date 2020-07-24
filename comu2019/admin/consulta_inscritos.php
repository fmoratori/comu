<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-user">Consulta Inscritos</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=consulta_inscritos.php&ver=1" class="ls-form-row" method="POST">
<fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Digite o Texto</b>
        <input type="text" name="texto" placeholder="Texto da Busca" value="">
    </label>
 </fieldset>
<br />
<fieldset>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">
        <select class="ls-custom" name="categoria">

<option value="">Selecione a Categoria</option>
<?
$sql4 = "SELECT * FROM `tb_categoria`";
$res4 = mysqlexecuta($id,$sql4);
while ($row4 = mysql_fetch_array($res4)) {
?>
	    <option value="<? echo $row4['id'] ?>"><? echo $row4['id'].'-'.utf8_encode($row4['nome']); ?> </option>  
<?	
}
?>
        </select>
        </div>
        </label>

 <br />   


    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">
        <select class="ls-custom" name="pgto">

<option value="">Selecione a situação de pagamento</option>
	    <option value="NP">Não Pago</option> 
	    <option value="PG">Pago</option>         
        </select>
        </div>
        </label>



 <fieldset>
    <div class="ls-label col-md-5 ls-form" role='search'>
      <b class="ls-label-text">Critério de Busca</b>
      <label class="ls-label-text">
        <input type="radio" name="criterio" value="nome">
        Nome
        <input type="radio" name="criterio" value="email">
        E-mail
        <input type="radio" name="criterio"value="cpf">
        CPF
        <input type="radio" name="criterio"value="instituicao">
        Instituição
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
$cat = $_POST['categoria'];
$pgto = $_POST['pgto'];
if($cat!=''){
    $opcao1 = 'AND `categoria`='.$cat;
}
if($pgto!=''){
    if($pgto=='PG'){
    $opcao2 = " AND id IN(SELECT `user_id` FROM tb_boleto WHERE situacao='PG' OR situacao='IS')";
    }
    if($pgto=='NP'){
    $opcao2 = " AND id IN(SELECT `user_id` FROM tb_boleto WHERE situacao='NP' OR situacao='PE')";        
    }
}
$criterio = $_POST['criterio'];
if($criterio==''){
    $criterio = 'nome';
}
if($ver==1){
    $sql_consulta_inscritos = "SELECT * FROM tb_usuario WHERE `$criterio` LIKE '$texto' $opcao1 $opcao2 AND `cpf`!='' ORDER BY `id`";
//    echo $sql_consulta_inscritos;
    $res_consulta_inscritos = mysqlexecuta($id,$sql_consulta_inscritos);
    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Instituição</th>
      <th class="hidden-xs">E-mail</th>
      <th>Telefone</th>
      <th class="hidden-xs">Celular</th>
      <th>Categoria</th>
      <th>A&ccedil;&otilde;es</th>
    </tr>
  </thead>
  <tbody>
<?
$x=0;
   while($row_consulta_inscritos = mysql_fetch_array($res_consulta_inscritos)){
    $x++;
        echo "<tr>";
        echo "<td>".utf8_encode($row_consulta_inscritos['id'])."</td>";
        echo "<td>".utf8_encode($row_consulta_inscritos['nome'])."</td>";
        echo "<td>".utf8_encode($row_consulta_inscritos['instituicao'])."</td>";
        echo "<td>".$row_consulta_inscritos['email']."</td>";
        echo "<td>".$row_consulta_inscritos['telefone']."</td>";
        echo "<td>".$row_consulta_inscritos['celular']."</td>";


$user_id = $row_consulta_inscritos['id'];
    $categoria = $row_consulta_inscritos['categoria'];    
    $sql_categoria_inscrito = "SELECT * FROM tb_categoria WHERE `id` = '$categoria'";
    $res_categoria_inscrito = mysqlexecuta($id,$sql_categoria_inscrito);
    $row_categoria_inscrito = mysql_fetch_array($res_categoria_inscrito);    
    $id_categoria = $row_categoria_inscrito['id'];
    $categoria_nome = utf8_encode($row_categoria_inscrito['nome']);
    echo "<td>";
//    echo $row_categoria_inscrito['status'];
?>

 <form action="troca_categoria.php?ver=1&id_usuario=<? echo $user_id; ?>" class="ls-form ls-form-inline ls-float-right" method="POST" target="_blank">
    <label class="ls-label col-md-8">
      <div class="ls-custom-select">
        <select class="ls-custom" name="nova_categoria">
<?
    echo "<option value='$id_categoria'>$categoria_nome</option>";        
    $sql_categoria_inscrito = "SELECT * FROM tb_categoria";
    $res_categoria_inscrito = mysqlexecuta($id,$sql_categoria_inscrito);
    while($row_categoria_inscrito = mysql_fetch_array($res_categoria_inscrito)){
        $categoria_nome = utf8_encode($row_categoria_inscrito['nome']);
        $id_categoria = $row_categoria_inscrito['id'];
        echo "<option value='$id_categoria'>$categoria_nome</option>";        
    }            
?>
        </select>
      </div>
     <div class="ls-actions-btn" align='center'>
        <center><button class="ls-btn" align="center">Alterar</button></center>
        </div>    
    </label>
    </form>






<?
        echo "<td><a href='./principal_admin.php?pg=dados_inscrito.php&id_inscrito=".$row_consulta_inscritos['id']."' class='ls-ico-eye' title='Dados Inscritos'></a>&nbsp;";
        echo "<a href='./principal_admin.php?pg=boletos.php&id_inscrito=".$row_consulta_inscritos['id']."' class='ls-ico-cart' title='Dados de Boletos'></a>";
        echo "<a href='./principal_admin.php?pg=remove_usuario.php&id_inscrito=".$row_consulta_inscritos['id']."' class='ls-ico-remove' title='Remover Usuário' onclick='confirmExclusao()' target='_BLANK'></a>";
        echo "<a href='../cracha/imprime.php?id_inscrito=".$row_consulta_inscritos['id']."' class='ls-ico-users' target='_blank' title='Etiqueta Cracha'></a></td>";
        echo "</tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";
}
?>