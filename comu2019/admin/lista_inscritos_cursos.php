<?php

include "./mysqlconecta.php";
include "./mysqlexecuta.php";


//echo "<tr><th width='2cm'>Seq</th><th>ID</th><th>Nome</th><th>CPF</th><th>E-mail</th><th>Curso</th></tr>";
$sql_atividades = "SELECT * FROM tb_usuario WHERE id IN (SELECT user_id FROM tb_boleto WHERE situacao='PG' AND categoria<99)ORDER BY nome ASC";
$res_atividades = mysqlexecuta($id,$sql_atividades);
$x=1;
/**
while($row_atividades = mysql_fetch_array($res_atividades)){
$id_user = $row_atividades['id'];
echo "<tr><td>".$x."</td><td>".$row_atividades['id']."</td><td>".$row_atividades['nome']."</td><td>".$row_atividades['cpf2']."</td><td>".$row_atividades['email2']."</td><td>";
/**
    $sql_consulta_inscritos2 = "SELECT * FROM tb_boleto WHERE `categoria`>99 AND situacao='PG' AND user_id = $id_user ORDER BY categoria ASC";
    $res_consulta_inscritos2 = mysqlexecuta($id,$sql_consulta_inscritos2);
    while($row_consulta_inscritos2 = mysql_fetch_array($res_consulta_inscritos2)){
        echo $row_consulta_inscritos2['referente']."<br />";
    }
echo "</td></tr>";
$x++;    
    }
echo "</table>";


***/

$sql_atividades = "SELECT * FROM tb_atividades WHERE id>99 ORDER BY sessao ASC";
$res_atividades = mysqlexecuta($id,$sql_atividades);

while($row_atividades = mysql_fetch_array($res_atividades)){
$id_ativ = $row_atividades['id'];
echo "<table border='1'>";
echo "<tr><td colspan=12><center><b>".$row_atividades['nome']." - M&Oacute;DULO ".$row_atividades['sessao']."</b></center></td></tr>";
echo "<tr><th>Seq</th><th>Nome</th><th>E-mail</th><th>CPF</th><th>Vegano</th><th>Vegetariano</th><th>Lactose</th><th>Celíaco</th><th>Outros</th><th>QR CODE</th><th>Link</th></tr>";
$sql_atividades2 = "SELECT * FROM tb_usuario WHERE id IN (SELECT user_id FROM tb_boleto WHERE categoria = $id_ativ AND `situacao`='PG') ORDER BY nome ASC";
$res_atividades2 = mysqlexecuta($id,$sql_atividades2);
$x=1;
//echo "<table border='1'>";
while($row_atividades2 = mysql_fetch_array($res_atividades2)){
$user_id_bol = $row_atividades2['id'];
$sql_atividades3 = "SELECT * FROM tb_usuario WHERE id = $user_id_bol";
$res_atividades3 = mysqlexecuta($id,$sql_atividades3);
$row_atividades3 = mysql_fetch_array($res_atividades3);
$nome = $row_atividades3['nome'];
$us = $row_atividades3['id'];
$at = $row_atividades['id'];
echo "<tr><td>".$x."</td><td>".$nome."</td><td>".$row_atividades3['email']."</td><td>".$row_atividades3['cpf']."</td><td><center>".strtoupper($row_atividades3['vegano'])."</center></td><td><center>".strtoupper($row_atividades3['vegetariano'])."</center></td><td><center>".strtoupper($row_atividades3['lactose'])."</center></td><td><center>".strtoupper($row_atividades3['celiaco'])."</center></td><td><center>".strtoupper($row_atividades3['outros'])."</center></center></td><td><img src='https://chart.googleapis.com/chart?chs=100x100&border=0&cht=qr&chl=http://fmsys.com.br/fmsys/comu2019/admin/insere_presenca.php?us=$us&at=$at'></td>"."<td><a href='http://fmsys.com.br/fmsys/comu2019/admin/insere_presenca.php?us=$us&at=$at'>http://fmsys.com.br/fmsys/comu2019/admin/insere_presenca.php?us=$us&at=$at</a></td>"."</td></tr>";
$x++;
}

echo "<tr><td></td></tr>";
echo "</table><br /><br />";
echo "*****------*****";
}


?>
