<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-user">Consulta Inscritos - N&atilde;o Pagos</h1>

<?
if(1==1){
    $sql_consulta_inscritos = "SELECT * FROM tb_usuario WHERE `id` IN (SELECT user_id FROM `tb_boleto` WHERE `situacao` != 'PG' AND `situacao` != 'IS') ORDER BY `nome` ASC";
    $res_consulta_inscritos = mysqlexecuta($id,$sql_consulta_inscritos);
    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th class="hidden-xs">E-mail</th>
      <th>Telefone</th>
      <th class="hidden-xs">Celular</th>
      <th>A&ccedil;&otilde;es</th>
    </tr>
  </thead>
  <tbody>
<?
$x=0;
   while($row_consulta_inscritos = mysql_fetch_array($res_consulta_inscritos)){
    $x++;
        echo "<tr>";
        echo "<td>".utf8_encode($row_consulta_inscritos['nome'])."</td>";
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
        echo "<a href='./principal_admin.php?pg=boletos.php&id_inscrito=".$row_consulta_inscritos['id']."' class='ls-ico-cart' title='Dados de Boletos'></a></td>";
        echo "</tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";
}
?>