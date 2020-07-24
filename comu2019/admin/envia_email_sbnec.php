<?php
include "mysqlconecta.php";
include "mysqlexecuta.php";
	$sql222 = "SELECT * FROM tb_avaliador_sbnec ORDER BY nome ASC";
	$res222 = mysqlexecuta($id,$sql222);
?>
<table>
<tr>
<th>ID</th>
<th>Nome</th>
<th>E-mail</th>
<th>Senha</th>
</tr>
<?
while($row222 = mysql_fetch_array($res222)) {
?>
<tr>
<td><? echo $row222['id'] ?></td>
<td><a href="./envia_email2.php?id=<? echo $row222['id']; ?>" target="_blank"><? echo $row222['nome'] ?></a></td>
<td><? echo $row222['email'] ?></td>
<td><? echo $row222['senha'] ?></td>
</tr>    
<?
    }
    
    ?>
    
</table>
