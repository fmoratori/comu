<?
include "./mysqlconecta.php";
include "./mysqlexecuta.php";

?>
<!--
<div class="content5">
<form name="incluir" method="post" action="inscritos.php">
<p>

<table border="1" width="100%">

<center>

<tr>

  <td>Texto:</td>

  <td colspan="3"><input type="text" name="nome" size="100"> </td>

</tr>
<tr>

<td>  	
  <select name="opcao">
    <option value="nome">NOME</option>
    <option value="cpf">CPF</option>
    <option value="email">E-MAIL</option>
  </select>
</td>

</tr>
<tr><td colspan="4">  <p>    <input type="submit" value="BUSCAR">  </p></td></tr>
</center>

</table>
</form>

-->

<table width="100%" border="1">
<?
$opcao = $_POST['opcao'];
$texto = "'%".$_POST['nome']."%'";
//$sql10= "SELECT * FROM tb_usuario WHERE $opcao LIKE  $texto";
$sql10= "SELECT * FROM tb_usuario ORDER BY id";
$res10 = mysqlexecuta($id,$sql10);
	echo "<tr>";
	echo "<td>"."ID"."</td>";
	echo "<td>"."NOME"."</td>";
	echo "<td>"."INSTITUI&Ccedil;&Atilde;O"."</td>";	
	echo "<td>"."CPF"."</td>";
	echo "<td>"."EMAIL"."</td>";
	echo "<td>"."TELEFONE"."</td>";
	echo "<td>"."CELULAR"."</td>";
	echo "<td>"."CATEGORIA"."</td>";
//	echo "<td>"."CATEGORIA COMPROVADA?"."</td>";
	echo "<td>"."CURSO 1"."</td>";
	echo "<td>"."CURSO 2"."</td>";
	echo "<td>"."PAGAMENTO"."</td>";
	echo "<td>"."SITUACAO"."</td>";
//	echo "<td>"."OP&Ccedil;&Otilde;ES"."</td>";
	echo "</tr>";	
	
while($row10 = mysql_fetch_array($res10)){
	$id_usuario = $row10['id'];
	echo "<tr>";
	echo "<td>".$row10['id']."</td>";
	$user_id=$row10['id'];
	echo "<td>"."<a href='./user_info.php?user_id=$user_id' target='_blank'>".$row10['nome']."</a></td>";
	echo "<td>".$row10['instituicao']."</td>";
	echo "<td>".$row10['cpf']."</td>";
	echo "<td>".$row10['email']."</td>";
	echo "<td>".$row10['telefone']."</td>";
	echo "<td>".$row10['celular']."</td>";
 	$categoria_id = $row10['categoria'];
    if($categoria_id!=''){
	$sql14= "SELECT * FROM tb_categoria WHERE id = $categoria_id";
	$res14 = mysqlexecuta($id,$sql14);
	$row14 = mysql_fetch_array($res14);
	echo "<td>".$row14['nome']."</td>";        
    }
    else{
	echo "<td></td>";                
    }
/**
	echo "<td><center>";
	if($row10['categoria_valida']=='P'){
	echo "COMPROVANTE DE CATEGORIA NÃO ENVIADO";
	}
if($row10['categoria_valida']=='A'){
	echo "COMPROVANTE DE CATEGORIA AGUARDANDO ANÁLISE";
	echo "<br /><a href='./valida_categoria.php?user_id=$user_id' target='_blank'>Validar Agora</a> "."</center></td>";
	}
if($row10['categoria_valida']=='N'){
	echo "COMPROVANTE DE CATEGORIA REJEITADO";
	echo "<br /><a href='./valida_categoria.php?user_id=$user_id' target='_blank'>Verificar e Validar</a> "."</center></td>";
	}	
if($row10['categoria_valida']=='S'){
	echo "COMPROVANTE DE CATEGORIA APROVADO";
	}
**/


	$atividade = 0;
	if($row10['inscricao_obs']==0){
	   echo "<td></td><td></td>";
    }
	if($row10['inscricao_obs']!=0){
    	$atividade = $row10['inscricao_obs'].','.$row10['inscricao_obs2'];
	}
	$sql13= "SELECT * FROM tb_atividades WHERE id IN ($atividade)";
	$res13 = mysqlexecuta($id,$sql13);
//	echo "<td>";
	while($row13 = mysql_fetch_array($res13)){
		echo "<td>".$row13['nome']."</td>";
	}
//	echo "</td>";
$x=0;
	$sql11= "SELECT * FROM tb_boleto WHERE user_id = $id_usuario";
	$res11 = mysqlexecuta($id,$sql11);
	while($row11 = mysql_fetch_array($res11)){
		if($row11['situacao']=='PG' || $row11['situacao']=='PG'){
			echo "<td><font color='#0000FF'>R$ ".$row11['valor'].",00 </td><td>".$row11['situacao']."</font></td>";			
		}
		else{
			echo "<td><font color='#FF0000'>R$ ".$row11['valor'].",00 </td><td>".$row11['situacao']."</font></td>";			
		}
$x++;
	}
    if($x==0){
        echo "<td></td><td></td>";
    }
//	echo "<td>";
//	echo "<a href='./lista_boleto.php?id_usuario=$id_usuario' target='_blank'><img src='/jarvis3/imagens/pagamento.png' width='16' height='16' /></a>";
//	echo "</td>";
	echo "</tr>";	
	
	}

?>
</table>
</body>
</html>