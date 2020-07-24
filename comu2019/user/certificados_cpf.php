<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">Consulta Certificados</h1>

<form action="./register.php?pg=certificados_cpf.php&r7=1" class="ls-form ls-form-horizontal" data-ls-module="form" method="POST">

<label class="ls-label col-md-3">
<br />
    <input type="text" name="cpf_certificado" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" >

  </label>

    <button class="ls-btn">Pr&oacute;ximo</button>

</form>
<?
$r7 = $_GET['r7'];

if($r7==1){


$ponto = '.';
$traco = '-';
$cpf_usuario = $_POST['cpf_certificado'];
$cpf_usuario = str_replace($ponto, '', $cpf_usuario);
$cpf_usuario = str_replace($traco, '', $cpf_usuario);

    $sql_certificados_presenca = "SELECT * FROM tb_usuario WHERE cpf=$cpf_usuario AND presenca='s'";
    $res_certificados_presenca = mysqlexecuta($id,$sql_certificados_presenca);
    $row_certificados_presenca = mysql_fetch_array($res_certificados_presenca);
 //   $row_certificados=mysql_fetch_array($res_certificados);
 
?>

<?
//while($row_certificados_presenca = mysql_fetch_array($res_certificados_presenca)){
$id_usuario = $row_certificados_presenca['id'];
if($id_usuario==''){
    echo "<br /><br />Cadastro N&atilde;o Encontrado";
    exit();
}
?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Certificado Presen&ccedil;a</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td><a href="exibe_certificado_presenca.php?id_certificado=<? echo $id_usuario; ?>" target="_blank" title=""><? echo $row_certificados_presenca['nome']; ?></a></td>
      <td><? echo $row_certificados['carga_horaria']; ?></td>
    </tr>
<?    
//}
?> 
  </tbody>
</table>








<?
    $sql_certificados_poster = "SELECT * FROM tb_trabalhos WHERE usuario_id=$id_usuario AND `presenca`='s'";
    $res_certificados_poster = mysqlexecuta($id,$sql_certificados_poster);
 //   $row_certificados=mysql_fetch_array($res_certificados);
?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th colspan="2">Certificado Poster</th>
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
      <td><b>Certificado Apresenta&ccedil;&atilde;o Poster</b></td>
    </tr>
<?    
if($row_certificados_poster['mencao']=='s'){
?>
    <tr>
      <td><a href="exibe_certificado_mencao.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><? echo $row_certificados_poster['titulo']; ?></a></td>
      <td><b>Certificado Men&ccedil;&atilde;o Honrosa</b></td>
    </tr>
<?
}
if($row_certificados_poster['co']=='s'){
?>
    <tr>
      <td><a href="exibe_certificado_co.php?id_certificado_poster=<? echo $id_certificado_poster; ?>" target="_blank" title=""><? echo $row_certificados_poster['titulo']; ?></a></td>
      <td><b>Certificado Comunica&ccedil;&atilde;o Oral</b></td>
    </tr>
<?
}

}
?> 
  </tbody>
</table>



<?
  //  echo "teste";
//$cpf_usuario = $row_usuario['cpf'];
    $sql_certificados2 = "SELECT * FROM dados_local WHERE cpf=$cpf_usuario";
    $res_certificados2 = mysqlexecuta($id,$sql_certificados2);
    $row_certificados2=mysql_fetch_array($res_certificados2);

$id_leitura = $row_certificados2['codigo_leitura'];

    $sql_certificados = "SELECT * FROM tb_certificados WHERE usuario_id=$id_leitura";
    $res_certificados = mysqlexecuta($id,$sql_certificados);

?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Curso</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

<?
while($row_certificados = mysql_fetch_array($res_certificados)){
    $id_certificado = $row_certificados['id'];
    $id_atividade = $row_certificados[id_atividade];

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


<?

}
?>