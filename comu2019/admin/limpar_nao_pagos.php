<?
$hoje= strtotime(date("2019-09-06"));
$sql_ativ12 = "SELECT * FROM tb_boleto WHERE `situacao` != 'PG' AND (lista = '' or lista is null) AND categoria>140 AND categoria<168";
$res_ativ12 = mysqlexecuta($id,$sql_ativ12);

while($row_ativ12 = mysql_fetch_array($res_ativ12)){
    $vencimento=strtotime($row_ativ12['vencimento']);
    if($hoje>$vencimento){
        $id_boleto = $row_ativ12['id'];
        $usuario = $row_ativ12['user_id'];
        $ativ = $row_ativ12['categoria'];
    
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs`='' WHERE `id`=$usuario AND `inscricao_obs`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs2`='' WHERE `id`=$usuario AND `inscricao_obs2`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs3`='' WHERE `id`=$usuario AND `inscricao_obs3`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $sql_ativ="UPDATE `tb_usuario` SET `inscricao_obs4`='' WHERE `id`=$usuario AND `inscricao_obs4`=$ativ";	
    $res_ativ = mysqlexecuta($id,$sql_ativ);
    $cat = $ativ.'00';
    $sql_ativ2="UPDATE `tb_boleto` SET `situacao`='cancelada', `categoria`='$cat' WHERE `user_id`=$usuario AND `categoria`=$ativ AND (lista = '' or lista is null)";	
    $res_ativ2 = mysqlexecuta($id,$sql_ativ2);
  
      echo $usuario." - ".$id_boleto." - ".$ativ."<br />"; 
            
           }
    else{
        echo $row_ativ['id']." - NÃO REMOVE<br />";
    }
}

?>