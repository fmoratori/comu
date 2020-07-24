<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "mysqlconecta.php";
include "mysqlexecuta.php";
require_once("../pdf2/fpdf.php");
$sql1 = "SELECT * FROM `tb_propostas_curso` ORDER BY `id`";
$res1 = mysqlexecuta($id,$sql1);
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('arial','B',7);
$pdf->MultiCell(0,10, "Data Arquivo: ".$hora,0,'J');
$pdf->Ln(50);
$pdf->SetFont('arial','B',40);
$pdf->MultiCell(0,16, "PROPOSTAS",0,'C');
$pdf->Ln(50);
$pdf->SetFont('arial','B',40);
$pdf->MultiCell(0,16, "FESBE 2017",0,'C');
$pdf->Ln(80);
$pdf->SetFont('arial','B',40);
$pdf->MultiCell(0,16, "CURSOS",0,'C');

$pdf->Ln(15);
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "Gerado em: "."$hora - ".$evento,0,'J');




$x=1;
while($row1 = mysql_fetch_array($res1)){
//$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('arial','B',7);
$pdf->MultiCell(0,10, "PROPOSTA ".$x,0,'J');
//$pdf->Ln(10);
$pdf->SetFont('arial','B',16);
$pdf->MultiCell(0,16, utf8_decode($row1['titulo_curso'])." ",0,'C');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25,"DADOS DO PROPONENTE" ,0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25,"Nome Completo: ".utf8_decode(strtoupper($row1['nome_prop']))."   -   "."CPF: ".utf8_decode($row1['doc_prop'])." " ,0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "E-mail: ".$row1['email_prop']."   -   "."Telefone: ".$row1['tel_prop']." ",0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Cargo/Função: ".utf8_decode($row1['cargo_prop'])." - "."Instituição: ".utf8_decode($row1['inst_prop'])." ",0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Sociedade(s) de Filiação do Proponente: ".utf8_decode($row1['sociedade_prop'])." ",0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Dados Do Coordenador",0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Nome: ".utf8_decode($row1['nome_coord'])." - Doc: ".utf8_decode($row1['doc_coord'])." - ".utf8_decode($row1['email_coord']) ,0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Telefone: ".utf8_decode($row1['tel_coord'])." / ".utf8_decode($row1['cel_coord']) ,0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Instituição: ".utf8_decode($row1['depto_coord'])."/".utf8_decode($row1['inst_coord']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Endereço: ".utf8_decode($row1['end_coord'])." - ".utf8_decode($row1['cep_coord'])." - ".utf8_decode($row1['pais_coord']),0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Dados Do Curso",0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Título: ".utf8_decode($row1['titulo_curso']),0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Aula 1: ".utf8_decode($row1['titulo_aula1']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, utf8_decode($row1['prof_aula1'])." - ".utf8_decode($row1['email_aula1'])." - ".utf8_decode($row1['tel_aula1'])." - ".utf8_decode($row1['cel_aula1']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, utf8_decode($row1['depto_aula1'])." - ".utf8_decode($row1['inst_aula1'])." - ".utf8_decode($row1['pais_aula1']),0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Aula 2: ".utf8_decode($row1['titulo_aula2']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, utf8_decode($row1['prof_aula2'])." - ".utf8_decode($row1['email_aula2'])." - ".utf8_decode($row1['tel_aula2'])." - ".utf8_decode($row1['cel_aula2']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, utf8_decode($row1['depto_aula2'])." - ".utf8_decode($row1['inst_aula2'])." - ".utf8_decode($row1['pais_aula2']),0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Aula 3: ".utf8_decode($row1['titulo_aula3']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, utf8_decode($row1['prof_aula3'])." - ".utf8_decode($row1['email_aula3'])." - ".utf8_decode($row1['tel_aula3'])." - ".utf8_decode($row1['cel_aula3']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, utf8_decode($row1['depto_aula3'])." - ".utf8_decode($row1['inst_aula3'])." - ".utf8_decode($row1['pais_aula3']),0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25,"" ,0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Justificativa: ".utf8_decode($row1['justificativa']),0,'J');
$pdf->SetFont('arial','',13);

//$pdf->MultiCell(0,25, "Comitê de Ética:",0,'J');
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "$comite_etica",0,'J');
$pdf->Ln(15);
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "Gerado em: "."$hora - ".$evento,0,'J');
$x++;
}
$pdf->Output("./proposta_cursos".$hora.".pdf","F");
$filename = "./proposta_cursos".$hora.".pdf";
?>
<iframe src="<? echo $filename; ?>" width="99%" height="1000px"></iframe>
