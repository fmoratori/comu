<?
$ver = $_GET['ver'];
?>
<h1 class="ls-title-intro ls-ico-pencil">Notas de Avaliação</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=classificacao.php&ver=1" class="ls-form ls-form-inline row" method="POST">
 <fieldset>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">

<select class="ls-custom" name="area">
<option value="">Todos</option>
<?
$sql5 = "SELECT * FROM `tb_areas` ORDER BY id";
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
    $sql_consulta_trabalhos = "SELECT * FROM tb_trabalhos WHERE `status`=3 $complemento AND `avaliador_id`=0 ORDER BY `id` ASC";
    //echo $sql_consulta_trabalhos;
    $res_consulta_trabalhos = mysqlexecuta($id,$sql_consulta_trabalhos);

    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th width='2%'>ID</th>
      <th width='30%'>T&iacute;tulo</th>    
      <th class="hidden-xs" width='40%'>Autores</th>      
      <th class="hidden-xs" width='10%'>Nota 1</th>
      <th class="hidden-xs" width='10%'>Nota 2</th>
      <th class="hidden-xs" width='10%'>Nota 3</th>
      <th class="hidden-xs" width='10%'>Nota 4</th>
      <th class="hidden-xs" width='10%'>Nota 5</th>
      <th class="hidden-xs" width='10%'>Nota 6</th>
      <th class="hidden-xs" width='10%'>Nota 7</th>
      <th class="hidden-xs" width='10%'>Nota 8</th>
      <th class="hidden-xs" width='10%'>Total</th>

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
        echo utf8_encode($row_consulta_autores['nome']).'<br/><br/>';
    }    
    echo "</td>";















    $sql_consulta_autores = "SELECT * FROM tb_avaliacao WHERE `trabalho_id` = $id_trabalho";
    $res_consulta_autores = mysqlexecuta($id,$sql_consulta_autores);
    $nota1=0;
    $nota2=0;
    $nota3=0;
    $nota4=0;
    $nota5=0;
    $nota6=0;
    $nota7=0;
    $nota8=0;
    $z=0;
    while($row_consulta_autores = mysql_fetch_array($res_consulta_autores)){
        $nota1 = $nota1+$row_consulta_autores['nota1'];
        $nota2 = $nota2+$row_consulta_autores['nota2'];
        $nota3 = $nota3+$row_consulta_autores['nota3'];
        $nota4 = $nota4+$row_consulta_autores['nota4'];
        $nota5 = $nota5+$row_consulta_autores['nota5'];
        $nota6 = $nota6+$row_consulta_autores['nota6'];
        $nota7 = $nota7+$row_consulta_autores['nota7'];
        $nota8 = $nota8+$row_consulta_autores['nota8'];

        $z=$z+1;
    }
if($z<1){$z=1;}
    echo "<td>";
    echo number_format($nota1/$z, 2, '.', '')."</td>";
    echo "<td>";
    echo number_format($nota2/$z, 2, '.', '')."</td>";
    echo "<td>";
    echo number_format($nota3/$z, 2, '.', '')."</td>";
    echo "<td>";
    echo number_format($nota4/$z, 2, '.', '')."</td>";
    echo "<td>";
    echo number_format($nota5/$z, 2, '.', '')."</td>";
    echo "<td>";
    echo number_format($nota6/$z, 2, '.', '')."</td>";
    echo "<td>";
    echo number_format($nota7/$z, 2, '.', '')."</td>";
    echo "<td>";
    echo number_format($nota8/$z, 2, '.', '')."</td>";


if($row_consulta_trabalhos<=5){

    if($nota1>0){    
    $nota1= ($nota1/$z);
    $nota1 = $nota1/100;
    $nota1 = $nota1*15;
    }
    if($nota2>0){
    $nota2= ($nota2/$z);
    $nota2 = $nota2/100;
    $nota2 = $nota2*15;
    }
    if($nota3>0){
    $nota3= ($nota3/$z);
    $nota3 = $nota3/100;
    $nota3 = $nota3*10;

    }
    if($nota4>0){
    $nota4= ($nota4/$z);
    $nota4 = $nota4/100;
    $nota4 = $nota4*20;
    
    }
    if($nota5>0){
    $nota5= ($nota5/$z);
    $nota5 = $nota5/100;
    $nota5 = $nota5*10;
    
    }
    if($nota6>0){
    $nota6= ($nota6/$z);
    $nota6 = $nota6/100;
    $nota6 = $nota6*10;
    
    }
    if($nota7>0){
    $nota7= ($nota7/$z);
    $nota7 = $nota7/100;
    $nota7 = $nota7*10;
    
    }
    if($nota8>0){
    $nota8= ($nota8/$z);
    $nota8 = $nota8/100;
    $nota8 = $nota8*10;
    
    }
}



if($row_consulta_trabalhos>=7){

    if($nota1>0){    
    $nota1= ($nota1/$z);
    $nota1 = $nota1/100;
    $nota1 = $nota1*15;
    }
    if($nota2>0){
    $nota2= ($nota2/$z);
    $nota2 = $nota2/100;
    $nota2 = $nota2*15;
    }
    if($nota3>0){
    $nota3= ($nota3/$z);
    $nota3 = $nota3/100;
    $nota3 = $nota3*10;

    }
    if($nota4>0){
    $nota4= ($nota4/$z);
    $nota4 = $nota4/100;
    $nota4 = $nota4*15;
    
    }
    if($nota5>0){
    $nota5= ($nota5/$z);
    $nota5 = $nota5/100;
    $nota5 = $nota5*15;
    
    }
    if($nota6>0){
    $nota6= ($nota6/$z);
    $nota6 = $nota6/100;
    $nota6 = $nota6*10;
    
    }
    if($nota7>0){
    $nota7= ($nota7/$z);
    $nota7 = $nota7/100;
    $nota7 = $nota7*20;
    }
$nota8='N/A';
}


    $total = $nota1 + $nota2 + $nota3 + $nota4 + $nota5 + $nota6 + $nota7 + $nota8;
    echo "<td>";
    echo number_format($total, 2, '.', '')."</td>";



        echo "</td></tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";
}
?>
