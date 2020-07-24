<?
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$sql = "SELECT * FROM tb_evento";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res);
$id_trabalho = $_GET['id_trab'];



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

$sql66 = "SELECT * FROM tb_trabalhos WHERE id = $id_trabalho";
$res66 = mysqlexecuta($id,$sql66);
$row66 = mysql_fetch_array($res66);
$id_usuario = $row66['usuario_id'];
$titulo = $row66['titulo'];
if($row66['status']==4){
$sql661 = "SELECT * FROM tb_usuario WHERE id = $id_usuario";
$res661 = mysqlexecuta($id,$sql661);
$row661 = mysql_fetch_array($res661);
$inscrito = $row661['nome'];

$sql_autores = "SELECT * FROM `tb_autores` WHERE trabalho_id = $id_trabalho ORDER BY `ordenacao` ASC";
$res_autores = mysqlexecuta($id,$sql_autores);
$autores ='';

while($row_autores = mysql_fetch_array($res_autores)){
if($autores==''){
    $autores = $row_autores['nome_cientifico'];
}    
else{
    $autores = $autores.', '.$row_autores['nome_cientifico'];
    }
}

setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
$inicio =  strftime( ' %d de %B de %Y', strtotime( $row['inicio'] ) );
$fim =  strftime( ' %d de %B de %Y', strtotime( $row['fim'] ) );

$texto = "Informamos que seu resumo intitulado: ".utf8_encode($titulo).", autores ".utf8_encode($autores).", foi aceito para apresentação na forma de painel na ".$row['nome_evento'].", que ocorrerá de  3 e 6 de setembro de 2017 no Campos do Jordão Convention Center, em Campos de Jordão, São Paulo.";
$evento = $row['sigla'];
require_once("./pdf2/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->Image("../imagens/header.jpg",3,3,589,150);
$pdf->Ln(150);
$pdf->SetFont('arial','B',16);
$pdf->MultiCell(0,18, "CARTA DE ACEITE",0,'C');
$pdf->SetFont('arial','',13);
$pdf->Ln(20);
$pdf->MultiCell(0,25, utf8_decode("Prezado(a) ").$inscrito,0,'J');
$pdf->Ln(40);
$pdf->MultiCell(0,25, utf8_decode("$texto"),0,'J');
$pdf->Ln(20);
$pdf->SetFont('arial','B',13);
    if($row66['area_id']<10){
        $area = '0'.$row66['area_id'];
    }    
    else{
        $area=$row66['area_id'];
    }
$texto2 = "Número de Apresentação: ".$area.".".$row66['painel'];
$pdf->MultiCell(0,25, utf8_decode("$texto2"),0,'J');

    $sessao = $row66['sessao_id'];    
    $sql_sessao = "SELECT * FROM tb_sessao WHERE id=$sessao";
    $res_sessao = mysqlexecuta($id,$sql_sessao);
    $row_sessao = mysql_fetch_array($res_sessao);
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dia_hora_apresent = strftime('%d de %B de %Y', strtotime($row_sessao['data_inicio']))." -  Das ".date("H:i",strtotime($row_sessao['hora_inicio']))." às ".date("H:i",strtotime($row_sessao['hora_fim']));
$pdf->Ln(20);
$pdf->MultiCell(0,25, utf8_decode("Data e horário de apresentação: $dia_hora_apresent."),0,'J');
//$pdf->Ln(20);
$pdf->SetY(650);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(0,25, utf8_decode("São Paulo, ").$dia." de ".$mes." de ".$ano,0,'C');
$pdf->Image("../imagens/assinatura.jpg",270,670,72,36);
$pdf->SetY(710);
$pdf->SetFont('arial','',13);
$pdf->Cell(0,8,"Secretaria Administrativa",0,20,'C');
$pdf->SetFont('arial','B',14);
$pdf->Cell(0,18,utf8_decode("Federação de Sociedades de Biologia Experimental"),0,20,'C');
$pdf->Cell(0,18,utf8_decode("CNPJ 55.805.501/0001-37"),0,50,'C');
$pdf->Ln(10);
$hora = date("Y-n-j H:i:s");
$pdf->SetFont('arial','',13);
$autentic = md5($id_trabalho.' '.$evento);
$pdf->MultiCell(0,20, utf8_decode("Código de Autenticação: ")."$autentic",0,'J');
$pdf->Output("./carta_aceite/".$autentic.".pdf","F");
$pdf->Output("$autentic.pdf","I");
}
else{
    echo 'Cata de Aceite Indisponivel. Seu Trabalho ainda n&atilde;o foi aprovado.';
}
?>
<script>
window.close();
</script>
<!--meta http-equiv="refresh" content="0; url=envio_finalizado.php?val=<? echo $val; ?>&id_trabalho=<? echo $row2['id'] ?>&msg=7"-->

