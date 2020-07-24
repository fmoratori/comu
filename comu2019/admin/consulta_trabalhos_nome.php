<?
$ver = $_GET['ver'];
?>
<h1 class="ls-title-intro ls-ico-pencil">Consulta Trabalhos - Por Nome</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=consulta_trabalhos_nome.php&ver=1" class="ls-form ls-form-inline row" method="POST">
<fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Digite o Texto</b>
        <input type="text" name="texto" placeholder="Texto da Busca" value="" />
    </label>
    </fieldset>
<hr />
 <fieldset>
    <div class="ls-label col-md-1 ls-form" role='search'>
      <!--b class="ls-label-text">Critério de Busca</b-->
      <label class="ls-label-text">
        <input type="radio" name="criterio" value="nome">
        Nome
        <input type="radio" name="criterio" value="email">
        E-mail
        <input type="radio" name="criterio" value="CPF">
        CPF
              </label>
    </div>


</fieldset>





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
if($area!=""){
	$area_consult = 'AND area_id = '.$area;
	}
if($status!=""){
	$status_consult = 'AND status = '.$status;
	}

if($ver==1){
    $sql_consulta_trabalhos = "SELECT * FROM tb_trabalhos WHERE usuario_id IN (SELECT id FROM tb_usuario WHERE `$criterio` LIKE '$texto')";
    $res_consulta_trabalhos = mysqlexecuta($id,$sql_consulta_trabalhos);

    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th width='6%'>ID</th>
      <th width='20%'>Nome Inscrito</th>    
      <th width='23%'>Título</th>
      <th class="hidden-xs" width='18%'>Área</th>
      <th width='30%'>Status</th>
      <th class="hidden-xs" width='3%'>Avaliador</th>
      <th class="hidden-xs" width='8%'>Ações</th>
    </tr>
  </thead>
  <tbody>
<?
$x=0;
   while($row_consulta_trabalhos = mysql_fetch_array($res_consulta_trabalhos)){
        $x++;     
        echo "<tr>";
        $id_trabalho = $row_consulta_trabalhos['id'];
        echo "<td>".utf8_encode($row_consulta_trabalhos['id'])."</td>";
    $sql_consulta_nome_autor = "SELECT * FROM tb_usuario WHERE id IN (SELECT usuario_id FROM tb_trabalhos WHERE id = $id_trabalho)";
    $res_consulta_nome_autor = mysqlexecuta($id,$sql_consulta_nome_autor);
    $row_consulta_nome_autor = mysql_fetch_array($res_consulta_nome_autor);
        echo "<td>".utf8_encode($row_consulta_nome_autor['nome'])."</td>";
        echo "<td>".utf8_encode($row_consulta_trabalhos['titulo'])."</td>";
        $area_trabalho = $row_consulta_trabalhos['area_id'];
    $sql_area_trabalhos = "SELECT * FROM tb_areas WHERE `id` = '$area_trabalho'";
    $res_area_trabalhos = mysqlexecuta($id,$sql_area_trabalhos);
    $row_area_trabalhos = mysql_fetch_array($res_area_trabalhos);    
        echo "<td>".utf8_encode($row_area_trabalhos['nome_area'])."</td>";
    $status = $row_consulta_trabalhos['status'];    
    $sql_status_trabalhos = "SELECT * FROM tb_status WHERE `id` = '$status'";
    $res_status_trabalhos = mysqlexecuta($id,$sql_status_trabalhos);
    $row_status_trabalhos = mysql_fetch_array($res_status_trabalhos);    
    $id_status = $row_status_trabalhos['id'];
    $status_nome = $row_status_trabalhos['status'];
    echo "<td>";
//    echo $row_status_trabalhos['status'];
?>

 <form action="troca_status.php?ver=1&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-inline ls-float-right" method="POST" target="_blank">
    <label class="ls-label col-md-8">
      <div class="ls-custom-select">
        <select class="ls-custom" name="novo_status">
<?
    echo "<option value='$id_status'>$status_nome</option>";        
    $sql_status_trabalhos = "SELECT * FROM tb_status";
    $res_status_trabalhos = mysqlexecuta($id,$sql_status_trabalhos);
    while($row_status_trabalhos = mysql_fetch_array($res_status_trabalhos)){
        $status_nome = utf8_encode($row_status_trabalhos['status']);
        $id_status = $row_status_trabalhos['id'];
        echo "<option value='$id_status'>$status_nome</option>";        
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
    echo "</td>";
    $avaliador = $row_consulta_trabalhos['avaliador_id'];
    $sql_avaliador_trabalhos = "SELECT * FROM tb_avaliador WHERE `id` = '$avaliador'";
    $res_avaliador_trabalhos = mysqlexecuta($id,$sql_avaliador_trabalhos);
    $row_avaliador_trabalhos = mysql_fetch_array($res_avaliador_trabalhos);            
        echo "<td>".$row_avaliador_trabalhos['nome']."</td>";
      //  echo "<td><a href='./principal_admin.php?pg=dados_inscrito.php&id_inscrito=".$row_consulta_trabalhos['id']."' class='ls-ico-eye' title='Dados Inscritos'></a>&nbsp;";
      //  echo "<a href='./principal_admin.php?pg=boletos.php&id_inscrito=".$row_consulta_trabalhos['id']."' class='ls-ico-cart' title='Dados de Boletos'></a></td>";
        echo "<td>";
?>
<a href="#" class='ls-ico-pencil' onclick="window.open('http://www.fmsys.com.br/fmsys/comu2019/admin/troca_avaliador.php?id_trabalho=<? echo $id_trabalho; ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"></a>
<?
if($status!=1){
?>
<a href="#" class='ls-ico-docs' onclick="window.open('http://www.fmsys.com.br/fmsys/comu2019/user/exibe_trabalho.php?id_trabalho=<? echo $id_trabalho; ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"></a>
<?
}
if($status!=10){
?>
<a href="#" class='ls-ico-user' onclick="window.open('http://www.fmsys.com.br/fmsys/comu2019/admin/autores_admin.php?id_trabalho=<? echo $id_trabalho; ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"></a>
<?
}

        echo "</tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";
}
?>
