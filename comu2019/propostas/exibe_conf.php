<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
<p class="titulo"> <center><b>PROPOSTAS CONFERÊNCIAS</b></center></p>
 <?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
$valida = $_GET['valida'];
//echo $valida;
$sql = "SELECT * FROM `fesbe7`.`tb_propostas_conf` ORDER BY id DESC";
$res = mysqlexecuta($id,$sql);

while($row = mysql_fetch_array($res)){
	$id_proposta = $row['id'];
?>
<span class="texto">	

<table cellspacing="0" cellpadding="0">
<tr>
<td width="40%" colspan="2"><center><b>Número da PROPOSTA  <? echo $row['id']; ?><br /></b></center></td>
</tr>
<tr> <td> &nbsp; </td></tr>
<tr>
     <tr>
      <td colspan="2"><center><b>DADOS DO PROPONENTE</b></center></td>
     </tr>
      <tr>
        <td width="40%">Nome:</td><td width="531"><? echo $row['nome_prop']; ?></td>
      </tr>
      <tr>
        <td>Documento (CPF ou Passaporte):</td><td width="531"><? echo $row['doc_prop']; ?></td>
      </tr>     
      <tr>
        <td>Cargo/Função:</td><td width="531"><? echo $row['cargo_prop']; ?></td>
      </tr>
      <tr>
        <td>E-mail:</td><td width="531"><? echo $row['email_prop']; ?></td>
      </tr>
      <tr>
        <td>Telefone:</td><td width="531"><? echo $row['tel_prop']; ?></td>
      </tr>
      <tr>
        <td>Instituição:</td><td width="531"><? echo $row['inst_prop']; ?></td>
      </tr>
      <tr>
        <td>Sociedade de Filiação do Proponente:</td><td width="531"><? echo $row['sociedade_prop']; ?></td>
      </tr>
      <!--tr>
		  <td>Sociedades potencialmente interessadas:</td><td>soc_inter" type="text" class="fomu</td>
		</tr-->
      <tr>
        <td colspan="2"><br /><center><b>DADOS DA CONFERÊNCIA</b></center></td>
        </tr>
        <tr>
        <td>T&Iacute;TULO (informe o t&iacute;tulo em ingl&ecirc;s se for convidado estrangeiro)</td><td>titulo"<? echo $row['titulo_conf']; ?></td>
      </tr>
      <tr>
        <td>Nome Conferencista:</td><td><? echo $row['prof_aula1']; ?></td>
      </tr>
      <tr>
        <td>Documento Conferencista (CPF ou Passaporte):</td><td><? echo $row['doc_aula1']; ?></td>
      </tr>
      <tr>
        <td>E-mail Conferencista:</td><td width="531"><? echo $row['email_aula1']; ?></td>
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