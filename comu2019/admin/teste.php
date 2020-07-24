<h1 class="ls-title-intro ls-ico-pencil2">Relat&oacute;rio Financeiro</h1>

<?php

require_once ('../mercado_pago/lib/mercadopago.php');

$mp = new MP ("1470310757436723", "2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS");

$balance = $mp->get ("/users/139306059/mercadopago_account/balance");

echo "Valor em Conta: R$ ".$balance['response']['total_amount']."<br />";
echo "Dispon&iacute;vel para Saque: R$ ".$balance['response']['available_balance']."<br />";
echo "Indispon&iacute;vel para Saque: R$ ".$balance['response']['unavailable_balance']."<br />";


echo "<br /><br />";


        // Sets the filters you want
         $filters = array(
            "site_id" => "MLB", // Argentina: MLA; Brasil: MLB
            "external_reference" => "988"
        );

        // Search payment data according to filters
        $searchResult = $mp->search_payment($filters);
echo var_dump($searchResult);
        // Show payment information
            foreach ($searchResult["response"]["results"] as $payment) {
            echo "teste";
                echo $payment["collection"]["id"];
                echo $payment["collection"]["site_id"];
                echo $payment["collection"]["date_created"];
                echo $payment["collection"]["operation_type"];
                echo $payment["collection"]["external_reference"];
            }
            ?>
        </table>
    </body>
</html>

