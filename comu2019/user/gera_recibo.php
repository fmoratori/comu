<?
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$sql = "SELECT * FROM tb_evento";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res);
$id_bol = $_GET['id_bol'];



$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');
 
 
// configuração mes
 
switch ($mes){
 
case 1: $mes = "JANEIRO"; break;
case 2: $mes = "FEVEREIRO"; break;
case 3: $mes = "MARÇO"; break;
case 4: $mes = "ABRIL"; break;
case 5: $mes = "MAIO"; break;
case 6: $mes = "JUNHO"; break;
case 7: $mes = "JULHO"; break;
case 8: $mes = "AGOSTO"; break;
case 9: $mes = "SETEMBRO"; break;
case 10: $mes = "OUTUBRO"; break;
case 11: $mes = "NOVEMBRO"; break;
case 12: $mes = "DEZEMBRO"; break;
 
}

$sql66 = "SELECT * FROM tb_boleto WHERE id = $id_bol";
$res66 = mysqlexecuta($id,$sql66);
$row66 = mysql_fetch_array($res66);
$id_usuario = $row66['user_id'];

$sql_usuario_recibo = "SELECT * FROM `tb_usuario` WHERE id = $id_usuario";
$res_usuario_recibo = mysqlexecuta($id,$sql_usuario_recibo);
$row_usuario_recibo = mysql_fetch_array($res_usuario_recibo);



$nome = utf8_decode($row_usuario_recibo['nome']);
$cpf = utf8_decode($row_usuario_recibo['cpf']);
$valor = $row66['valor'];
if($row66['categoria']==20){
$referente = utf8_encode($row66['referente']);
//$referente = "referente a multa pelo não cumprimento das normas para envio de trabalhos";
}
else{
$referente = $row66['referente'];	
//$referente = "referente ao pagamento da inscrição na";	
}
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

date_default_timezone_set( 'America/Sao_Paulo' );

$inicio =  strftime( ' %d de %B de %Y', strtotime( $row['inicio'] ) );
$fim =  strftime( ' %d de %B de %Y', strtotime( $row['fim'] ) );

$texto = "Recebemos de ".$nome."  (".$cpf.") a quantia de R$ ".$valor.",00 referente à ".$referente." da ".utf8_decode($row['nome_evento']).", que será realizado de ".$inicio." a ".$fim." na cidade de ".utf8_decode($row['local']).".";
//echo $nome;
$evento = $row['sigla'];
if($row66['situacao']=='PG'){
 require_once("./pdf2/fpdf.php");
$pdf= new FPDF("P","pt","A4");

$pdf->AddPage();
$pdf->Image("../imagens/logo2.png",3,3,589,150);
$pdf->Ln(150);
//$pdf->Ln(10);
$pdf->SetFont('arial','B',16);
$pdf->MultiCell(0,18, "RECIBO",0,'C');
$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,18, "$autores",0,'C');
$pdf->SetFont('arial','',13);
$pdf->Ln(20);
$pdf->MultiCell(0,25, "$texto",0,'J');
$pdf->Ln(100);
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "São Paulo, ".$dia." de ".$mes." de ".$ano,0,'C');
$pdf->Ln(90);
//$pdf->Image("../imagens/assinatura.jpg",200,465,180,90);
$pdf->SetFont('arial','',13);
$pdf->Cell(0,8,"Secretaria Administrativa",0,20,'C');
$pdf->SetFont('arial','B',14);
//$pdf->Cell(0,18,"Federação de Sociedades de Biologia Experimental",0,20,'C');
//$pdf->Cell(0,18,utf8_decode("CNPJ 55.805.501/0001-37"),0,50,'C');
$pdf->Ln(70);
$hora = date("Y-n-j H:i:s");
$pdf->SetFont('arial','',13);
$autentic = md5($id_bol.' '.$evento);
$pdf->MultiCell(0,20, "Código de Autenticação: "."$autentic",0,'J');
$pdf->Output("./recibos/".$autentic.".pdf","F");
$pdf->Output("$autentic.pdf","I");
?>
<script>
window.close();
</script>
<!--meta http-equiv="refresh" content="0; url=envio_finalizado.php?val=<? echo $val; ?>&id_trabalho=<? echo $row2['id'] ?>&msg=7"-->
<?
}
else{
	 require_once("./pdf2/fpdf.php");
$pdf= new FPDF("P","pt","A4");

$pdf->AddPage();
$pdf->Image("../imagens/logo2.png",3,3,589,150);
$pdf->Ln(150);
//$pdf->Ln(10);

$pdf->SetFont('arial','B',16);
$pdf->MultiCell(0,18, "NÃO CONSTA O PAGAMENTO DESTE BOLETO",0,'C');
$pdf->Ln(100);
$hora = date("Y-n-j H:i:s");
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,20, "Gerado em: "."$hora",0,'J');
//$pdf->Output("./trabalho/".$id_trabalho."_".$hora.".pdf","F");
$pdf->Output("recibo"."_".$hora.".pdf","I");
}
?>

