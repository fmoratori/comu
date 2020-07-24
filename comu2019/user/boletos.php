<?
$sql_boleto = "SELECT * FROM tb_boleto WHERE user_id = $id_usuario";
$res_boleto = mysqlexecuta($id,$sql_boleto);

if($idioma==1 || $idioma == null || $idioma == 2 || $idioma == 3){
?>
<h1 class="ls-title-intro ls-ico-cart">Boletos</h1>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Categoria</th>
      <th class="hidden-xs">Valor</th>
      <th>Vencimento</th>
      <th class="hidden-xs">Situação do Pagamento</th>
      <th class="hidden-xs">Opções</th>
    </tr>
  </thead>
  <tbody>
<?

while($row_boleto = mysql_fetch_array($res_boleto)){
$valor2 = $row_boleto['valor'];
$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';
$data['email'] = 'contato@comufmusp.com.br';
$data['token'] = '7f87977d-e96d-4ce5-aa3a-266e5a9ad7e68c163e60492387f6308b98cb3da3e270e624-0bc7-4080-9a62-a7211ff9f0ae';
$data['receiverEmail'] = 'contato@comufmusp.com.br';

$id_bol = $row_boleto['id'];
$data['currency'] = 'BRL';
$data['itemId1'] = $row_boleto['categoria'];
$data['itemDescription1'] = $row_boleto['referente'];
$data['itemAmount1'] = $valor2;
$data['itemQuantity1'] = '1';
$data['reference'] = $row_boleto['id'];
$data['senderName'] = $row_usuario['nome'];
$data['senderEmail'] = $row_usuario['email'];
$data['shippingAddressRequired'] = 'false';
$data['excludePaymentMethodGroup'] = 'DEPOSIT,EFT';
$data['redirectURL'] = $link_usuario.'principal.php?pg=boletos.php';
$data['notificationURL'] = $link_usuario.'principal.php?pg=get_boletos.php';
$vencimento3 = strtotime($row_boleto['vencimento']);
$hoje= strtotime(date("Y-m-d"));
$data = http_build_query($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);
if($xml == 'Unauthorized'){
    //Insira seu código de prevenção a erros
    header('Location: erro.php?tipo=autenticacao&xml='.$xml);
    exit;//Mantenha essa linha
}
curl_close($curl);
$xml= simplexml_load_string($xml);
if(count($xml -> error) > 0){
    //Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
   // header('Location: erro.php?tipo=dadosInvalidos&xml='.$xml);
    exit();
}
$ativ = $row_boleto['categoria'];
$meu_id = $row_boleto['id'];
$count2 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE categoria=$ativ AND situacao!='cancelada' AND `id`<'$meu_id'");
$inscritos2 =  mysql_result($count2, 0);

$sql_ativ = "SELECT * FROM tb_atividades WHERE id = $ativ";
$res_ativ = mysqlexecuta($id,$sql_ativ);
$row_ativ = mysql_fetch_array($res_ativ);
$lista_espera=0;
if($inscritos2>$row_ativ['capacidade']){
    $diferenca = $inscritos2 - $row_ativ['capacidade'];
    $lista_espera=1;
}


//header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);
$link = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code;
//header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code); //sandbox
//$link = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code; //sandbox
?>
    <tr>
      <td><? echo $row_boleto['referente']; ?></td>
      <td class="hidden-xs"><? echo "R$ ".$valor2; ?></td>
      <td><? echo date('d/m/Y', strtotime($row_boleto['vencimento'])); ?></td>
<?
if($row_boleto['situacao']=='PG'){
?>
      <td class="hidden-xs"><? echo "Pago" ?></td>
<?
}
if($row_boleto['situacao']=='NP'){
?>
      <td class="hidden-xs"><? echo "Não Pago" ?></td>
<?
}
if($row_boleto['situacao']=='IS'){
?>
      <td class="hidden-xs"><? echo "Isento" ?></td>
<?
}
if($row_boleto['situacao']=='PE'){
?>
      <td class="hidden-xs"><? echo "Aguardando Pagamento" ?></td>
<?
}
if($row_boleto['situacao']=='cancelada'){
?>
      <td class="hidden-xs"><? echo "CANCELADO" ?></td>
<?
}
if($row_boleto['situacao']!='PG' && $row_boleto['situacao']!='cancelada'){

if($lista_espera>0){
    echo "<td><b>BOLETO NÃO DISPONÍVEL - Lista de Espera  Posição: $diferenca</b><br /><br /><a href='./principal.php?pg=remover_atividade.php&id_ativ=$ativ&id_bol=$meu_id'>DESISTIR DA ATIVIDADE?</td>";
}
else{
if($vencimento3<$hoje) { 
   echo "<td><b>BOLETO VENCIDO</b></td>"; 
}
else{
?>
      <!--td><a href='<? echo $link; ?>'target='_blank'> <b>Clique Aqui Para Realizar o Pagamento</b></a-->
      <td><a href='<? //echo $link; ?>'target='_blank'> <b>PRAZO PARA PAGAMENTO ENCERRADO - PROCURE A SECRETARIA DO COMU</b></a>

</td>
<?
}
}
}
else{
?>
<td></td>
<?
}
?>
    </tr>
<?        
$data = '';
    }

?>  

  </tbody>

</table>
<?
}
?>