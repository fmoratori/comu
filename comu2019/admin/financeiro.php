<h1 class="ls-title-intro ls-ico-chart-bar-up">Relat&oacute;rio Financeiro</h1>

<?php

require_once ('../mercado_pago/lib/mercadopago.php');

$mp = new MP ("1470310757436723", "2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS");

$balance = $mp->get ("/users/139306059/mercadopago_account/balance");

echo "Valor em Conta: R$ ".$balance['response']['total_amount']."<br />";
echo "Dispon&iacute;vel para Saque: R$ ".$balance['response']['available_balance']."<br />";
echo "Indispon&iacute;vel para Saque: R$ ".$balance['response']['unavailable_balance']."<br />";


echo "<br /><br />";





?>