<?
$id_bol = $_GET['id'];

$status2 = $_GET['status'];
$status3 = $_GET['status_detail'];
$receiver_email	 = 	$_POST['receiver_email'];
$receiver_id	 = 	$_POST['receiver_id'];
$residence_country	 = 	$_POST['residence_country'];
$Information	 = 	$_POST['Information'];
$test_ipn	 = 	$_POST['test_ipn'];
$transaction_subject	 = 	$_POST['transaction_subject'];
$txn_id	 = 	$_POST['txn_id'];
$txn_type	 = 	$_POST['txn_type'];
$Information	 = 	$_POST['Information'];
$payer_email	 = 	$_POST['payer_email'];
$payer_id	 = 	$_POST['payer_id'];
$payer_status	 = 	$_POST['payer_status'];
$first_name	 = 	$_POST['first_name'];
$last_name	 = 	$_POST['last_name'];
$address_city	 = 	$_POST['address_city'];
$address_country	 = 	$_POST['address_country'];
$address_state	 = 	$_POST['address_state'];
$address_status	 = 	$_POST['address_status'];
$address_country_code	 = 	$_POST['address_country_code'];
$address_name	 = 	$_POST['address_name'];
$address_street	 = 	$_POST['address_street'];
$address_zip	 = 	$_POST['address_zip'];
$Information	 = 	$_POST['Information'];
$custom	 = 	$_POST['custom'];
$handling_amount	 = 	$_POST['handling_amount'];
$item_name	 = 	$_POST['item_name'];
$item_number	 = 	$_POST['item_number'];
$mc_currency	 = 	$_POST['mc_currency'];
$mc_fee	 = 	$_POST['mc_fee'];
$mc_gross	 = 	$_POST['mc_gross'];
$payment_date	 = 	$_POST['payment_date'];
$payment_fee	 = 	$_POST['payment_fee'];
$payment_gross	 = 	$_POST['payment_gross'];
$payment_status	 = 	$_POST['payment_status'];
$payment_type	 = 	$_POST['payment_type'];
$protection_eligibility	 = 	$_POST['protection_eligibility'];
$quantity	 = 	$_POST['quantity'];
$shipping	 = 	$_POST['shipping'];
$tax	 = 	$_POST['tax'];
$Other	 = 	$_POST['Other'];
$notify_version	 = 	$_POST['notify_version'];
$charset	 = 	$_POST['charset'];
$verify_sign	 = 	$_POST['verify_sign'];


$status2 = "status = ".$status2;
$status3_detalhe = "detalhe_status = ".$status3_detalhe;
$receiver_email='receiver_email'." = ".$receiver_email;
$receiver_id='receiver_id'." = ".$receiver_id;
$residence_country='residence_country'." = ".$residence_country;
$Information='Information'." = ".$Information;
$test_ipn='test_ipn'." = ".$test_ipn;
$transaction_subject='transaction_subject'." = ".$transaction_subject;
$txn_id='txn_id'." = ".$txn_id;
$txn_type='txn_type'." = ".$txn_type;
$Information='Information'." = ".$Information;
$payer_email='payer_email'." = ".$payer_email;
$payer_id='payer_id'." = ".$payer_id;
$payer_status='payer_status'." = ".$payer_status;
$first_name='first_name'." = ".$first_name;
$last_name='last_name'." = ".$last_name;
$address_city='address_city'." = ".$address_city;
$address_country='address_country'." = ".$address_country;
$address_state='address_state'." = ".$address_state;
$address_status='address_status'." = ".$address_status;
$address_country_code='address_country_code'." = ".$address_country_code;
$address_name='address_name'." = ".$address_name;
$address_street='address_street'." = ".$address_street;
$address_zip='address_zip'." = ".$address_zip;
$Information='Information'." = ".$Information;
$custom='custom'." = ".$custom;
$handling_amount='handling_amount'." = ".$handling_amount;
$item_name='item_name'." = ".$item_name;
$item_number='item_number'." = ".$item_number;
$mc_currency='mc_currency'." = ".$mc_currency;
$mc_fee='mc_fee'." = ".$mc_fee;
$mc_gross='mc_gross'." = ".$mc_gross;
$payment_date='payment_date'." = ".$payment_date;
$payment_fee='payment_fee'." = ".$payment_fee;
$payment_gross='payment_gross'." = ".$payment_gross;
$payment_status='payment_status'." = ".$payment_status;
$payment_type='payment_type'." = ".$payment_type;
$protection_eligibility='protection_eligibility'." = ".$protection_eligibility;
$quantity='quantity'." = ".$quantity;
$shipping='shipping'." = ".$shipping;
$tax='tax'." = ".$tax;
$Other='Other'." = ".$Other;
$notify_version='notify_version'." = ".$notify_version;
$charset='charset'." = ".$charset;
$verify_sign='verify_sign'." = ".$verify_sign;



// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo é aberto para ser escrito
$fp = fopen("./logs_pgto/$id_bol.txt", "a");
$texto = $status2."\n".$status3_detalhe."\n".$receiver_email."\n".$receiver_id."\n".$residence_country."\n".$Information."\n".$test_ipn."\n".$transaction_subject."\n".$txn_id."\n".$txn_type."\n".$Information."\n".$payer_email."\n".$payer_id."\n".$payer_status."\n".$first_name."\n".$last_name."\n".$address_city."\n".$address_country."\n".$address_state."\n".$address_status."\n".$address_country_code."\n".$address_name."\n".$address_street."\n".$address_zip."\n".$Information."\n".$custom."\n".$handling_amount."\n".$item_name."\n".$item_number."\n".$mc_currency."\n".$mc_fee."\n".$mc_gross."\n".$payment_date."\n".$payment_fee."\n".$payment_gross."\n".$payment_status."\n".$payment_type."\n".$protection_eligibility."\n".$quantity."\n".$shipping."\n".$tax."\n".$Other."\n".$notify_version."\n".$charset."\n".$verify_sign." \n\n\n";
//$texto = $status." *** ".$data_comp." *** ".$email_comp."   \n";
//$texto = "teste de retorno";
$escreve = fwrite($fp, $texto);
// Fecha o arquivo
fclose($fp);


$status2 = "status = ".$status2;
$status3_detalhe = "detalhe_status = ".$status3_detalhe;
$receiver_email	 = 	$_POST['receiver_email'];
$receiver_id	 = 	$_POST['receiver_id'];
$residence_country	 = 	$_POST['residence_country'];
$Information	 = 	$_POST['Information'];
$test_ipn	 = 	$_POST['test_ipn'];
$transaction_subject	 = 	$_POST['transaction_subject'];
$txn_id	 = 	$_POST['txn_id'];
$txn_type	 = 	$_POST['txn_type'];
$Information	 = 	$_POST['Information'];
$payer_email	 = 	$_POST['payer_email'];
$payer_id	 = 	$_POST['payer_id'];
$payer_status	 = 	$_POST['payer_status'];
$first_name	 = 	$_POST['first_name'];
$last_name	 = 	$_POST['last_name'];
$address_city	 = 	$_POST['address_city'];
$address_country	 = 	$_POST['address_country'];
$address_state	 = 	$_POST['address_state'];
$address_status	 = 	$_POST['address_status'];
$address_country_code	 = 	$_POST['address_country_code'];
$address_name	 = 	$_POST['address_name'];
$address_street	 = 	$_POST['address_street'];
$address_zip	 = 	$_POST['address_zip'];
$Information	 = 	$_POST['Information'];
$custom	 = 	$_POST['custom'];
$handling_amount	 = 	$_POST['handling_amount'];
$item_name	 = 	$_POST['item_name'];
$item_number	 = 	$_POST['item_number'];
$mc_currency	 = 	$_POST['mc_currency'];
$mc_fee	 = 	$_POST['mc_fee'];
$mc_gross	 = 	$_POST['mc_gross'];
$payment_date	 = 	$_POST['payment_date'];
$payment_fee	 = 	$_POST['payment_fee'];
$payment_gross	 = 	$_POST['payment_gross'];
$payment_status	 = 	$_POST['payment_status'];
$payment_type	 = 	$_POST['payment_type'];
$protection_eligibility	 = 	$_POST['protection_eligibility'];
$quantity	 = 	$_POST['quantity'];
$shipping	 = 	$_POST['shipping'];
$tax	 = 	$_POST['tax'];
$Other	 = 	$_POST['Other'];
$notify_version	 = 	$_POST['notify_version'];
$charset	 = 	$_POST['charset'];
$verify_sign	 = 	$_POST['verify_sign'];



include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL

echo $payment_status."1";
if($payer_status!=''){
if($payment_status == 'Completed'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'PG',
`forma_pgto` = 'PayPal',
`data_pagto` = '$payment_date',
`status_pagto_online` = '$payment_status'
 WHERE `id` = $id_bol";	
}
if($payment_status == 'Pending'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'PE',
`forma_pgto` = 'PayPal',
`data_pagto` = '$payment_date',
`status_pagto_online` = '$payment_status'
 WHERE `id` = $id_bol";	
}
if($payment_status == 'Refunded'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'NP',
`forma_pgto` = 'PayPal',
`data_pagto` = '$payment_date',
`status_pagto_online` = '$payment_status'
 WHERE `id` = $id_bol";	
}
}
else{
$sql88="UPDATE `tb_boleto` SET `situacao` = 'AG',
`forma_pgto` = 'PayPal',
`data_pagto` = '$payment_date',
`status_pagto_online` = '$payment_status'
 WHERE `id` = $id_bol";	
}
$res88 = mysqlexecuta($id,$sql88);
echo $sql88;
?>