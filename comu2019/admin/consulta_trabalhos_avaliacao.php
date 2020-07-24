<?
$ver = $_GET['ver'];
?>
<h1 class="ls-title-intro ls-ico-pencil">Trabalhos Para Avalia&ccedil;&atilde;o</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=consulta_trabalhos_avaliacao.php&ver=1" class="ls-form ls-form-inline row" method="POST">
 <fieldset>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">

<select class="ls-custom" name="area">
<option value="">Todos</option>
<?
$sql5 = "SELECT * FROM `tb_areas`";
$res5 = mysqlexecuta($id,$sql5);
while ($row5 = mysql_fetch_array($res5)) {
?>
	    <option value="<? echo $row5['id'] ?>"><? echo $row5['id'].' - '.utf8_encode($row5['nome_area']); ?> </option>  
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
    $complemento = '';
    $area = $_POST['area'];
    if($area != null){
        $complemento = "AND `area_id`= $area";
    }
    $sql_consulta_trabalhos = "SELECT * FROM tb_trabalhos WHERE `usuario_id` IN (SELECT user_id FROM tb_boleto WHERE `situacao` = 'PG' OR `situacao` = 'IS') $complemento AND `status`=3 AND `avaliador_id`=0 ORDER BY `id` ASC";
    //echo $sql_consulta_trabalhos;
    $res_consulta_trabalhos = mysqlexecuta($id,$sql_consulta_trabalhos);

    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th width='2%'>ID</th>
      <th width='20%'>T&iacute;tulo</th>    
      <th width='20%'>Autores</th>
      <th class="hidden-xs" width='10%'>&Aacute;rea</th>
      <th width='10%'>Status</th>
      <th class="hidden-xs" width='30%'>Avaliador</th>
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
        echo "<td>".utf8_encode($row_consulta_trabalhos['titulo'])."</td>";
    $sql_consulta_autores = "SELECT * FROM tb_autores WHERE `trabalho_id` = $id_trabalho";
    $res_consulta_autores = mysqlexecuta($id,$sql_consulta_autores);
    echo "<td>";
    while($row_consulta_autores = mysql_fetch_array($res_consulta_autores)){
        echo utf8_encode($row_consulta_autores['nome']).'<br/>';
    }    
    echo "</td>";
    $id_area = $row_consulta_trabalhos['area_id'];
    $sql_consulta_area = "SELECT * FROM tb_areas WHERE `id` = $id_area";
    $res_consulta_area = mysqlexecuta($id,$sql_consulta_area);
    $row_consulta_area = mysql_fetch_array($res_consulta_area);
    echo "<td>".utf8_encode($row_consulta_area['nome_area']).'</td>';
    $status = $row_consulta_trabalhos['status'];    
    $sql_status_trabalhos = "SELECT * FROM tb_status WHERE `id` = '$status'";
    $res_status_trabalhos = mysqlexecuta($id,$sql_status_trabalhos);
    $row_status_trabalhos = mysql_fetch_array($res_status_trabalhos);    
    echo "<td>".$row_status_trabalhos['status']."</td>";
    $id_status = $row_status_trabalhos['id'];
    $avaliador_id = $row_consulta_trabalhos['avaliador_id'];
    echo "<td>";
//    echo $row_status_trabalhos['status'];
?>
<?
    $avaliador = $row_consulta_trabalhos['avaliador_id'];
    $sql_avaliador_trabalhos = "SELECT * FROM tb_avaliador WHERE `id` = '$avaliador'";
    $res_avaliador_trabalhos = mysqlexecuta($id,$sql_avaliador_trabalhos);
    $row_avaliador_trabalhos = mysql_fetch_array($res_avaliador_trabalhos);            
        echo $row_avaliador_trabalhos['nome']."<br />";

?>      

 <form action="troca_avaliador.php?ver=1&fonte=2&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-inline ls-float-right" method="POST" target="_blank">
    <label class="ls-label col-md-8">
      <div class="ls-custom-select">

        <select class="ls-custom" name="novo_avaliador">
<?
    echo "<option value='$avaliador_id'>Selecione um Avaliador</option>";        
    $sql_avaliador_trabalhos = "SELECT * FROM tb_avaliador WHERE `area_avaliacao` LIKE '%$id_area%'";
    $res_avaliador_trabalhos = mysqlexecuta($id,$sql_avaliador_trabalhos);
    while($row_avaliador_trabalhos = mysql_fetch_array($res_avaliador_trabalhos)){
        $area_avaliacao = explode(',',$row_avaliador_trabalhos['area_avaliacao']);
        foreach($area_avaliacao as $valores){
            if($valores==$id_area){
                $teste = 'ok';
            }
        }

        $avaliador_nome = utf8_encode($row_avaliador_trabalhos['nome']);
        $id_avaliador = $row_avaliador_trabalhos['id'];
    if($teste == 'ok'){
        echo "<option value='$id_avaliador'>$avaliador_nome</option>";
        $teste ='';
    }        
    }            
?>
        </select>
<?
?>
      </div>
     <div class="ls-actions-btn" align='center'>
        <center><button class="ls-btn" align="center">Alterar</button></center>
        </div>    
    </label>
    </form>
<? 
    echo "</td>";
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

        echo "</td></tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";
}
?>
