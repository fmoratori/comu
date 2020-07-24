<!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <!--meta charset="UTF-8"-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Sistema Para eventos">
    <link href="./struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="./struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="./struct/images/ico-boilerplate.png">
  </head>
<?php 
 
# Substitua abaixo os dados, de acordo com o banco criado
$usuario = "root"; 
$senha = "felipe2013"; 
$banco   = "saude"; 
 
# O hostname deve ser sempre localhost 
$servidor = "localhost"; 
 
# Conecta com o servidor de banco de dados 
//mysqli_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' ); 
$conexao = mysqli_connect($servidor,$usuario,$senha);
mysqli_select_db($conexao, $banco);
# Seleciona o banco de dados 
//mysqli_select_db( $database ) or die( 'Erro na seleção do banco' );
 
# Executa a query desejada 
$id2= $_GET['id'];
$x=1;
$y=1234;
$query = "SELECT * FROM `tb_eixos` WHERE id=$id2"; 
$result_query = mysqli_query($conexao, $query ) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
$row_usuario = mysqli_fetch_array( $result_query );
# Exibe os registros na tela 
?>
<h1 class="ls-title-intro ls-ico-pencil2">Editar</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="30" class="ls-animated"></div>
<div class="ls-box-filter">
<form action="./salva_edita.php?id=<?php echo $id2 ?>" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Nome</b>
      <input type="text" name="nome" placeholder="Nome Completo" value="<?php echo $row_usuario['nome']; ?>" >
    </label>
    <label class="ls-label col-md-3">
    <b class="ls-label-text">Segmento</b>
    <input type="email" name="text" placeholder="" disabled="disabled" value="<?php echo $row_usuario['segmento']; ?>" >
  </label>
    <label class="ls-label col-md-3">
    <b class="ls-label-text">Sala</b>
    <input type="text" name="nome_cientifico" placeholder="" value="<?php echo $row_usuario['sala']; ?>" >
  </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Eixo</b>
    <input type="text" name="eixo" placeholder="" value="<?php echo $row_usuario['eixo']; ?>" >

    </label>
<hr />
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
</div>