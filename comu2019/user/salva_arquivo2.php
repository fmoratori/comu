<?
include "./replace.php";
$idioma = $_GET['idioma'];
$id_trabalho = $_GET['id_trabalho'];
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE id=$id_trabalho";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos = mysql_fetch_array($res_trabalhos);
$evento = $row_evento['sigla'];
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$titulo = acento($row_trabalhos['titulo']);
require_once("../pdf2/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('arial','B',7);
$pdf->MultiCell(0,10, "Gerado em: "."$hora - ".$evento,0,'J');
$pdf->Ln(10);
$pdf->SetFont('arial','B',16);
$pdf->MultiCell(0,18, utf8_encode("$titulo"),0,'C');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25,"Declaro que o trabalho não faz uso de animais cordados nos termos da lei 11.794/2008 e regulamentações subsequentes do CONCEA. Estou ciente de que, se na avaliação for identificado que o trabalho é sim objeto das legislações acima mencionadas, o mesmo será automaticamente cancelado pela organização da XII Reunião Regional da FeSBE.",0,'J');
$pdf->SetFont('arial','',13);
$pdf->Ln(15);
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "Gerado em: "."$hora - ".$evento,0,'J');
$pdf->Output("./ce/ce_".$id_trabalho.".pdf","F");
$arquivo = "./ce/ce_".$id_trabalho.".pdf";
$tamanho = filesize($arquivo);
?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=finalizar_envio.php&id_trabalho=<? echo $id_trabalho ?>&tamanho=<? echo $tamanho; ?>&idioma=<? echo $idioma; ?>">

