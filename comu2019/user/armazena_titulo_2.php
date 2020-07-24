<?
//include "../replace.php";
$id_trabalho = $_GET['id_trabalho'];
$area = $_POST['area'];

$titulo1 = $_POST['titulo'];
$titulo2 = str_replace("'","`",$titulo1);
$titulo = strip_tags(str_replace('"', "`", $titulo2));
//echo $caracteres;
//break;

	$sql_conta_trabalhos = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE `id`=$id_trabalho");
	$res_conta_trabalhos =  mysql_result($sql_conta_trabalhos, 0);
	$total_trabalhos = $res_conta_trabalhos;

if(($total_trabalhos!=0)&&($id_trabalho == $id_usuario)){
//    $insertCmd = mysql_query(INSERT INTO `tb_trabalhos` (`id`, `usuario_id`, `status`, `area_id`, `titulo`, `introducao`) VALUES (NULL, '$id_usuario', '1', '$area', '$titulo', '$resumo');
    $sql_insere_trabalho="UPDATE `tb_trabalhos` SET `titulo` = '$titulo' WHERE `tb_trabalhos`.`id` = $id_trabalho";	
    $res_insere_trabalhos = mysqlexecuta($id,$sql_insere_trabalho);
    //$idDaInsert = mysql_insert_id();
    //$id_trabalho = $idDaInsert;
    
    
    
    
    include "./replace.php";
require_once("../pdf2/fpdf.php");
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
$evento = $row_evento['sigla'];
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$titulo = acento($row_trabalhos['titulo']);
$introducao = acento($row_trabalhos['introducao']);
//$introducao = acento($row_trabalhos['introducao']);
$metodos = acento($row_trabalhos['metodos']);
$resultados = acento($row_trabalhos['resultados']);
$objetivos = acento($row_trabalhos['objetivos']);
$conclusao = acento($row_trabalhos['conclusao']);
$apoio = acento($row_trabalhos['apoio']);
$comite_etica = acento($row_trabalhos['comite']);


$sql32 = "SELECT * FROM `tb_autores` WHERE `trabalho_id`= $id_trabalho ORDER BY `ordenacao` ASC";
$res32 = mysqlexecuta($id,$sql32);
$autores = "";
$id_inst = "";

while($row32 = mysql_fetch_array($res32)){
	$autores = $autores.$row32['nome_cientifico'].", ";
	$id_inst = $id_inst.$row32['inst1'].",".$row32['inst2'].",".$row32['inst3'];
	}
$sql33 = "SELECT DISTINCT depto,sigla_inst FROM `tb_instituicao` WHERE `id` IN ($id_inst)";
$res33 = mysqlexecuta($id,$sql33);




$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('arial','B',7);
$pdf->MultiCell(0,10, "Gerado em: "."$hora - ".$evento,0,'J');
$pdf->Ln(10);
$pdf->SetFont('arial','B',16);
$pdf->MultiCell(0,18, utf8_encode("$titulo"),0,'C');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,18, utf8_encode("$autores"),0,'C');
$pdf->SetFont('arial','',12);
while($row33 = mysql_fetch_array($res33)){
$pdf->MultiCell(0,18, utf8_encode($row33['depto'])." - ".utf8_encode($row33['sigla_inst']),0,'C');
	}	
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25,"Introdução:",0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,25, utf8_encode("$introducao"),0,'J');
$pdf->SetFont('arial','B',12);
//$pdf->Ln(8);
$pdf->MultiCell(0,25, utf8_encode("Objetivos:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$objetivos"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, "Métodos:",0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$metodos"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, "Resultados:",0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$resultados"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, "Conclusão:",0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$conclusao"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, "Código Comitê de Ética:",0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$comite_etica"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, utf8_encode("Apoio Financeiro:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$apoio"),0,'J');
$pdf->SetFont('arial','B',12);
//$pdf->MultiCell(0,25, "Comitê de Ética:",0,'J');
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "$comite_etica",0,'J');
$pdf->Ln(15);
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "Gerado em: "."$hora - ".$evento,0,'J');

if(is_dir("./trabalho/".$id_trabalho)) {
$pdf->Output("./trabalho/".$id_trabalho."/".$id_trabalho."_editado_33_".$hora.".pdf","F");
}
else{
	mkdir('./trabalho/'.$id_trabalho.'/');
$pdf->Output("./trabalho/".$id_trabalho."/".$id_trabalho."_editado_33_".$hora.".pdf","F");
}
$filename = "./trabalho/".$id_trabalho."/".$id_trabalho."_editado_33_".$hora.".pdf";
$_SESSION['link'] = $filename;

    
    
    
    
    
}

?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=finaliza_edicao_2.php&id_trabalho=<? echo $id_trabalho; ?>">
