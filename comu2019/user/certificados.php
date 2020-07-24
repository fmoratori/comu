<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-docs">Certificados</h1>




<?
$cpf_usuario = $row_usuario['cpf'];

    $sql_certificados_presenca2 = "SELECT * FROM tb_usuario WHERE cpf=$cpf_usuario";
    $res_certificados_presenca2 = mysqlexecuta($id,$sql_certificados_presenca2);
    $row_certificados_presenca2=mysql_fetch_array($res_certificados_presenca2);
//if($row_certificados_presenca2['pesquisa']==''){
// header('Location: ./principal.php?pg=pesquisa.php');
// exit();   
//}



    $sql_certificados_presenca = "SELECT * FROM tb_usuario WHERE cpf=$cpf_usuario AND presenca='s'";
    $res_certificados_presenca = mysqlexecuta($id,$sql_certificados_presenca);
   // $row_certificados_presenca=mysql_fetch_array($res_certificados_presenca);


?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
     <!-- <th>Certificado Presença</th>-->
      <th></th>
    </tr>
  </thead>
  <tbody>

<?
while($row_certificados_presenca = mysql_fetch_array($res_certificados_presenca)){

?>    <tr>
      <td><a href="exibe_certificado_presenca.php?id_certificado=<? echo $id_usuario; ?>" class="ls-ico-text" target="_blank" title=""><? echo $row_certificados_presenca['nome']; ?></a></td>
      <td><a href="exibe_certificado_presenca.php?id_certificado=<? echo $id_usuario; ?>" class="ls-ico-text" target="_blank" title="">Abrir Certificado</a></td>
    </tr>
<?    
}
?> 
  </tbody>
</table>


<?

$id_usuario = $row_usuario['id'];
    $sql_certificados_poster = "SELECT * FROM tb_trabalhos WHERE usuario_id=$id_usuario AND `presenca`='s'";
    $res_certificados_poster = mysqlexecuta($id,$sql_certificados_poster);
 //   $row_certificados=mysql_fetch_array($res_certificados);
?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <!--<th colspan="2">Certificado Poster</th>-->
    </tr>
  </thead>
  <tbody>

<?
while($row_certificados_poster = mysql_fetch_array($res_certificados_poster)){
    $id_certificado_poster = $row_certificados_poster['id'];
//    $id_atividade = $row_certificados_poster[id_atividade];

//$sql_atividade_certificados = "SELECT * FROM tb_atividades WHERE id=$id_atividade";
//$res_atividade_certificados = mysqlexecuta($id,$sql_atividade_certificados);
//$row_atividade_certificados = mysql_fetch_array($res_atividade_certificados);

?>    <tr>
      <td><a href="exibe_certificado_poster.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><? echo $row_certificados_poster['titulo']; ?></a></td>
      <td><a href="exibe_certificado_poster.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><b>Certificado Apresentação Poster</b></a></td>
    </tr>
<?    

if($row_certificados_poster['mencao']=='s'){
?>
    <tr>
      <td><a href="exibe_certificado_mencao.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><? echo $row_certificados_poster['titulo']; ?></a></td>
      <td><a href="exibe_certificado_mencao.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><b>Certificado Menção Honrosa</b></a></td>
    </tr>
<?
}    
if($row_certificados_poster['co']=='s'){
?>
    <tr>
      <td><a href="exibe_certificado_co.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><? echo $row_certificados_poster['titulo']; ?></a></td>
      <td><a href="exibe_certificado_co.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><b>Certificado Comunicação Oral</b></a></td>
    </tr>
<?
}
}
?> 
  </tbody>
</table>
<?
/**
$cpf_usuario = $row_usuario['cpf'];
    $sql_certificados2 = "SELECT * FROM dados_local WHERE cpf=$cpf_usuario";
    $res_certificados2 = mysqlexecuta($id,$sql_certificados2);
    $row_certificados2=mysql_fetch_array($res_certificados2);

$id_leitura = $row_certificados2['codigo_leitura'];
**/
    $sql_certificados = "SELECT * FROM tb_certificados WHERE usuario_id=$id_usuario";
//echo $sql_certificados;
    $res_certificados = mysqlexecuta($id,$sql_certificados);
//    $row_certificados=mysql_fetch_array($res_certificados);

?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Certificados</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

<?

while($row_certificados = mysql_fetch_array($res_certificados)){
    $id_certificado = $row_certificados['id'];
    $id_atividade = $row_certificados['id_atividade'];

$sql_atividade_certificados = "SELECT * FROM tb_atividades WHERE id=$id_atividade";
$res_atividade_certificados = mysqlexecuta($id,$sql_atividade_certificados);
$row_atividade_certificados = mysql_fetch_array($res_atividade_certificados);

?>
    <tr>
      <td><a href="exibe_certificado.php?id_certificado=<? echo $id_certificado; ?>&cpf=<? echo $cpf_usuario; ?>" target="_blank" title=""><? echo $row_atividade_certificados['nome']; ?></a></td>
      <td><? echo $row_certificados['carga_horaria']; ?></td>
    </tr>
<?    
if($row_certificados['palestrante']>0){
    ?>
    <tr>
      <td><a href="exibe_certificado_palestrante.php?id_certificado=<? echo $id_certificado; ?>" target="_blank" title=""><? echo $row_atividade_certificados['nome']; ?></a></td>
      <td><? echo "PALESTRANTE"; ?></td>
    </tr>
   <? 
}
}

?> 
  </tbody>
</table>