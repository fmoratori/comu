<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-pencil">Consulta Trabalhos</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=consulta_trabalhos.php&ver=1" class="ls-form ls-form-inline row" method="POST">
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
        <input type="radio" name="criterio" value="titulo">
        Título
        <input type="radio" name="criterio" value="id">
        ID
      </label>
    </div>
</fieldset>
<fieldset>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">
        <select class="ls-custom" name="area">

<option value="">Selecione a Área</option>
<?
$sql4 = "SELECT * FROM `tb_areas`";
$res4 = mysqlexecuta($id,$sql4);
while ($row4 = mysql_fetch_array($res4)) {
?>
	    <option value="<? echo $row4['id'] ?>"><? echo $row4['id'].'-'.utf8_encode($row4['nome_area']); ?> </option>  
<?	
}
?>
        </select>
        </div>
        </label>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">

<select class="ls-custom" name="status">
<option value="">Selecione a Situação</option>
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
$texto = '%'.$_POST['texto'].'%';
$criterio = $_POST['criterio'];
$premio = $_POST['premio'];
if($criterio==''){
    $criterio = 'titulo';
}
$area=$_POST['area'];
$area_consult="";
$status = $_POST['status'];
$status_consult = "";
$ordenacao = $_POST['ordenacao'];
if($area!=""){
	$area_consult = 'AND area_id = '.$area;
	}
if($status!=""){
	$status_consult = 'AND status = '.$status;
	}
if($premio!=""){
	$premio_consult = 'AND premio = '.$premio;
	}

if($ver==1){
    $sql_consulta_trabalhos = "SELECT * FROM tb_trabalhos WHERE `$criterio` LIKE '$texto' $area_consult $status_consult $premio_consult ORDER BY `id`";
    $res_consulta_trabalhos = mysqlexecuta($id,$sql_consulta_trabalhos);
    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th width='6%'>ID</th>
      <th>Nome</th>
      <th>E-mail</th>          
      <th>Título</th>
      <th class="hidden-xs">Área</th>
      <th>Status</th>
      <th>Pr&ecirc;mio</th>
      <th class="hidden-xs">Avaliador</th>
      <th class="hidden-xs">Ações</th>
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
        echo "<td>".utf8_encode($row_consulta_nome_autor['email'])."</td>";
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
    $status_nome = utf8_encode($row_status_trabalhos['status']);
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






    $premio = $row_consulta_trabalhos['premio'];    
    $sql_premio_trabalhos = "SELECT * FROM tb_premio WHERE `id` = '$premio'";
    $res_premio_trabalhos = mysqlexecuta($id,$sql_premio_trabalhos);
    $row_premio_trabalhos = mysql_fetch_array($res_premio_trabalhos);    
    $id_premio = $row_premio_trabalhos['id'];
    $premio_nome = utf8_encode($row_premio_trabalhos['nome']);
    echo "<td>";
//    echo $row_status_trabalhos['status'];
?>

 <form action="troca_premio.php?ver=1&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-inline ls-float-right" method="POST" target="_blank">
    <label class="ls-label col-md-8">
      <div class="ls-custom-select">
        <select class="ls-custom" name="novo_premio">
<?
    echo "<option value='$id_premio'>$premio_nome</option>";        
    $sql_premio_trabalhos = "SELECT * FROM tb_premio";
    $res_premio_trabalhos = mysqlexecuta($id,$sql_premio_trabalhos);
    while($row_premio_trabalhos = mysql_fetch_array($res_premio_trabalhos)){
        $premio_nome = utf8_encode($row_premio_trabalhos['nome']);
        $id_premio = $row_premio_trabalhos['id'];
        echo "<option value='$id_premio'>$premio_nome</option>";        
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
        echo "<td>".utf8_encode($row_avaliador_trabalhos['nome'])."</td>";
if($row_consulta_trabalhos['midia']=='s'){
            echo "<td>"."<a href='./libera_edicao_autores.php?id_trabalho=$id_trabalho&liberado=s' target='_blank'>BLOQUEAR EDIÇÃO DE AUTORES</a>"."</td>"; 
}
else{
                echo "<td>"."<a href='./libera_edicao_autores.php?id_trabalho=$id_trabalho&liberado=n' target='_blank'>LIBERAR PARA EDIÇÃO DE AUTORES</a>"."</td>";
}                
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
