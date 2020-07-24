<?
$id_trabalho = $_GET['id_trabalho'];
?>
<h1 class="ls-title-intro ls-ico-pencil2">Finalizar Envio</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/5)*5),2); ?>" class="ls-animated"></div>
<div class="ls-box-filter">
<!---form action="./principal.php?pg=final.php&id_trabalho=<? // echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST"--->
<div class="ls-alert-danger"><strong>Clique em Finalizar Resumo, somente ap&oacute;s conferir a &iacute;ntegra do trabalho apresentada logo abaixo.</strong><br />Aten&ccedil;&atilde;o: Ap&oacute;s finalizar o envio do trabalho, n&atilde;o ser&aacute; poss&iacute;vel realizar qualquer tipo de altera&ccedil;&atilde;o no mesmo.</div>
<?
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
//echo $sql33;
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
$pdf->MultiCell(0,25,utf8_encode("Introdução:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,25, utf8_encode("$introducao"),0,'J');
$pdf->SetFont('arial','B',12);
//$pdf->Ln(8);
$pdf->MultiCell(0,25, utf8_encode("Objetivos:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$objetivos"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, utf8_encode("Métodos:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$metodos"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, utf8_encode("Resultados:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$resultados"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, utf8_encode("Conclusão:"),0,'J');
$pdf->SetFont('arial','',12);
$pdf->MultiCell(0,20, utf8_encode("$conclusao"),0,'J');
//$pdf->Ln(8);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, utf8_encode("Código Comitê de Ética:"),0,'J');
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
$pdf->Output("./trabalho/".$id_trabalho."/".$id_trabalho."_33_".$hora.".pdf","F");
}
else{
	mkdir('./trabalho/'.$id_trabalho.'/');
$pdf->Output("./trabalho/".$id_trabalho."/".$id_trabalho."_33_".$hora.".pdf","F");
}
$filename = "./trabalho/".$id_trabalho."/".$id_trabalho."_33_".$hora.".pdf";
$_SESSION['link'] = $filename;
?>
<?
$comite_de_etica = './ce/ce_'.$id_trabalho.'.pdf';
$filename ='./exibe_trabalho.php?id_trabalho='.$id_trabalho;
?>

<!--a href="<? echo $comite_de_etica ?>" target="_blank"><h3>Clique Aqui Para Visualizar a Carta do Comitê de Ética.</h3></a><br /-->
<iframe src="<? echo $comite_de_etica; ?>" width="99%" height="500px"></iframe>


<a href="./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">VOLTAR</a>
<a href="./principal.php?pg=principal_trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-up">NÃO FINALIZAR</a>
<a href="./principal.php?pg=final.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-right">FINALIZAR ENVIO</a>

</form>
</div>
