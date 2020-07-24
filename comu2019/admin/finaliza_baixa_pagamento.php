<?
$ids_boletos = $_POST['ids_boletos'];
$ids_boletos = str_replace(" ","",$ids_boletos);
$ids = explode(",", $ids_boletos);
$total = count($ids);
$x=0;
while($x<$total){
    $id_boleto = $ids[$x];
    $sql_atualiza_pgto="UPDATE `tb_boleto` SET `situacao`='PG' WHERE id = $id_boleto";
   // echo $sql_atualiza_pgto.'teste;';
    $res_atualiza_pgto = mysqlexecuta($id,$sql_atualiza_pgto);
$x++;
$baixados = $id_boleto.','.$baixados;
}
$baixados = $baixados.'0';
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=baixa_pagamento.php&baixados=<? echo $baixados; ?>">