<?
$sql_usp = "SELECT * FROM tb_usuario WHERE inscricao_obs!='' AND inscricao_obs!='101'";
$res_usp = mysqlexecuta($id,$sql_usp);

while($row_usp = mysql_fetch_array($res_usp)){
$usp='';
$cpf2='';
$id_usuario='';
$ativ1 = '';
$nome_atividade = '';
$vencimento = '';
$valor2 =0;

$ativ1 = $row_usp['inscricao_obs'];    
$id_usuario = $row_usp['id'];
echo $id_usuario."<br /><br />";
    $count_boleto122 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE `user_id`=$id_usuario AND `categoria`=$ativ1");
    $inscritos_boleto122 =  mysql_result($count_boleto122, 0);
    //echo $row_usp['nome']." - ".$inscritos_boleto122."<br />";





if($inscritos_boleto122<=0){

$usp=$row_usp['usp'];
$cpf2 = $row_usp['cpf'];
$desconto=1;
if($usp!='' || $cpf2!=''){
        $sql_usp = "SELECT * FROM tb_usp WHERE `usp` = '$usp' OR `usp` = '$cpf2'";
        $res_usp = mysqlexecuta($id,$sql_usp);

while($row_usp = mysql_fetch_array($res_usp)){
    if($row_usp['usp']==$usp){
        $desconto = 2;
    }
    if($row_usp['usp']==$cpf2){
        $desconto = 1.11;
    }
    
    }
}

        $sql_ativ = "SELECT * FROM tb_atividades WHERE `id` = '$ativ1'";
        $res_ativ = mysqlexecuta($id,$sql_ativ);
        $row_ativ = mysql_fetch_array($res_ativ);

$nome_atividade = $row_ativ['nome'];
$valor2 = $row_ativ['valor'];
$valor2 = $valor2/$desconto;
$valor2 = number_format($valor2, 2, '.', '');

 
//    $valor = $row_atividades_inscrito50['valor'];
$vencimento = date('Y-m-d', strtotime('+1 days'));
echo $id_usuario." - ".$ativ1." - ".$nome_atividade." - ".$vencimento." - ".$valor2."<br /><br />";

//    $nome_atividade = $row_atividades_inscrito50['nome'];
    $sql_insere_boleto_inscrito = "INSERT INTO `tb_boleto` SET `user_id`='$id_usuario', `categoria`='$ativ1', `referente`='$nome_atividade', `vencimento`='$vencimento', `valor`='$valor2', `situacao`='NP'";
    $res_insere_boleto_inscrito = mysqlexecuta($id,$sql_insere_boleto_inscrito);
echo $sql_insere_boleto_inscrito."<br /><br />";
}





            
    }
    
?>