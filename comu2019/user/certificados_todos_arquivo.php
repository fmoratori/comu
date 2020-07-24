<?
session_start();
include "mysqlconecta.php";
include "mysqlexecuta.php";

//$id_usuario = $_SESSION['usuario'];
$id_certificado = $_GET['id_certificado'];
$cpf = $_GET['cpf'];
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);




$sql_usuario = "SELECT * FROM tb_usuario WHERE SUBSTR(nome,1,1) BETWEEN 'T' AND 'Z' AND id IN (SELECT usuario_id FROM tb_certificados) ORDER BY nome ASC";
$res_usuario = mysqlexecuta($id,$sql_usuario);
while($row_usuario = mysql_fetch_array($res_usuario)){
$nome = utf8_decode($row_usuario['nome']);
$usuario = $row_usuario['id'];


require_once("./pdf2/fpdf.php");
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
$inicio =  strftime( ' %d de %B de %Y', strtotime( $row_evento['inicio'] ) );
$fim =  strftime( ' %d de %B de %Y', strtotime( $row_evento['fim'] ) );
$pdf= new FPDF("L","pt","A4");


$sql_certificados = "SELECT * FROM tb_certificados WHERE usuario_id = $usuario";
$res_certificados = mysqlexecuta($id,$sql_certificados);

while($row_certificados = mysql_fetch_array($res_certificados)){
    
$id_user = $row_certificados['usuario_id'];



$id_atividade = $row_certificados['id_atividade'];
$sql_atividade_certificados = "SELECT * FROM tb_atividades WHERE id=$id_atividade";
$res_atividade_certificados = mysqlexecuta($id,$sql_atividade_certificados);
$row_atividade_certificados = mysql_fetch_array($res_atividade_certificados);
$atividade = $row_atividade_certificados['nome'];

	$nome = strtoupper(utf8_encode($row_usuario['nome']));
    $texto = "O Departamento Científico da Faculdade de Medicina da USP certifica que \n\n".$nome."\n\n participou do \n\n'".strtoupper(utf8_encode($atividade))."' \n\n no XXXVIII Congresso Médico Universitário da FMUSP, com duração de quatro horas.";

	$pdf->AddPage();
	$pdf->Image("./comu_header.png",0,1,842,140);
	$pdf->Ln(100);
	$pdf->SetFont('arial','B',24);
//	$pdf->Cell(0,20,"CERTIFICADO",0,1,'C');
	if($row_atividade_certificados['id']==130){
	$pdf->Ln(50);
	$pdf->SetFont('arial','',15);
	$pdf->MultiCell(0,18, utf8_decode($texto),0,'C');
	}
	else{
	$pdf->Ln(50);
        $pdf->SetFont('arial','',17);
        $pdf->MultiCell(0,18, utf8_decode($texto),0,'C');
}
	$pdf->SetFont('arial','',16);
	$pdf->Ln(20);
    if($row_atividade_certificados['sessao']==1){
	$pdf->MultiCell(0,18, utf8_decode("São Paulo, 04 de Outubro de 2019"),0,'C');
    }
    if($row_atividade_certificados['sessao']==2){
	$pdf->MultiCell(0,18, utf8_decode("São Paulo, 05 de Outubro de 2019"),0,'C');
    }
    if($row_atividade_certificados['sessao']==3){
	$pdf->MultiCell(0,18, utf8_decode("São Paulo, 05 de Outubro de 2019"),0,'C');
    }
    if($row_atividade_certificados['sessao']==4){
	$pdf->MultiCell(0,18, utf8_decode("São Paulo, 06 de Outubro de 2019"),0,'C');
    }
	$pdf->Ln(40);
	$pdf->SetFont('arial','',16);
//	$pdf->Cell(0,0,utf8_decode("São Paulo, 09 de setembro de 2015."),0,250,'C');
	$pdf->Cell(0,106,"",0,250,'L');
//	$pdf->Image("./ass_ana.jpg",421,430,180,90);
//	$pdf->SetFont('arial','',8);
//	$pdf->Image("./assinaturas.jpg",210,430,420,90);
//	$pdf->SetFont('arial','',8);
//	$pdf->Cell(0,18, utf8_decode($autenticacao),0,'J');
	$pdf->Image("./comu_footer.png",20,460,800,110);
  //  ob_start();
}
    $nome_arquivo = strtoupper($nome);
 	$pdf->Output("./certificado_nome/".$nome_arquivo.".pdf","F");
}
?>
