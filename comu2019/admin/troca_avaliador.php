<?
//session_start();
include "mysqlconecta.php";
include "mysqlexecuta.php";

//include "valida.php";

$pg = $_GET['pg'];
$ver = $_GET['ver'];
$fonte = $_GET['fonte'];
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);
$id_trabalho = $_GET['id_trabalho'];
    $sql_avaliador_trabalhos = "SELECT * FROM tb_avaliador";
    $res_avaliador_trabalhos = mysqlexecuta($id,$sql_avaliador_trabalhos);
$novo_avaliador = $_POST['novo_avaliador'];
if($ver==1){
$sql_muda_avaliador = "UPDATE `tb_trabalhos` SET `avaliador_id`='$novo_avaliador' WHERE `id`=$id_trabalho;";
//echo $sql_muda_avaliador;
$res_muda_cor = mysqlexecuta($id,$sql_muda_avaliador);
if($fonte==2){
?>
    <script>
window.close();
</script>
<?
}
if($res_muda_cor){
        $texto = "<div class='ls-alert-success'>Avaliador Alterado com Sucesso!</div>";
        }
}
?>
<!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
  <body>

<h1 class="ls-title-intro ls-ico-pencil">Avaliadores</h1>
<div class="ls-box-filter">
  <fieldset>
  <?
//  echo $texto;
  ?>
 <form action="troca_avaliador.php?ver=1&fonte=2&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form row" method="POST" target="_blank">
    <label class="ls-label col-md-5">
      <div class="ls-custom-select">

        <select class="ls-custom" name="novo_avaliador">
<?
$id_area=0;
    $sql_consulta_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho ORDER BY `id` ASC";
    $res_consulta_trabalhos = mysqlexecuta($id,$sql_consulta_trabalhos);
    $row_consulta_trabalhos = mysql_fetch_array($res_consulta_trabalhos);
    
    $id_area = $row_consulta_trabalhos['area_id'];

    $sql_consulta_area = "SELECT * FROM tb_areas WHERE `id` = $id_area";
    $res_consulta_area = mysqlexecuta($id,$sql_consulta_area);
    $row_consulta_area = mysql_fetch_array($res_consulta_area);
    $status = $row_consulta_trabalhos['status'];    

    $sql_status_trabalhos = "SELECT * FROM tb_status WHERE `id` = '$status'";
    $res_status_trabalhos = mysqlexecuta($id,$sql_status_trabalhos);
    $row_status_trabalhos = mysql_fetch_array($res_status_trabalhos);    

    $id_status = $row_status_trabalhos['id'];
    $avaliador_id = $row_consulta_trabalhos['avaliador_id'];
    echo "<td>";
    $avaliador = $row_consulta_trabalhos['avaliador_id'];
    $sql_avaliador_trabalhos = "SELECT * FROM tb_avaliador WHERE `id` = '$avaliador'";
    $res_avaliador_trabalhos = mysqlexecuta($id,$sql_avaliador_trabalhos);
    $row_avaliador_trabalhos = mysql_fetch_array($res_avaliador_trabalhos);            
        echo $row_avaliador_trabalhos['nome']."<br />";
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

        $avaliador_nome = $row_avaliador_trabalhos['nome'];
        $id_avaliador = $row_avaliador_trabalhos['id'];
    if($teste == 'ok'){
        echo "<option value='$id_avaliador'>$avaliador_nome </option>";
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
       </fieldset>
       </div></body>