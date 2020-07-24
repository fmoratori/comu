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
<body>


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
$x=1;
$y=1234;
$query = "SELECT * FROM `tb_eixos` WHERE sala='H' ORDER BY nome ASC"; 
$result_query = mysqli_query($conexao, $query ) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
# Exibe os registros na tela 
?>
<table width='100%' class="ls-table ls-no-hover ls-table-striped">
<tr><th colspan="5"><center>LISTA DE PRESENÇA - 30/06</center></th></tr>
<th width='15%'><center>ID</center></th>
<th width='25%'><center>Nome</center></th>
<th width='10%'><center>Eixo</center></th>
<th width='10%'><center>Sala</center></th>
<th width='40%'><center>Assinatura</center></th>
<?php
while($row_usuario = mysqli_fetch_array( $result_query )){
//while($x<5){
    $y = $row_usuario['id'];
    $nome = $row_usuario['nome'];
    $eixo = $row_usuario['eixo'];
    $sala = $row_usuario['sala'];
?>
        <tr width='500px'>
        <td><center><?php echo utf8_encode($row_usuario['id']); ?></center></td>
        <td><center><?php echo utf8_encode($nome); ?></center></td>
        <!--span class="asd2"><center><?php echo utf8_encode($eixo); ?></center></span-->
        <td><center><?php echo utf8_encode($eixo)."</center></td><td><center>".utf8_encode($sala); ?></center></span></td>
        <td>&nbsp;  </td>
        <!--td><center><a href="./imprime.php?id=<?php echo $y; ?>" target="_blank">Cracha</a>&nbsp;&nbsp;<a href="./edita.php?id=<?php echo $y; ?>" target="_blank">Editar</a></center></td-->
        </tr>
        <!--br class="quebrapagina"-->
        
<?php
}
?>
</table>        
    </body>