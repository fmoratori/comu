<?
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$id_trabalho = $_GET['id_trabalho'];
include "../user/replace.php";
require_once("../pdf2/fpdf.php");
$pdf= new FPDF("P","pt","A4");


    $sql_area = "SELECT * FROM tb_areas ORDER BY id ASC";
    $res_area = mysqlexecuta($id,$sql_area);
while ($row_area = mysql_fetch_array($res_area)){
$area_id = $row_area['id'];


    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE area_id=$area_id AND status=4 ORDER BY painel ASC";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);

while ($row_trabalhos = mysql_fetch_array($res_trabalhos)){
$evento = "XXXII REUNIÃO ANUAL DA FESBE - FeSBE 2017";
$id_trabalho = $row_trabalhos['id'];
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$titulo = acento($row_trabalhos['titulo']);
if($row_trabalhos['area_id']<10){
    $area = '0'.$row_trabalhos['area_id'];
}
else{
    $area=$row_trabalhos['area_id'];
}

$titulo = $area.".".$row_trabalhos['painel']." - ".$titulo;
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




$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('arial','B',7);
$pdf->MultiCell(0,10, $evento,0,'J');
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
$pdf->MultiCell(0,25, utf8_encode("Resultados:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$resultados"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, "Conclusão:",0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$conclusao"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
//$pdf->MultiCell(0,25, utf8_encode("Código Comitê de Ética:"),0,'J');
//$pdf->SetFont('arial','',12);
//$pdf->MultiCell(0,20, utf8_encode("$comite_etica"),0,'J');
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
}
}
$pdf->Output("33_".$hora.".pdf","D");
?>
