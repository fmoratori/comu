<?
//include "../replace.php";
$id_trabalho = $_GET['id_trabalho'];
$area = $_POST['area'];

$titulo1 = $_POST['titulo'];
$titulo2 = str_replace("'","`",$titulo1);
$titulo = strip_tags(str_replace('"', "`", $titulo2));

$introducao1 = $_POST['introducao'];
//$introducao1 = utf8_decode($introducao1);
$introducao2 = str_replace("'","`",$introducao1);
$introducao3 = str_replace('"', "`", $introducao2);
$introducao3 = str_replace('<', "&lt;", $introducao3);

//$introducao = $introducao3;
$introducao = strip_tags($introducao3);
$objetivos1 = $_POST['objetivos'];
$objetivos2 = str_replace("'","`",$objetivos1);
$objetivos3 = str_replace('"', "`", $objetivos2);
$objetivos3 = str_replace('<', "&lt;", $objetivos3);
$objetivos = strip_tags($objetivos3);
$metodos1 = $_POST['metodos'];
$metodos2 = str_replace("'","`",$metodos1);
$metodos3 = str_replace('"', "`", $metodos2);
$metodos3 = str_replace('<', "&lt;", $metodos3);
$metodos = strip_tags($metodos3);
$resultados1 = $_POST['resultados'];
$resultados2 = str_replace("'","`",$resultados1);
$resultados3 = str_replace('"', "`", $resultados2);
$resultados3 = str_replace('<', "&lt;", $resultados3);
$resultados = strip_tags($resultados3);
$conclusao1 = $_POST['conclusao'];
$conclusao2 = str_replace("'","`",$conclusao1);
$conclusao3 = str_replace('"', "`", $conclusao2);
$conclusao3 = str_replace('<', "&lt;", $conclusao3);
$conclusao = strip_tags($conclusao3);
$apoio1 = $_POST['apoio'];
$apoio2 = str_replace("'","`",$apoio1);
$apoio3 = str_replace('"', "`", $apoio2);
$apoio = strip_tags($apoio3);
$premio = $_POST['premio'];
$comite1 = $_POST['comite'];
$comite2 = str_replace("'","`",$comite1);
$comite3 = str_replace('"', "`", $comite2);
$comite = strip_tags($comite3);
$data_atual = date('d-m-Y');
$justifique1 = $_POST['justifique'];
$justifique2 = str_replace("'","`",$justifique1);
$justifique3 = str_replace('"', "`", $justifique2);
$justifique = strip_tags($justifique3);
$justifique = $data_atual.' - '.$justifique;


$cont_introducao = strlen($introducao);
$cont_objetivos = strlen($objetivos);
$cont_metodos = strlen($metodos);
$cont_resultados = strlen($resultados);
$cont_conclusao = strlen($conclusao);

$caracteres = ($cont_introducao+$cont_objetivos+$cont_metodos+$cont_resultados+$cont_conclusao);
//echo $caracteres;
//break;

	$sql_conta_trabalhos = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE `id`=$id_trabalho");
	$res_conta_trabalhos =  mysql_result($sql_conta_trabalhos, 0);
	$total_trabalhos = $res_conta_trabalhos;

if($total_trabalhos==0){
//    $insertCmd = mysql_query(INSERT INTO `tb_trabalhos` (`id`, `usuario_id`, `status`, `area_id`, `titulo`, `introducao`) VALUES (NULL, '$id_usuario', '1', '$area', '$titulo', '$resumo');
    $sql_insere_trabalho="INSERT INTO `tb_trabalhos` (`id`, `usuario_id`, `status`, `area_id`, `titulo`, `introducao`, `objetivos`, `metodos`, `resultados`, `conclusao`, `apoio`, `comite`, `premio`) VALUES ($id_trabalho, '$id_usuario', '1', '$area', '$titulo', '$introducao', '$objetivos', '$metodos', '$resultados', '$conclusao', '$apoio', '$comite', '7')";
    $res_insere_trabalhos = mysqlexecuta($id,$sql_insere_trabalho);

    //$idDaInsert = mysql_insert_id();
    //$id_trabalho = $idDaInsert;
}
else{
//    if($id_trabalho == $id_usuario){
    $sql_insere_trabalho="UPDATE `tb_trabalhos` SET `area_id` = '$area',`titulo` = '$titulo', `introducao` = '$introducao', `objetivos`= '$objetivos', `metodos`= '$metodos', `resultados`='$resultados', `conclusao`='$conclusao', `apoio`= '$apoio', `comite`='$comite', `msg_avaliador`='$justifique' WHERE `tb_trabalhos`.`id` = $id_trabalho";	
    $res_insere_trabalhos = mysqlexecuta($id,$sql_insere_trabalho);
  //  }
}
if($caracteres>3550){
     echo "<meta http-equiv='refresh' content=0;url='http://fmsys.com.br/fmsys/comu2019/user/principal.php?pg=trabalhos.php&id_trabalho=$id_trabalho&caracteres=$caracteres&idioma=$idioma'>";
    break;
}

?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=<? echo $idioma; ?>">
