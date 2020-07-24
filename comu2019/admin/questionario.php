<h1 class="ls-title-intro ls-ico-user">Estat&iacute;sticas Enquete</h1>
<div class="ls-box">
  <h5 class="ls-title-3">Respostas Questionários</h5>
<?
	$count = mysql_query("SELECT COUNT(*) FROM `tb_usuario`");
	$inscritos =  mysql_result($count, 0);
	$count2 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos`");
	$trabalhos =  mysql_result($count2, 0);
?>
<table class="ls-table ls-table-striped">
  <tbody>
<?

	$count5 = mysql_query("SELECT COUNT(*) FROM `tb_pesquisa`");
	$status4 =  mysql_result($count5, 0);
	$total_respostas = $status4;
    echo "<tr><td>Pergunta</td><td>BOM</td><td>REGULAR</td><td>RUIM</td></tr>";
    
	$count6 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_1` LIKE 'Bom'");
	$status5 =  mysql_result($count6, 0);
    $status5=(100/$total_respostas)*$status5;
	$count7 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_1` LIKE 'Regular'");
	$status6 =  mysql_result($count7, 0);
    $status6=(100/$total_respostas)*$status6;
	$count8 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_1` LIKE 'Ruim'");
	$status7 =  mysql_result($count8, 0);
    $status7=(100/$total_respostas)*$status7;

	echo "<tr><td>".'<b>Como você considera o espaço físico onde se realizou a XII Reunião Regional da FeSBE?</b>'."</td><td>".number_format($status5,2)."%</td>"."<td>".number_format($status6,2)."%</td><td>".number_format($status7,2)."%</td></tr>";		


	$count6 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_2` LIKE 'Bom'");
	$status5 =  mysql_result($count6, 0);
    $status5=(100/$total_respostas)*$status5;
	$count7 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_2` LIKE 'Regular'");
	$status6 =  mysql_result($count7, 0);
    $status6=(100/$total_respostas)*$status6;
	$count8 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_2` LIKE 'Ruim'");
	$status7 =  mysql_result($count8, 0);
    $status7=(100/$total_respostas)*$status7;

	echo "<tr><td>".'<b>Como foi o atendimento que você recebeu por parte da comissão organizadora da XII Reunião Regional da FeSBE?</b>'."</td><td>".number_format($status5,2)."%</td>"."<td>".number_format($status6,2)."%</td><td>".number_format($status7,2)."%</td></tr>";		

	$count6 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_3` LIKE 'Bom'");
	$status5 =  mysql_result($count6, 0);
    $status5=(100/$total_respostas)*$status5;
	$count7 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_3` LIKE 'Regular'");
	$status6 =  mysql_result($count7, 0);
    $status6=(100/$total_respostas)*$status6;
	$count8 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_3` LIKE 'Ruim'");
	$status7 =  mysql_result($count8, 0);
    $status7=(100/$total_respostas)*$status7;
    
	echo "<tr><td>".'<b>Como você classifica o coffe-break oferecido durante a XII Reunião Regional da FeSBE?</b>'."</td><td>".number_format($status5,2)."%</td>"."<td>".number_format($status6,2)."%</td><td>".number_format($status7,2)."%</td></tr>";		

	$count6 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_4` LIKE 'Bom'");
	$status5 =  mysql_result($count6, 0);
    $status5=(100/$total_respostas)*$status5;
	$count7 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_4` LIKE 'Regular'");
	$status6 =  mysql_result($count7, 0);
    $status6=(100/$total_respostas)*$status6;
	$count8 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_4` LIKE 'Ruim'");
	$status7 =  mysql_result($count8, 0);
    $status8=(100/$total_respostas)*$status8;

	echo "<tr><td>".'<b>Na sua opinião a programação científica da XII Reunião Regional da FeSBE foi:</b>'."</td><td>".number_format($status5,2)."%</td>"."<td>".number_format($status6,2)."%</td><td>".number_format($status7,2)."%</td></tr>";		
	
	$count6 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_5` LIKE 'Bom'");
	$status5 =  mysql_result($count6, 0);
    $status5=(100/$total_respostas)*$status5;
	$count7 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_5` LIKE 'Regular'");
	$status6 =  mysql_result($count7, 0);
    $status6=(100/$total_respostas)*$status6;
	$count8 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_5` LIKE 'Ruim'");
	$status7 =  mysql_result($count8, 0);
    $status7=(100/$total_respostas)*$status7;

	echo "<tr><td>".'<b>Em relação a distribuição das atividades no evento (cursos, conferências, simpósios, módulos temáticos...) você considerou:</b>'."</td><td>".number_format($status5,2)."%</td>"."<td>".number_format($status6,2)."%</td><td>".number_format($status7,2)."%</td></tr>";		

	$count6 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_6` LIKE 'Bom'");
	$status5 =  mysql_result($count6, 0);
    $status5=(100/$total_respostas)*$status5;
	$count7 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_6` LIKE 'Regular'");
	$status6 =  mysql_result($count7, 0);
    $status6=(100/$total_respostas)*$status6;
	$count8 = mysql_query("SELECT COUNT(*) FROM tb_pesquisa WHERE `resposta_6` LIKE 'Ruim'");
	$status7 =  mysql_result($count8, 0);
    $status7=(100/$total_respostas)*$status7;

	echo "<tr><td>".'<b>O processo de apresentação e avaliação de painéis foi:</b>'."</td><td>".number_format($status5,2)."%</td>"."<td>".number_format($status6,2)."%</td><td>".number_format($status7,2)."%</td></tr>";		
	echo "<tr><td>".'<b>Total de Respostas:</b>'."</td><td colspan='3'><center><b>".$total_respostas."</b></center></td></tr>";		
    echo "<tr><td colspan='4'></td></tr>";
    echo "<tr><td colspan='4'></td></tr>";
    echo "<tr><td colspan='4'><b>Caso tenha algum comentário sobre qualquer assunto referente a XII Reunião Regional da FeSBE, que não tenha sido abordado nas questões acima, escreva abaixo:</b></td></tr>";

	$sql115 = "SELECT * FROM tb_pesquisa";
	$res115 = mysqlexecuta($id,$sql115);
	while($row115 = mysql_fetch_array($res115)){

	   if($row115['resposta_7']!=''){
    	   echo "<tr><td colspan='4'>".utf8_encode($row115['resposta_7'])."</td></tr>";
       }
       }

?>
</table>

</div>


