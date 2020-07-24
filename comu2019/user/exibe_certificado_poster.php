<?
session_start();
include "mysqlconecta.php";
include "mysqlexecuta.php";
include "replace.php";

$id_certificado_poster = $_GET['id_certificado_poster'];
$sql_certificado_poster = "SELECT * FROM tb_trabalhos WHERE id = $id_certificado_poster AND presenca='s'";
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
$titulo = acento($row_certificado_poster['titulo']);
$id_trabalho = $row_certificado_poster['id'];
if($area_id<10){
    $area_id = '0'.$area_id;
}


$sql5 = "SELECT * FROM `tb_instituicao` WHERE `trabalho_id`= $id_trabalho ORDER BY `id` ASC";

$res5 = mysqlexecuta($id,$sql5);

//$row5 = mysql_fetch_array($res5);



$sql6 = "SELECT * FROM `tb_autores` WHERE `trabalho_id`= $id_trabalho ORDER BY `ordenacao` ASC";

$res6 = mysqlexecuta($id,$sql6);

$autores = "";

$id_inst = "";



while($row6 = mysql_fetch_array($res6)){

//	$substituido = str_replace("não ","",$frase);

	$autores1 = str_replace(' ','',$row6['nome_cientifico']);

	$autores1 = str_replace(',',' ',$autores1);

	$autores1 = str_replace('.','',$autores1).', ';

	$autores = $autores.$autores1;

	$id_inst = $id_inst.$row6['inst1'].",".$row6['inst2'].",".$row6['inst3'];

	}

$sql7 = "SELECT DISTINCT depto,sigla_inst FROM `tb_instituicao` WHERE `id` IN ($id_inst)";

$res7 = mysqlexecuta($id,$sql7);

while($row7 = mysql_fetch_array($res7)){
    $inst= $inst." ".$row7['depto']." - ".$row7['sigla_inst']." ";
	}


$titulo_exibe = utf8_encode($area_id.'.'.$painel.' - '.$titulo.' - '.$autores.' '.$inst);
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
$texto = "Certificamos que o trabalho ".$titulo_exibe." foi apresentado na forma de painel durante a ".$row_evento['nome_evento'].", realizado de ".$inicio." a ".$fim." no  ".$row_evento['local'].".";
	$pdf= new FPDF("L","pt","A4");
	$pdf->AddPage();
	$pdf->Image("./cabecalho2.jpg",0,5,840,140);
	$pdf->Ln(150);
	$pdf->SetFont('arial','B',24);
	$pdf->Cell(0,20,"CERTIFICADO",0,1,'C');
	$pdf->Ln(30);
	$pdf->SetFont('arial','',14);
	$pdf->MultiCell(0,18, utf8_decode($texto),0,'J');
	$pdf->SetFont('arial','',16);
	$pdf->MultiCell(0,18, "",0,'J');
	$pdf->Ln(10);
	$pdf->SetFont('arial','',16);
//	$pdf->Cell(0,0,utf8_decode("São Paulo, 09 de setembro de 2015."),0,250,'C');
	$pdf->Cell(0,106,"",0,250,'L');
	$pdf->Image("./assinaturas.jpg",210,430,420,90);
	$pdf->SetFont('arial','',8);
	$pdf->Cell(0,18, utf8_decode($autenticacao),0,'J');
	$pdf->Image("./rodape2.jpg",0,530,840,50);
  //  ob_start();
 	$pdf->Output($autenticacao.".pdf","I");
 	$pdf->Output("./certificados_trabalhos/".$autenticacao.".pdf","F");
?>