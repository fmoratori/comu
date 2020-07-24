<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Propostas - Curso</title>
<style type="text/css">
#apDiv1 {
	border:double;
	border-color:#009;
	position:absolute;
	width:60%;
	height:300%;
	z-index:1;
	left: 20%;
	top: 20%;
	overflow: auto;
}
#apDiv2 {
	position:absolute;
	width:80%;
	height:80%;
	z-index:1;
	left: 10%;
	top: 5%;
}
#apDiv3 {
	position:absolute;
	width:90%;
	height:20%;
	z-index:2;
	left: 68px;
	top: 2%;
}
#apDiv4 {
	border-bottom-style:double;
	border-color:#009;
	position:absolute;
	width:100%;
	height:4%;
	z-index:1;
	left: 0%;
	top: 0%;
	}
.texto {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 16px;
}
.id {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 28px;
}
</style>
</head>
<body>
<div id="apDiv3"><center><img src="../../v8/imagens/fesbe_HOME_05.gif" alt="fesbe_top" width="510" height="93" border="0" /></div>

<div id="apDiv1">
<p class="titulo"> <center><b>PROPOSTAS CURSOS</b></center></p>
 <!--div id="apDiv4"-->
 <?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
//$valida = $_GET['valida'];
//echo $valida;
$sql = "SELECT * FROM `fesbe7`.`tb_propostas_curso` ORDER BY id DESC";
$res = mysqlexecuta($id,$sql);

while($row = mysql_fetch_array($res)){
	$id_proposta = $row['id'];
?> 


  <!--/div-->
 <!---div id="apDiv2"--> 

<span class="texto">	

<table cellspacing="0" cellpadding="0">
<tr>
<td width="40%" colspan="2"><center><b>Número da PROPOSTA  <? echo $row['id']; ?><br /></b></center></td>
</tr>
<tr> <td> &nbsp; </td></tr>
<tr>
<td colspan="2"><center><b>DADOS DO PROPONENTE</b></center></td>
</tr>

<tr>
<td width="40%">Nome:</td><td width="60%"><? echo $row['nome_prop']; ?></td>
</tr>
<tr>
<td>Documento (CPF ou Passaporte):</td><td width="531"><? echo $row['doc_prop']; ?></td>
</tr>
<tr>
<td>Cargo/Função:</td><td><? echo $row['cargo_prop']; ?></td>
</tr>
<tr>
<tr>
<td>E-mail:</td><td width="531"><? echo $row['email_prop']; ?></td>
</tr>
<tr>
<td>Telefone:</td><td width="531"><? echo $row['tel_prop']; ?></td>
</tr>
<tr>
<td>Sociedade de Filiação do Proponente:</td><td width="531"><? echo $row['sociedade_prop']; ?></td>
</tr>
<!--tr>
<td>Sociedades potencialmente interessadas:</td><td><input name="soc_inter" type="text" class="fomu" size="60%"/></td>
</tr-->
<tr><td colspan="2"><br /><center><b>DADOS DO COORDENADOR</b></center></td>
</tr>
<tr>
<td>Nome:</td><td><? echo $row['nome_coord']; ?></td>
</tr>
<tr>
<td>Documento (CPF ou Passaporte):</td><td><? echo $row['doc_coord']; ?></td>
</tr>
<tr>
<td>E-mail:</td><td width="531"><? echo $row['email_coord']; ?></td>
</tr>
<tr>
<td>Institui&ccedil;&atilde;o:</td><td><? echo $row['inst_coord']; ?></td>
</tr>
<tr>  
<td>Depto:</td><td><? echo $row['depto_coord']; ?></td>
</tr>
<tr>
<td>Endere&ccedil;o:</td><td><? echo $row['end_coord']; ?></td>
<tr>
<td>C&oacute;digo Postal:</td><td><? echo $row['cep_coord']; ?></td>
</tr>
<tr>
<td>Pa&iacute;s: </td><td><? echo $row['pais_coord']; ?></td>
</tr>
<tr>
<td>Telefone: </td><td><? echo $row['tel_coord']; ?></td>
</tr> 
<tr>
<td>Celular: </td><td><? echo $row['cel_coord']; ?></td>
</tr>
<tr>
<td colspan="2"><br />
<center><b>DADOS DO CURSO (Caso a Proposta tenha participação de convidadeos estrangeiros, a mesma deverá ser totalmente em língua inglesa)</b></center></td>
</tr>
<tr>
<td>T&Iacute;TULO DO CURSO</td><td><? echo $row['titulo_curso']; ?></td>
</tr>
<tr>
<td>
<b>AULA 1</b>
</td>
</tr>
<tr>
<td>T&Iacute;TULO DA AULA</td><td><? echo $row['titulo_aula1']; ?></td>
</tr>
<tr>
<td>Professor:</td><td><? echo $row['prof_aula1']; ?></td>
</tr>
<tr>
<td>Documento (CPF ou Passaporte):</td><td><? echo $row['doc_aula1']; ?></td>
</tr>
<tr>
<td>E-mail:</td><td width="531"><? echo $row['email_aula1']; ?></td>
</tr>
<tr>
<td>Institui&ccedil;&atilde;o:</td><td><? echo $row['inst_aula1']; ?></td>
</tr>
<tr>  
<td>Depto:</td><td><? echo $row['depto_aula1']; ?></td>
</tr>
<tr>
<td>Endere&ccedil;o:</td><td><? echo $row['end_aula1']; ?></td>
<tr>
<td>C&oacute;digo Postal:</td><td><? echo $row['cep_aula1']; ?></td>
</tr>
<tr>
<td>Pa&iacute;s: </td><td><? echo $row['pais_aula1']; ?></td>
</tr>
<tr>
<td>Telefone: </td><td><? echo $row['tel_aula1']; ?></td>
</tr> 
<tr>
<td>Celular: </td><td><? echo $row['cel_aula1']; ?></td>
</tr>
<tr>
<tr>
<td>
<b>AULA 2</b>
</td>
</tr>
<tr>
<td>T&Iacute;TULO DA AULA </td><td><? echo $row['titulo_aula2']; ?></td>
</tr>
<tr>
<td>Professor:</td><td><? echo $row['prof_aula2']; ?></td>
</tr>
<tr>
<td>Documento (CPF ou Passaporte):</td><td><? echo $row['doc_aula2']; ?></td>
</tr>
<tr>
<td>E-mail:</td><td width="531"><? echo $row['email_aula2']; ?></td>
</tr>
<tr>
<td>Institui&ccedil;&atilde;o:</td><td><? echo $row['inst_aula2']; ?></td>
</tr>
<tr>  
<td>Depto:</td><td><? echo $row['depto_aula2']; ?></td>
</tr>
<tr>
<td>Endere&ccedil;o:</td><td><? echo $row['end_aula2']; ?></td>
<tr>
<td>C&oacute;digo Postal:</td><td><? echo $row['cep_aula2']; ?></td>
</tr>
<tr>
<td>Pa&iacute;s: </td><td><? echo $row['pais_aula2']; ?></td>
</tr>
<tr>
<td>Telefone: </td><td><? echo $row['tel_aula2']; ?></td>
</tr> 
<tr>
<td>Celular: </td><td><? echo $row['cel_aula2']; ?></td>
</tr>
<tr>
<tr>
<td>
<b>AULA 3</b>
</td>
</tr>
<tr>
<td>T&Iacute;TULO DA AULA </td><td><? echo $row['titulo_aula3']; ?></td>
</tr>
<tr>
<td>Professor:</td><td><? echo $row['prof_aula3']; ?></td>
</tr>
<tr>
<td>Documento (CPF ou Passaporte):</td><td><? echo $row['doc_aula3']; ?></td>
</tr>
<tr>
<td>E-mail:</td><td width="531"><? echo $row['email_aula3']; ?></td>
</tr>
<tr>
<td>Institui&ccedil;&atilde;o:</td><td><? echo $row['inst_aula3']; ?></td>
</tr>
<tr>  
<td>Depto:</td><td><? echo $row['depto_aula3']; ?></td>
</tr>
<tr>
<td>Endere&ccedil;o:</td><td><? echo $row['end_aula3']; ?></td>
<tr>
<td>C&oacute;digo Postal:</td><td><? echo $row['cep_aula3']; ?></td>
</tr>
<tr>
<td>Pa&iacute;s: </td><td><? echo $row['pais_aula3']; ?></td>
</tr>
<tr>
<td>Telefone: </td><td><? echo $row['tel_aula3']; ?></td>
</tr> 
<tr>
<td>Celular: </td><td><? echo $row['cel_aula3']; ?></td>
</tr>
<tr>
<td>Justificativa: </td><td><? echo $row['justificativa']; ?></td>
</tr>
<tr>
<td>
<br />******************************************************************************************<br /> 
</td>
</tr>
</table> </span>
<?
}
?>
</div>
</div>
</body>
</html>