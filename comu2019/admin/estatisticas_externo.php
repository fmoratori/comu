<!DOCTYPE html>

<html class="<? echo $row_evento['cor']; ?>">

  <head>

    <title>FMSYS</title>

    <meta charset="UTF-8">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="Insira aqui a descrição da página.">

    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">

    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">

    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">

  </head>

  <body>
<h1 class="ls-title-intro ls-ico-user">Estat&iacute;sticas Gerais</h1>





<div class="ls-box">

  <h5 class="ls-title-3">N&uacute;mero Gerais</h5>

<?

include "mysqlconecta.php";

include "mysqlexecuta.php";
	$count = mysql_query("SELECT COUNT(*) FROM `tb_usuario`");

	$inscritos =  mysql_result($count, 0);

	$count2 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos`");

	$trabalhos =  mysql_result($count2, 0);

?>

<table class="ls-table ls-table-striped">

  <tbody>

    <tr>

      <td>Inscritos</td>

      <td class="hidden-xs"><? echo $inscritos ?></td>

    </tr>

    <tr>

      <td>Trabalhos</td>

      <td class="hidden-xs"><? echo $trabalhos; ?></td>

    </tr>

  </tbody>

</table>

</div>


<div class="ls-box">

  <h5 class="ls-title-3">Inscritos Por Atividade</h5>

<table class="ls-table">

  <tbody>
  <tr>
  <th colspan="2">Atividade</th>
  <th>Inscritos</th>
  <th>Local</th>
  <th>Total de Vagas</th>
  <th>Porcentagem Ocupação</th>

<?

	$sql115 = "SELECT * FROM tb_atividades WHERE exibe='S'";

	$res115 = mysqlexecuta($id,$sql115);

	while($row115 = mysql_fetch_array($res115)){

	$f = $row115['id'];

	$count6 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs = $f OR inscricao_obs2 = $f OR inscricao_obs3 = $f");

	$socios2 =  mysql_result($count6, 0);

	$porcento =($socios2*100)/$row115['capacidade'];

	if($porcento<=60){

		$cor = "bgcolor='#00FF00'";

		}

	if($porcento>=60){

		$cor = "bgcolor='#FFFF00'";

		}

	if($porcento>=90){

		$cor = "bgcolor='#FF0000'";

		}



	echo "<tr>

			<td colspan='2'>".$row115['grupo']."   ".utf8_encode($row115['nome'])."</td>

			<td>".$socios2."</td>

			<td>".utf8_encode($row115['sala'])."</td>

			<td>".$row115['capacidade']."</td>

			<td $cor>".number_format($porcento, 2, '.', '')."%</td>

		</tr>";

	}



?>

  </tbody>

</table>

</div>


<div class="ls-box">

  <h5 class="ls-title-3">Pagamentos</h5>

<table class="ls-table ls-table-striped">

  <tbody>



<?

	$count5 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE id IN (SELECT user_id FROM `tb_boleto`)");

	$status4 =  mysql_result($count5, 0);

	$total_bol = $status4;

	$count5 = mysql_query("SELECT COUNT(*) FROM tb_usuario WHERE id IN (SELECT user_id FROM `tb_boleto` WHERE situacao = 'NP' OR situacao = 'PE')");

	$status4 =  mysql_result($count5, 0);

	$count5b = mysql_query("SELECT SUM(valor) FROM `tb_boleto` WHERE situacao = 'NP' OR situacao = 'PE'");

	$status4b =  mysql_result($count5b, 0);

	$porc_pg_np = 	$porc = number_format(($status4/$total_bol)*100, 2, ',', ' ');	

	echo "<tr><td colspan='2'>".utf8_encode('<b>TOTAL N&Atilde;O PAGO</b>')."</td><td><b>".$status4."</b></td>"."<td>".$porc_pg_np."%</td></tr>";		

	

    $count5 = mysql_query("SELECT COUNT(*) FROM tb_usuario WHERE id IN (SELECT user_id FROM `tb_boleto` WHERE situacao = 'PG')");

	$status4 =  mysql_result($count5, 0);

	$count5b = mysql_query("SELECT SUM(valor) FROM `tb_boleto` WHERE situacao = 'PG'");

	$status4b =  mysql_result($count5b, 0);

	$total_pg=$status4;

	$porc_pg_np = 	$porc = number_format(($status4/$total_bol)*100, 2, ',', ' ');	

	echo "<tr><td colspan='2'>".utf8_encode('<b>TOTAL PAGO </b>')."</td><td><b>".$status4."</b></td>"."<td>".$porc_pg_np."%</td></tr>";		

	

    $count5 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE situacao = 'IS'");

	$status4 =  mysql_result($count5, 0);

	$count5b = mysql_query("SELECT SUM(valor) FROM `tb_boleto` WHERE situacao = 'IS'");

	$status4b =  mysql_result($count5b, 0);	

	$porc_pg_np = 	$porc = number_format(($status4/$total_bol)*100, 2, ',', ' ');	

	echo "<tr><td colspan='2'>".utf8_encode('<b>ISENTO</b>')."</td><td><b>".$status4."</b></td>"."<td>".$porc."%</td></tr>";



?>

  </tbody>

</table>

</div>



<div class="ls-box">

  <h5 class="ls-title-3">Inscritos Por Categoria</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql119 = "SELECT * FROM tb_categoria";

	$res119 = mysqlexecuta($id,$sql119);

	while($row119 = mysql_fetch_array($res119)){

	$cat=$row119['id'];

	$count7 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE categoria = $cat");

	$status7 =  mysql_result($count7, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row119['nome'])."</td><td>".$status7."</td>"."</tr>";

	}



?>

  </tbody>

</table>

</div>







<div class="ls-box">

  <h5 class="ls-title-3">Inscritos Por Categoria - PAGOS</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql119 = "SELECT * FROM tb_categoria";

	$res119 = mysqlexecuta($id,$sql119);

	while($row119 = mysql_fetch_array($res119)){

	$cat=$row119['id'];

	$count7 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE categoria = $cat AND `id` IN (SELECT `user_id` FROM tb_boleto WHERE `situacao`='PG' OR `situacao`='IS')");

	$status7 =  mysql_result($count7, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row119['nome'])."</td><td>".$status7."</td>"."</tr>";

	}



?>

  </tbody>

</table>

</div>









<div class="ls-box">

  <h5 class="ls-title-3">Inscritos Por Estado</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql101 = "SELECT DISTINCT estado,COUNT(*) AS quantidade FROM tb_usuario GROUP BY estado ORDER BY quantidade DESC";

	$res101 = mysqlexecuta($id,$sql101);

	while($row101 = mysql_fetch_array($res101)){

    	echo "<tr><td colspan='2'>".$row101['estado']."</td><td>".$row101['quantidade']."</td>"."</tr>";        

    }



?>

  </tbody>

</table>

</div>







<div class="ls-box">

  <h5 class="ls-title-3">Inscritos Por Estado - PAGOS</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql101 = "SELECT DISTINCT estado,COUNT(*) AS quantidade FROM tb_usuario WHERE `id` IN (SELECT `user_id` FROM tb_boleto WHERE `situacao`='PG' OR `situacao`='IS') GROUP BY estado ORDER BY quantidade DESC";

	$res101 = mysqlexecuta($id,$sql101);

	while($row101 = mysql_fetch_array($res101)){

    	echo "<tr><td colspan='2'>".$row101['estado']."</td><td>".$row101['quantidade']."</td>"."</tr>";        

    }



?>

  </tbody>

</table>

</div>

















<div class="ls-box">

  <h5 class="ls-title-3">Inscritos Por Sociedade</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql10 = "SELECT * FROM tb_sociedades";

	$res10 = mysqlexecuta($id,$sql10);

	while($row10 = mysql_fetch_array($res10)){

	$z=$row10['id'];

	$count3 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE  sociedade_filiada = $z");

	$area =  mysql_result($count3, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row10['nome'])."</td><td>".$area."</td>"."</tr>";

	}

?>

  </tbody>

</table>

</div>







<div class="ls-box">

  <h5 class="ls-title-3">Inscritos Por Sociedade - PAGOS</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql10 = "SELECT * FROM tb_sociedades";

	$res10 = mysqlexecuta($id,$sql10);

	while($row10 = mysql_fetch_array($res10)){

	$z=$row10['id'];

	$count3 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE  sociedade_filiada = $z AND `id` IN (SELECT `user_id` FROM tb_boleto WHERE `situacao`='PG' OR `situacao`='IS')");

	$area =  mysql_result($count3, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row10['nome'])."</td><td>".$area."</td>"."</tr>";

	}

?>

  </tbody>

</table>

</div>







<div class="ls-box">

  <h5 class="ls-title-3">Trabalhos Por Status - EXCETO TARDIO</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$r=1;

	while($r<9){

	$sql11 = "SELECT * FROM tb_status WHERE id = '$r'";

	$res11 = mysqlexecuta($id,$sql11);

	$row11 = mysql_fetch_array($res11);

	$count4 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE status = $r AND `premio`!=6");

	$status =  mysql_result($count4, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row11['status'])."</td><td>".$status."</td>"."</tr>";

	$r++;

	}



?>

  </tbody>

</table>

</div>



<div class="ls-box">

  <h5 class="ls-title-3">Trabalhos Por &Aacute;rea - EXCETO TARDIO</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql10 = "SELECT * FROM tb_areas";

	$res10 = mysqlexecuta($id,$sql10);

	while($row10 = mysql_fetch_array($res10)){

	$z=$row10['id'];

	$count3 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE area_id = $z AND `premio`!=6");

	$area =  mysql_result($count3, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row10['nome_area'])."</td><td>".$area."</td>"."</tr>";

	}

?>

  </tbody>

</table>

</div>





<div class="ls-box">

  <h5 class="ls-title-3">Trabalhos Por Estado - EXCETO TARDIO</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql101 = "SELECT DISTINCT estado,COUNT(*) AS quantidade FROM tb_usuario WHERE id IN (SELECT usuario_id FROM tb_trabalhos WHERE `premio`!=6) GROUP BY estado ORDER BY quantidade DESC";

	$res101 = mysqlexecuta($id,$sql101);

	while($row101 = mysql_fetch_array($res101)){

    	echo "<tr><td colspan='2'>".$row101['estado']."</td><td>".$row101['quantidade']."</td>"."</tr>";        

    }




?>

  </tbody>

</table>

</div>























<div class="ls-box">

  <h5 class="ls-title-3">Trabalhos Por Status - TARDIO</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$r=1;

	while($r<9){

	$sql11 = "SELECT * FROM tb_status WHERE id = '$r'";

	$res11 = mysqlexecuta($id,$sql11);

	$row11 = mysql_fetch_array($res11);

	$count4 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE status = $r AND `premio`=6");

	$status =  mysql_result($count4, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row11['status'])."</td><td>".$status."</td>"."</tr>";

	$r++;

	}



?>

  </tbody>

</table>

</div>



<div class="ls-box">

  <h5 class="ls-title-3">Trabalhos Por &Aacute;rea - TARDIO</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql10 = "SELECT * FROM tb_areas";

	$res10 = mysqlexecuta($id,$sql10);

	while($row10 = mysql_fetch_array($res10)){

	$z=$row10['id'];

	$count3 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE area_id = $z AND `premio`=6");

	$area =  mysql_result($count3, 0);

	echo "<tr><td colspan='2'>".utf8_encode($row10['nome_area'])."</td><td>".$area."</td>"."</tr>";

	}

?>

  </tbody>

</table>

</div>





<div class="ls-box">

  <h5 class="ls-title-3">Trabalhos Por Estado - TARDIO</h5>

<table class="ls-table ls-table-striped">

  <tbody>

<?

	$sql101 = "SELECT DISTINCT estado,COUNT(*) AS quantidade FROM tb_usuario WHERE id IN (SELECT usuario_id FROM tb_trabalhos WHERE `premio`=6) GROUP BY estado ORDER BY quantidade DESC";

	$res101 = mysqlexecuta($id,$sql101);

	while($row101 = mysql_fetch_array($res101)){

    	echo "<tr><td colspan='2'>".$row101['estado']."</td><td>".$row101['quantidade']."</td>"."</tr>";        

    }



?>

  </tbody>

</table>

</div>











</div>