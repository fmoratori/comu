<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?

$val_end = $_GET['val'];
$val = $_GET['val'];
$orient = $_GET['orient'];
$valida_orient = $_GET['valida_orient'];
$orient1 = base64_decode($orient);
$val1 = base64_decode($val);
$valida = $_SESSION['login'];
$id_trabalho = $_GET['id_trabalho'];
$user_id = $_GET['aval'];
$aval = $_SESSION['usuario'];
/**
$sql = "SELECT * FROM `tb_usuario` WHERE `cpf` = $valida OR email like $valida";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res);
$usuario = $row['id'];
$nome1 = $row['nome'];
**/

$sql50 = "SELECT * FROM `tb_trabalhos` WHERE `id`= $id_trabalho";
$res50 = mysqlexecuta($id,$sql50);
$row50 = mysql_fetch_array($res50);

$sql51 = "SELECT * FROM `tb_instituicao` WHERE `trabalho_id`= $id_trabalho ORDER BY `id` ASC";
$res51 = mysqlexecuta($id,$sql51);


$sql52 = "SELECT * FROM `tb_autores` WHERE `trabalho_id`= $id_trabalho AND `id`=27 ORDER BY `id` ASC";
$res52 = mysqlexecuta($id,$sql52);
$nome = utf8_decode(ucwords(strtolower($_POST['nome'])));
$email = $_POST['email'];
$inst1 = utf8_decode($_POST['inst1']);
$inst2 = utf8_decode($_POST['inst2']);
$inst3 = utf8_decode($_POST['inst3']);

$sql8 = "SELECT * FROM `tb_avaliador` WHERE `email` LIKE '$val1'";
$res8 = mysqlexecuta($id,$sql8);
$row8 = mysql_fetch_array($res8);

if($res50){
    /**
clearstatcache();    
$diretorio = '../user/trabalho/'.$id_trabalho.'/'; 
$ponteiro  = opendir($diretorio);
// monta os vetores com os itens encontrados na pasta
while ($nome_itens = readdir($ponteiro)) {
    $itens[] = $nome_itens;
}

sort($itens);
// percorre o vetor para fazer a separacao entre arquivos e pastas 
foreach ($itens as $listar) {
// retira "./" e "../" para que retorne apenas pastas e arquivos
   if ($listar!="." && $listar!=".."){ 

// checa se o tipo de arquivo encontrado é uma pasta
   		if (is_dir($listar)) { 
// caso VERDADEIRO adiciona o item à variável de pastas
			$pastas[]=utf8_decode($listar); 
		} else{ 
// caso FALSO adiciona o item à variável de arquivos
			$arquivos[date('Y/m/d H:i:s', filemtime($listar))]=$listar;
		}
   }
}

krsort($arquivos, SORT_STRING);

if ($arquivos != "") {
foreach($arquivos as $listar){
   $link =  "<a href=$diretorio$listar target='_blank'>$listar</a>";
   $link = $diretorio.$listar;

   //break;
   }
   }							
**/
   $diretorio2 = '../user/exibe_trabalho.php?id_trabalho='.$id_trabalho; 
   $link2 = $diretorio2;

?>
<div id="apDiv7">
<h1><center><b>Avaliação do Trabalho</b></center></h1><br />
<!--h3 align="center"><b><a href="../user/ce/ce_<? echo $id_trabalho; ?>.pdf" target="_blank">Clique para Visualizar a Carta do Comit&ecirc; de &eacute;tica</a></b></h3--->
<table width="100%">
<tr>
<!--td width="80%">
<!--iframe src="<? echo $link ?>" width="99%" height="600px" />
</iframe></td-->
<!--iframe src="<? echo $link2 ?>" width="99%" height="600px" />
</iframe></td-->
<td width="20%">
<?
// pega o endereço do diretório
$diretorio1 = "../user/trabalho/".$id_trabalho."/"; 
// abre o diretório
$ponteiro1  = opendir($diretorio1);
// monta os vetores com os itens encontrados na pasta
//echo "<p>Versões Anteriores: </p>"; 
$x=1;
while ($nome_itens1 = readdir($ponteiro1)) {
    $itens1[] = $nome_itens1;
}
// ordena o vetor de itens
sort($itens1);
// percorre o vetor para fazer a separacao entre arquivos e pastas 
foreach ($itens1 as $listar1) {
// retira "./" e "../" para que retorne apenas pastas e arquivos
   if ($listar1!="." && $listar1!=".."){ 

// checa se o tipo de arquivo encontrado é uma pasta
   		if (is_dir($listar1)) { 
// caso VERDADEIRO adiciona o item à variável de pastas
//			$pastas[]=$listar; 
		} else{ 
// caso FALSO adiciona o item à variável de arquivos
			$arquivos1[]=$listar1;
		}
   }
}
krsort($arquivos1, SORT_STRING);
// lista os arquivos se houverem
if ($arquivos1 != "") {
foreach($arquivos1 as $listar1){
   //print "<a href='$diretorio1.$listar1' target='_blank'>$listar1</a><br>";
   }

   }
   
if($x<2){
    $ex = $diretorio1.$listar1;
}
$x++;
/**
$path = "../user/trabalhos/trabalho/16/"; 
$diretorio = dir($path); 
echo "Versões Anteriores '<br />"; 
while($arquivo = $diretorio -> read()){
	 echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />"; 
	 } 
	 $diretorio -> close();
**/
//echo "../user/ce/ce_".$id_trabalho.".pdf";
?>
</td>

<? echo "<a href=../user/ce/ce_$id_trabalho.pdf>Caso não esteja visualizando o trabalho, CLIQUE AQUI</a>" ?>
<td><iframe src="<? echo "../user/ce/ce_".$id_trabalho.".pdf"; ?>" width="99%" height="600px" /></iframe>
</td></tr></table>
<br /><br />

<?
if($row50['msg_avaliador']!=""){
?>
<table>
<tr>
<td><b>Mensagem do Autor: </b></td>
<td>
<textarea rows="3" cols="80" name="justifique" readonly="readonly"><? echo nl2br(utf8_encode($row50['msg_avaliador'])); ?></textarea>
</td>
</tr>
</table>
<?
}
?>


<!--a href="http://fesbe.org.br/fesbe2015/index.php?pg=inst_resumos.php" target="_blank">Regras Para Preparação do Resumo</a-->

<br /><br />
<form name="trabalho" method="post" action="./principal.php?pg=salva_parecer.php&val=<? echo $val; ?>&id_trabalho=<? echo $id_trabalho; ?>&aval_id=<? echo $aval; ?>">
<table width="100%" height="10%">
<!--tr>

<td bgcolor="#00CC00" width="33%">
<center><input type="radio" required="required" name="status" value="4" /><a href="./principal.php?pg=salva_parecer.php&val=<? echo $val; ?>&id_trabalho=<? echo $id_trabalho; ?>&aval_id=<? echo $aval; ?>&status=4">
<b>APROVAR</b></a></center>
</td>
<?
//if($row50['premio']!=6){
?>
<td bgcolor="#FFFF00" width="33%">
<center><input type="radio" required="required" name="status" value="6" />
<b>SOLICITAR CORRE&Ccedil;&Atilde;O</b></center>
</td>
<?
//}
?>
<td bgcolor="#FF0000" width="33%">
<center><input type="radio" required="required" name="status" value="5" />
<b>RECUSAR</b></center>
</td>
</tr>
<tr>
<td>Parecer: </td>

<td colspan="2"><textarea rows="10" cols="80" name="parecer"></textarea></td>
</tr>
<?
if($row50['parecer']!=""){
?>
<tr>
<td>Parecer Anterior: </td>
<td>
<textarea rows="10" cols="80" name="parecer_ant" readonly="readonly"><? echo nl2br(utf8_encode($row50['parecer'])); ?></textarea>
</td>
</tr>
<?
}
?>
<tr><td>&nbsp;</td></tr>
<tr>
<td colspan="3">
<center><input type="submit" class="ls-btn-primary ls-btn ls-btn-lg ls-btn-block" value="Finalizar Avalia&ccedil;&atilde;o"></center>
</td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr--->
<?
if($row50['area_id']<6){
?>
<tr> 
<tr><td colspan="10"><center><b>Scientific accuracy:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota1" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota1" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota1" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota1" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota1" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota1" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota1" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota1" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota1" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota1" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Academic contribution:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota2" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota2" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota2" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota2" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota2" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota2" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota2" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota2" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota2" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota2" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Practical application:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota3" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota3" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota3" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota3" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota3" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota3" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota3" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota3" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota3" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota3" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Importance to scientific knowledge:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota4" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota4" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota4" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota4" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota4" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota4" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota4" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota4" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota4" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota4" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Abstract clarity:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota5" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota5" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota5" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota5" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota5" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota5" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota5" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota5" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota5" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota5" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Introduction and discussion:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota6" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota6" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota6" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota6" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota6" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota6" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota6" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota6" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota6" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota6" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 

<tr><td colspan="10"><center><b>Bibliographical references:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota7" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota7" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota7" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota7" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota7" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota7" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota7" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota7" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota7" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota7" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Appropriate layout for publication:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota8" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota8" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota8" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota8" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota8" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota8" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota8" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota8" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota8" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota8" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
 <?
 }
 ?>



<?
if($row50['area_id']>=6){
?>
<tr> 
<tr><td colspan="10"><center><b>Scientific accuracy:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota1" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota1" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota1" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota1" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota1" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota1" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota1" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota1" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota1" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota1" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Academic contribution:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota2" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota2" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota2" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota2" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota2" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota2" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota2" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota2" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota2" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota2" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Practical application:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota3" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota3" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota3" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota3" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota3" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota3" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota3" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota3" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota3" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota3" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Abstract clarity:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota4" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota4" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota4" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota4" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota4" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota4" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota4" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota4" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota4" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota4" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Introduction and discussion:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota5" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota5" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota5" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota5" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota5" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota5" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota5" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota5" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota5" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota5" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Objectives:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota6" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota6" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota6" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota6" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota6" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota6" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota6" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota6" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota6" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota6" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr> 
<tr><td colspan="10"><center><b>Relevance:</b></center></td></tr>
<tr><td>&nbsp;</td></tr>
<td><center><input type="radio" required="required" name="nota7" value="1"> 1</center></td>
<td><center><input type="radio" required="required" name="nota7" value="2"> 2</center></td>
<td><center><input type="radio" required="required" name="nota7" value="3"> 3</center></td>
<td><center><input type="radio" required="required" name="nota7" value="4"> 4</center></td>
<td><center><input type="radio" required="required" name="nota7" value="5"> 5</center></td>
<td><center><input type="radio" required="required" name="nota7" value="6"> 6</center></td>
<td><center><input type="radio" required="required" name="nota7" value="7"> 7</center></td>
<td><center><input type="radio" required="required" name="nota7" value="8"> 8</center></td>
<td><center><input type="radio" required="required" name="nota7" value="9"> 9</center></td>
<td><center><input type="radio" required="required" name="nota7" value="10"> 10</center></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
 <?
 }
 ?>




 </table>

     <div class="ls-actions-btn" align='center'>
        <center><button class="ls-btn" align="center">Salvar</button></center>
        </div>    
        
 
 </form>
</div>
<?
}
?>
</div>

</body>
</html>