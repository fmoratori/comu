<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Desenvolvido Por Felipe Moratori Campos **01/2015**---->
<style type="text/css">
<!--
#item{

width:9cm;
height: 4.0cm;

border-style: ;
margin-left:1px;
}
#item2{

width:3cm;
height: 1cm;

margin-left:3px;
}
.asd{
  font-size: 26px;
font-family:Arial;
}
.asd2{
  font-size: 12px;
font-family:Arial;  
}
.asd3{
  font-size: 22px;
font-family:Arial;
}
.asd4{
  font-size: 12px;
font-family:Arial;
}
.asd5{
  font-size: 7px;
font-family:Arial;
}
.quebrapagina {
   page-break-before: always;
}
-->
</style>
</head>

<body>


<?php 
 
# Substitua abaixo os dados, de acordo com o banco criado
$usuario = "fmsys"; 
$senha = "felipe2013"; 
$banco   = "fmsys"; 
 
# O hostname deve ser sempre localhost 
$servidor = "mysql01.fmsys.hospedagemdesites.ws"; 
 
# Conecta com o servidor de banco de dados 
//mysqli_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' ); 
$conexao = mysqli_connect($servidor,$usuario,$senha);
mysqli_select_db($conexao, $banco);
# Seleciona o banco de dados 
//mysqli_select_db( $database ) or die( 'Erro na seleção do banco' );
 
# Executa a query desejada 
$query = "SELECT * FROM tb_usuario WHERE id IN (SELECT user_id FROM tb_boleto WHERE situacao='PG' AND categoria<99) ORDER BY nome ASC"; 
$result_query = mysqli_query($conexao, $query ) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
# Exibe os registros na tela 
$x=1;
while($row_usuario = mysqli_fetch_array( $result_query )){
//while($x<5){
    $y = $row_usuario['id'];
    $nome = $row_usuario['nome'];
   // $eixo = $row_usuario['eixo'];
  //  $sala = $row_usuario['sala'];
//	$seg = $row_usuario['segmento'];
    
    if(strlen($nome)>20){
        $class = 'asd3';
    }
    else{
        $class = 'asd';
    }
    
?>


        <div id="item">
        <span><center><img src="https://static.wixstatic.com/media/d1e81a_fcd0cba61a5b459b9170f7869cf5f914~mv2.png/v1/fill/w_554,h_130,al_c,q_80,usm_0.66_1.00_0.01/logo%20topissimo%20comu%202019_edited.webp" width="40%" height="25%"></center></span>
        <span class="<?php echo $class; ?>"><center><b><?php echo utf8_encode($nome); ?></b></center></span>
        <span class="asd4"><center><b><?php //echo utf8_encode($row_usuario['departamento']); ?></b></center></span>
<?
$query2 = "SELECT * FROM tb_boleto WHERE `categoria`<99 AND situacao='PG' AND user_id = $y ORDER BY categoria ASC"; 
$result_query2 = mysqli_query($conexao, $query2 ) or die(' Erro na query:' . $query2 . ' ' . mysqli_error() ); 
while($row_usuario2 = mysqli_fetch_array( $result_query2 )){
$id_atividade = $row_usuario2['categoria'];
$query3 = "SELECT * FROM tb_atividades WHERE `id`=$id_atividade"; 
$result_query3 = mysqli_query($conexao, $query3 ) or die(' Erro na query:' . $query3 . ' ' . mysqli_error() ); 
$row_usuario3 = mysqli_fetch_array( $result_query3 );
$modulo = $row_usuario3['sessao'];
?>
        <span class="asd2"><?php echo "M&oacute;dulo ".$modulo.": ".utf8_encode($row_usuario2['referente'])."<br />"; ?></span>

        <?
  }      
?> 
        <span align='left' class="asd5"><sup><?php echo $x ?></sup></span>       
        <!--iframe src="./teste.php?id=<?php echo $y; ?>" height="66%" width="80%"></iframe></span-->
        </div>
  <br class="quebrapagina">
<?php
$x++;
}
?>        
    </body>