<!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Sistema Para eventos">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
  <body>
<?
include "mysqlconecta.php";
include "mysqlexecuta.php";
$id_trabalho = $_GET['id_trabalho'];
$val = $_GET['val'];
$msg = $_GET['msg'];

    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
  
    $filename = $row_trabalhos['link'];
    $filename ='./exibe_trabalho.php?id_trabalho='.$id_trabalho;
if(($id_trabalho==base64_decode($val))&& $row_trabalhos['status']==2){
    
?>
<table width="100%" height="10%">
<tr>

<td bgcolor="#00CC00" width="50%">
<center><a href="./salva_orient.php?val=<? echo $val; ?>&id_trabalho=<? echo $id_trabalho; ?>&status=3">
<b>APROVAR</b></a></center>
</td>
<td bgcolor="#FF0000" width="50%">
<center><a href="./salva_orient.php?val=<? echo $val; ?>&id_trabalho=<? echo $id_trabalho; ?>&status=7">
<b>RECUSAR</b></a></center>
</td>
</tr>
</table>
<?
$comite_de_etica = './ce/ce_'.$id_trabalho.'.pdf';
?>
<br />
<!--center><a href="<? echo $comite_de_etica ?>" target="_blank"><h3>Clique Aqui Para Visualizar a Carta do Comit&ecirc; de &Eacute;tica.</h3></a></center><br /-->
<iframe src="<? echo $comite_de_etica; ?>" width="99%" height="700px"></iframe>
<?
}
if(($row_trabalhos['status']!=2 && $msg==3)||($row_trabalhos['status']!=2 && $msg==4)){
    ?>
    <div class="ls-alert-success"><strong>RECEBEMOS SEU PARECER SOBRE O TRABALHO!</strong></div>
    <div class="ls-alert-danger"><strong>Esse trabalho n&atilde;o est&aacute; mais dispon&iacute;vel para valida&ccedil;&atilde;o!</strong></div>
    <?
    }
if(($row_trabalhos['status']!=2 && $msg!=3)&&($row_trabalhos['status']!=2 && $msg!=4)){
    ?>
        <div class="ls-alert-danger"><strong>Esse trabalho n&atilde;o est&aacute; mais dispon&iacute;vel para valida&ccedil;&atilde;o!</strong></div>
    <?
    }    
?>
