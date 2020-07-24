<?
session_start();
include "mysqlconecta.php";
include "mysqlexecuta.php";

$id_certificado = $_GET['id_certificado'];
$sql_certificado_poster = "SELECT * FROM tb_usuario WHERE id = $id_certificado AND `presenca`='s'";
$res_certificado_poster = mysqlexecuta($id,$sql_certificado_poster);
$row_certificado_poster = mysql_fetch_array($res_certificado_poster);
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

require_once("./pdf2/fpdf.php");
//$nome = utf8_decode($row_usuario['nome']);
//$atividade = $row_atividade_certificados['nome'];
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

date_default_timezone_set( 'America/Sao_Paulo' );

$inicio =  strftime( ' %d de %B de %Y', strtotime( $row_evento['inicio'] ) );
$fim =  strftime( ' %d de %B de %Y', strtotime( $row_evento['fim'] ) );
$area_id = $row_certificado_poster['area_id'];
$painel = $row_certificado_poster['painel'];
$titulo = $row_certificado_poster['titulo'];
if($area_id<10){
    $area_id = '0'.$area_id;
}
$titulo_exibe = strtoupper(utf8_encode($row_certificado_poster['nome']));
$autenticacao = sha1($titulo_exibe);
	// Abre ou cria o arquivo bloco1.txt
	$fp = fopen("./logs/certificados/$id_certificado.txt", "a");
	$data = date("d-m-Y, H:i:s");
	$ip = getenv("REMOTE_ADDR");
	$referer = $_SERVER['SCRIPT_FILENAME'];
	$end_local = $_SERVER['SERVER_NAME'];
	$navegador = $_SERVER['HTTP_USER_AGENT'];
	$texto = $data." --- ".$ip." --- ".$referer." --- ".$navegador."\n";
	$escreve = fwrite($fp, $texto);
	$nome = strtoupper($row_usuario['nome']);
$texto = "Certificamos que ".$titulo_exibe." participou da ".$row_evento['nome_evento'].", realizado de ".$inicio." a ".$fim." no ".$row_evento['local'].".";
	$pdf= new FPDF("L","pt","A4");
	$pdf->AddPage();
	$pdf->Image("./cabecalho2.jpg",0,5,840,140);
	$pdf->Ln(150);
	$pdf->SetFont('arial','B',24);
	$pdf->Cell(0,20,"CERTIFICADO",0,1,'C');
	$pdf->Ln(30);
	$pdf->SetFont('arial','',16);
	$pdf->MultiCell(0,18, utf8_decode($texto),0,'J');
	$pdf->SetFont('arial','',16);
	$pdf->MultiCell(0,18, "",0,'J');
	$pdf->Ln(100);
	$pdf->SetFont('arial','',16);
//	$pdf->Cell(0,0,utf8_decode("São Paulo, 09 de setembro de 2015."),0,250,'C');
	$pdf->Cell(0,106,"",0,250,'L');
//	$pdf->Image("./ass_ana.jpg",421,430,180,90);
//	$pdf->SetFont('arial','',8);
	$pdf->Image("./assinaturas.jpg",210,430,420,90);
	$pdf->SetFont('arial','',8);
//	$pdf->Cell(0,18, utf8_decode($autenticacao),0,'J');
	$pdf->Image("./rodape2.jpg",0,530,840,50);
  //  ob_start();
 	$pdf->Output($autenticacao.".pdf","I");
 	$pdf->Output("./certificado_presenca/".$autenticacao.".pdf","F");
?>