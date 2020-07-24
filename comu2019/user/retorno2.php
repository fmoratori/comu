<?php
/**
 * MercadoPago SDK
 * Receive IPN
 * @date 2015/03/17
 * @author fvaccaro
 */
// Include Mercadopago library
include "mysqlconecta.php";
include "mysqlexecuta.php";
require_once "../mercado_pago/lib/mercadopago.php";
 
$mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');

//$params = ["access_token" => $mp->get_access_token()];

// Check mandatory parameters
if (!isset($_GET["id"], $_GET["topic"]) || !ctype_digit($_GET["id"])) {
	http_response_code(400);
	return;
}

// Get the payment reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com
if($_GET["topic"] == 'payment'){
	$payment_info = $mp->get_payment_info($_GET["id"]);
	//$merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"], $params, false);
    $merchant_order_info = $mp->get("/merchant_orders/".$payment_info["response"]["collection"]["merchant_order_id"]);

// Get the merchant_order reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com	
}else if($_GET["topic"] == 'merchant_order'){
	$merchant_order_info = $mp->get("/merchant_orders/" . $_GET["id"], $params, false);
}

//If the payment's transaction amount is equal (or bigger) than the merchant order's amount you can release your items 
if ($merchant_order_info["status"] == 200) {
	$transaction_amount_payments= 0;
	$transaction_amount_order = $merchant_order_info["response"]["total_amount"];
    $payments=$merchant_order_info["response"]["payments"];
    foreach ($payments as  $payment) {
	if($payment['status'] == 'approved'){
$id_bol = $payment_info["response"]["collection"]["order_id"];
$status = $payment_info["response"]["collection"]["status"];
$forma_pagamento = $payment_info["response"]["collection"]["payment_type"];
$id_pagamento = $payment_info["response"]["collection"]["id"];
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$sql88="UPDATE `tb_boleto` SET `situacao` = 'PG',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$hora',
`status_pagto_online` = '$status',
`observacao` = '$id_pagamento'
 WHERE `id` = $id_bol";	    	           
	    	$transaction_amount_payments += $payment['transaction_amount'];
	    }	
    }
    if($transaction_amount_payments >= $transaction_amount_order){
    	echo "release your items";
    }
    else{
        $id_bol = $payment_info["response"]["collection"]["order_id"];
$status = $payment_info["response"]["collection"]["status"];
$forma_pagamento = $payment_info["response"]["collection"]["payment_type"];
$id_pagamento = $payment_info["response"]["collection"]["id"];
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$sql88="UPDATE `tb_boleto` SET `situacao` = 'NP',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$hora',
`status_pagto_online` = '$status',
`observacao` = '$id_pagamento'
 WHERE `id` = $id_bol";	    
//        echo $status = $payment_info["response"]["collection"]["status"];
//        echo $status = $payment_info["response"]["collection"]["site_id"];
//        echo $status = $payment_info["response"]["collection"]['payer']["email"];
        //echo $payment_info["response"]["collection"]["order_id"]."<br />";
//        print_r($payment_info["response"]);
	}

$res88 = mysqlexecuta($id,$sql88); 
$id_bol = $payment_info["response"]["collection"]["order_id"];
$fp = fopen("./logs_pgto/$id_bol.txt", "a");
$texto1 = "\n collection_ id_ = ".$payment_info["response"]["collection"]["id"]."\n collection_ site_id_ = ".$payment_info["response"]["collection"]["site_id"]."\n collection_ date_created_ = ".$payment_info["response"]["collection"]["date_created"]."\n collection_ date_approved_ = ".$payment_info["response"]["collection"]["date_approved"]."\n collection_ money_release_date_ = ".$payment_info["response"]["collection"]["money_release_date"]."\n collection_ last_modified_ = ".$payment_info["response"]["collection"]["last_modified"]."\n collection_ payer_ id_ = ".$payment_info["response"]["collection"]["payer"]["id"]."\n collection_ payer_ first_name_ = ".$payment_info["response"]["collection"]["payer"]["first_name"]."\n collection_ payer_ last_name_ = ".$payment_info["response"]["collection"]["payer"]["last_name"]."\n collection_ payer_ phone_ area_code_ = ".$payment_info["response"]["collection"]["payer"]["phone"]["area_code"]."\n collection_ payer_ phone_ number_ = ".$payment_info["response"]["collection"]["payer"]["phone"]["number"]."\n collection_ payer_ phone_ extension_ = ".$payment_info["response"]["collection"]["payer"]["phone"]["extension"]."\n = ".$payment_info."\n collection_ payer_ identification_ type_ = ".$payment_info["response"]["collection"]["payer"]["identification"]["type"];
$texto2 ="\n collection_ payer_ identification_ number_ = ".$payment_info["response"]["collection"]["payer"]["identification"]["number"]."\n = ".$payment_info."\n collection_ payer_ email_ = ".$payment_info["response"]["collection"]["payer"]["email"]."\n collection_ payer_ nickname_ = ".$payment_info["response"]["collection"]["payer"]["nickname"]."\n = ".$payment_info."\n collection_ order_id_ = ".$payment_info["response"]["collection"]["order_id"]."\n collection_ external_reference_ = ".$payment_info["response"]["collection"]["external_reference"]."\n collection_ merchant_order_id_ = ".$payment_info["response"]["collection"]["merchant_order_id"]."\n collection_ reason_ = ".$payment_info["response"]["collection"]["reason"]."\n collection_ currency_id_ = ".$payment_info["response"]["collection"]["currency_id"];
$texto3 ="\n collection_ transaction_amount_ = ".$payment_info["response"]["collection"]["transaction_amount"]."\n collection_ net_received_amount_ = ".$payment_info["response"]["collection"]["net_received_amount"]."\n collection_ total_paid_amount_ = ". $payment_info["response"]["collection"]["total"]["paid_amount"]."\n collection_ shipping_cost_ = ".$payment_info["response"]["collection"]["shipping_cost"]."\n collection_ coupon_amount_ = ".$payment_info["response"]["collection"]["coupon_amount"]."\n collection_ coupon_fee_ = ".$payment_info["response"]["collection"]["coupon_fee"];
$texto4 ="\n collection_ finance_fee_ = ".$payment_info["response"]["collection"]["finance_fee"]."\n collection_ discount_fee_ = ".$payment_info["response"]["collection"]["discount_fee"]."\n collection_ coupon_id_ = ".$payment_info["response"]["collection"]["coupon_id"]."\n collection_ status_ = ".$payment_info["response"]["collection"]["status"]."\n collection_ status_detail_ = ".$payment_info["response"]["collection"]["status_detail"]."\n collection_ issuer_id_ = ".$payment_info["response"]["collection"]["issuer_id"];
$texto5 ="\n collection_installment_amount_ = ".$payment_info["response"]["collection"]["installment_amount"]."\n collection_ deferred_period_ = ".$payment_info["response"]["collection"]["deferred_period"]."\n collection_ payment_type_ = ".$payment_info["response"]["collection"]["payment_type"]."\n collection_ payment_method_id_ = ".$payment_info["response"]["collection"]["payment_method_id"]."\n collection_ marketplace_ = ".$payment_info["response"]["collection"]["marketplace"]."\n collection_ operation_type_ = ".$payment_info["response"]["collection"]["operation_type"];
$texto6 ="\n collection_ marketplace_fee_ = ".$payment_info["response"]["collection"]["marketplace_fee"]."\n collection_ deduction_schema_ = ".$payment_info["response"]["collection"]["deduction_schema"]."\n = "."\n collection_ refunds_ amount_refunded_ = ".$payment_info["response"]["collection"]["refunds"]["amount_refunded"]."\n collection_ refunds_ last_modified_by_admin_ = ".$payment_info["response"]["collection"]["refunds"]["last_modified_by_admin"]."\n collection_ refunds_ api_version_ = ".$payment_info["response"]["collection"]["refunds"]["api_version"];
$texto7 ="\n collection_ refunds_ concept_id_ = ".$payment_info["response"]["collection"]["refunds"]["concept_id"]."\n collection_ refunds_ concept_amount_ = ".$payment_info["response"]["collection"]["refunds"]["concept_amount"]."\n collection_ refunds_ internal_metadata_ = ".$payment_info["response"]["collection"]["refunds"]["internal_metadata"];
//$texto = $status." *** ".$data_comp." *** ".$email_comp."   \n";
//$texto = "teste de retorno";
$texto = $texto1.$texto2.$texto3.$texto4.$texto5.$texto6.$texto7;
$escreve = fwrite($fp, $texto);
// Fecha o arquivo
fclose($fp);
       

}
?>