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

<?
include './mysqlconecta.php';
include './mysqlexecuta.php';
$id_trabalho = $_GET['id_trabalho'];
    $sql_instituicao = "SELECT * FROM tb_instituicao WHERE trabalho_id=$id_trabalho";
    $res_instituicao = mysqlexecuta($id,$sql_instituicao);

?>
<h1 class="ls-title-intro ls-ico-pencil2">Autores</h1>
<br />
<?
    $sql_autores = "SELECT * FROM tb_autores WHERE trabalho_id=$id_trabalho ORDER BY `ordenacao` ASC";
    $res_autores = mysqlexecuta($id,$sql_autores);

?>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th class="hidden-xs">Nome</th>
      <th class="hidden-xs">E-mail</th>
      <th>Nome Cient&iacute;fico</th>      
      <th class="hidden-xs">Filia&ccedil;&atilde;o</th>      
      <th></th>  
    </tr>
  </thead>
  <tbody>
<?
$x=0;
    while($row_autores = mysql_fetch_array($res_autores)){
        $inst_autor = $row_autores['inst1'];
        $sql_inst_autor = "SELECT * FROM tb_instituicao WHERE id = $inst_autor";
        $res_inst_autor = mysqlexecuta($id,$sql_inst_autor);
        $row_inst_autor = mysql_fetch_array($res_inst_autor);
?>
    <tr>
      <td><? echo $row_autores['nome']; ?></td>
      <td><? echo $row_autores['email']; ?></td>
      <td><a href="edita_autor_admin.php?id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>"><? echo $row_autores['nome_cientifico']; ?></a></td>
      <td><? echo utf8_encode($row_inst_autor['depto']).'/'.$row_inst_autor['inst'].'/'.$row_inst_autor['sigla_inst']; ?></td>
<?
    if($row_autores['ordenacao']==100){
        ?>
              <td><B>ORIENTADOR</B></td>
        <?
    }
?>
<td><a href="edita_autor_admin.php?id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-pencil"></a>
      <a href="./email_orientador.php?id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-envelop"></a>
      <a href="./remove_autores.php?id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-remove"></a></td>
    </tr>
<?              
$x++;
    }
?>
  </tbody>
</table>
<?
if($x>0){
?>
<!--form action="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form-->

<?    
}
