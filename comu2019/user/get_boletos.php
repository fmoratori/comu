<?
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$id_bol = $_GET['transaction_id'];
$status = $_GET['collection_status'];
$forma_pagamento = $_GET['payment_type'];
$id_pagamento = $_GET['collection_id'];
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$notificationType = $_POST['transaction_id'].$id_bol;
$notificationCode = $_POST['notificationCode'];
$link = "https://ws.pagseguro.uol.com.br/v3/transactions/$id_bol?email=weber@fesbe.org.br&token=829227A3652543D09E88BE2FBE6B54B3"; //link do arquivo xml
$xml = simplexml_load_file($link);
$reference = $xml->reference;
$texto= "\n\n Data: ".$xml->date."\n Codigo: ".$xml->code."\n Referencia: ".$xml->reference."\n Tipo:".$xml->type."\n Status: ".$xml->status."\n Ultima Modificacao: ".$xml->lastEventDate;
//echo 'Título: ' . $xml->titulo . '<br>';
//echo 'Data de Atualização: ' . $xml->date . '<br>';
 //echo $texto;
$status=$xml->status;
$referencia = $xml->reference;
$data = $xml->date;
$forma_pagamento = $xml->paymentMethod;


//echo $id_boleto."<br />".$status."<br />".$forma_pagamento."<br />".$id_pagamento;

if($status!=''){
if($status == '3' || $status == '4'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'PG',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$data',
`status_pagto_online` = '$status',
`observacao` = '$id_bol'
 WHERE `id` = $referencia";	
}
if($status == '1' ||$status == '2'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'PE',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$data',
`status_pagto_online` = '$status',
`observacao` = '$id_bol'
 WHERE `id` = $referencia";	
}
if($status == '5' || $status == '6' || $status == '7' || $status == '8' || $status == '9'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'NP',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$data',
`status_pagto_online` = '$status',
`observacao` = '$id_bol'
 WHERE `id` = $referencia";	
}
}
else{
$sql88="UPDATE `tb_boleto` SET `situacao` = 'AG',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$data',
`status_pagto_online` = '$status',
`observacao` = '$id_bol'
 WHERE `id` = $referencia";		
}
$res88 = mysqlexecuta($id,$sql88);

// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo é aberto para ser escrito
$fp = fopen("./logs_pgto/$reference.txt", "a");
//$texto = " id_bol = ".$id_bol."\n Hora = ".$hora."\n notificationType= ".$notificationType."\n notificationCode=".$notificationCode."\n status = ".$status."\n forma_pagamento = ".$forma_pagamento."\n id_pagamento = ".$id_pagamento."\n\n\n";
//$texto = $status." *** ".$data_comp." *** ".$email_comp."   \n";
//$texto = "teste de retorno";
$escreve = fwrite($fp, $texto);
// Fecha o arquivo
fclose($fp);


?>
<meta http-equiv="refresh" content=1;url="http://fmsys.com.br/fmsys/fesbe/regional2019/user/principal.php?pg=boletos.php">