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
$nome = $_POST['nome'];
$x=1;
$y=1234;
$query = "UPDATE `saude`.`tb_eixos` SET `nome`='$nome' WHERE `id`=$id2;"; 
$result_query = mysqli_query($conexao, $query ) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
//$row_usuario = mysqli_fetch_array( $result_query );
header('Location: ./imprime.php?id='.$id2);
# Exibe os registros na tela 
?>