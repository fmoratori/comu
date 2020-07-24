<?
$ver = $_GET['ver'];
?>
<h1 class="ls-title-intro ls-ico-pencil">Consulta Trabalhos - Por N&atilde;o Pagos</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=consulta_trabalhos_pagos.php&ver=1" class="ls-form ls-form-inline row" method="POST">
 <fieldset>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">

<select class="ls-custom" name="status">
<option value="">Todos</option>
<?
$sql5 = "SELECT * FROM `tb_status`";
$res5 = mysqlexecuta($id,$sql5);
while ($row5 = mysql_fetch_array($res5)) {
?>
	    <option value="<? echo $row5['id'] ?>"><? echo utf8_encode($row5['status']); ?> </option>  
<?	
}
?>
</select>

</div>

</label>

    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">

<select class="ls-custom" name="premio">
<option value="">Selecione o Prêmio</option>
<?
$sql6 = "SELECT * FROM `tb_premio`";
$res6 = mysqlexecuta($id,$sql6);
while ($row6 = mysql_fetch_array($res6)) {
?>
	    <option value="<? echo $row6['id'] ?>"><? echo utf8_encode($row6['nome']); ?> </option>  
<?	
}
?>
</select>

</div>

</label>


</fieldset>





<fieldset>
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Buscar</button>
    </label>
</fieldset>
  </form>
</div>





<?
if($ver==1){
$premio = $_POST['premio'];
    $complemento = '';
    $status = $_POST['status'];
    $premio_consult ='';
if($premio!=""){
	$premio_consult = 'AND premio = '.$premio;
	}

    if($status != null){
        $complemento = "AND `status`= $status";
    }
    $sql_consulta_trabalhos = "SELECT * FROM tb_trabalhos WHERE `usuario_id` IN (SELECT user_id FROM tb_boleto WHERE `situacao` != 'PG' AND `situacao` != 'IS') $complemento $premio_consult";
    $res_consulta_trabalhos = mysqlexecuta($id,$sql_consulta_trabalhos);
    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th width='6%'>ID</th>
      <th width='20%'>Nome Inscrito</th>    
      <th width='23%'>Título</th>
      <th width='23%'>Área</th>
      <th class="hidden-xs" width='18%'>E-mail</th>
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
        $id_area = $row_consulta_trabalhos['area_id'];    
    $sql_consulta_area = "SELECT * FROM tb_areas WHERE `id` = $id_area";
    $res_consulta_area = mysqlexecuta($id,$sql_consulta_area);
    $row_consulta_area = mysql_fetch_array($res_consulta_area);
    echo "<td>".utf8_encode($row_consulta_area['nome_area']).'</td>';
        echo "<td>".utf8_encode($row_consulta_nome_autor['email'])."</td>";
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
<a href="#" class='ls-ico-user' onclick="window.open('http://www.fmsys.com.br/fmsys/fesbe/comu2019/admin/autores_admin.php?id_trabalho=<? echo $id_trabalho; ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"></a>
<?
}

        echo "</tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";
}
?>
