<html>
<h1 class="ls-title-intro ls-ico-user">Gráficos</h1>

<?
	$count5 = mysql_query("SELECT COUNT(*) FROM tb_usuario WHERE id IN (SELECT user_id FROM `tb_boleto` WHERE situacao = 'NP' OR situacao = 'PE')");
	$status_nao_pagos =  mysql_result($count5, 0);

	$count5 = mysql_query("SELECT COUNT(*) FROM tb_usuario WHERE id IN (SELECT user_id FROM `tb_boleto` WHERE situacao = 'PG' OR situacao='IS')");
	$status_pagos =  mysql_result($count5, 0);
/**
    $count5 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE situacao = 'IS'");
	$status_isento =  mysql_result($count5, 0);
**/
?>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>





    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Inscritos'],

<?
	$sql101 = "SELECT DISTINCT created_on,COUNT(`created_on`) AS quantidade FROM tb_usuario GROUP BY DATE_FORMAT(`created_on`, '%Y%m%d')";
	$res101 = mysqlexecuta($id,$sql101);
	while($row101 = mysql_fetch_array($res101)){
       $timestamp = strtotime($row101['created_on']);
        $data = date('d/m/Y', $timestamp);
    	echo "['".$data."',".$row101['quantidade']."],";        
    }

?>

        ]);

        var options = {
          title: 'Evolução de Inscritos',
          hAxis: {title: 'Data',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('evolucao_inscricao'));
        chart.draw(data, options);
      }
    </script>
    


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var status_pagos = <? echo $status_pagos ?>;
        var status_nao_pagos = <? echo $status_nao_pagos ?>;
     /**   var status_isento = <? echo $status_isento ?>;**/
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Pagamentos'],
          ['Pagos',     status_pagos ],
          ['Não Pagos',      status_nao_pagos ],
   /**       ['Isentos',      status_isento ],**/
        ]);

        var options = {
          title: 'Status Pagamento',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('status_pagamento'));

        chart.draw(data, options);
      }
    </script>


<?
	$r=1;
	while($r<9){
	$sql11 = "SELECT * FROM tb_status WHERE id = '$r'";
	$res11 = mysqlexecuta($id,$sql11);
	$row11 = mysql_fetch_array($res11);
	$count4 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE status = $r");
	$status =  mysql_result($count4, 0);
    if($row11['id'] == '1'){
        $incompleto = $status;
    }
    if($row11['id'] == '2'){
        $aguardando = $status;
    }
    if($row11['id'] == '3'){
        $completo = $status;
    }

    if($row11['id'] == '4'){
        $aprovado = $status;
    }
    if($row11['id'] == '5'){
        $recusado = $status;
    }
    if($row11['id'] == '6'){
        $correcao_solicitada = $status;
    }
    if($row11['id'] == '7'){
        $recusado_orientador = $status;
    }
    if($row11['id'] == '8'){
        $recusado_secretaria = $status;
    }
	$r++;
	}
?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var incompleto = <? echo $incompleto; ?>, completo = <? echo $completo; ?>, aguardando=<? echo $aguardando; ?>,aprovado=<? echo $aprovado; ?>,recusado=<? echo $recusado; ?>,correcao_solicitada=<? echo $correcao_solicitada; ?>,recusado_orientador=<? echo $recusado_orientador; ?>,recusado_secretaria=<? echo $recusado_secretaria; ?>;

        var data = google.visualization.arrayToDataTable([
          ['Status', 'Trabalhos'],
          ['Incompleto',     incompleto],
          ['Completo',      completo],
          ['Aguardando',  aguardando],
          ['Aprovado',  aprovado],
          ['Recusado', recusado],
          ['Correção Solicitada',  correcao_solicitada],
          ['Recusado Orientador',  recusado_orientador],
          ['Recusado Pela Secretaria da FeSBE',  recusado_secretaria],
        ]);

        var options = {
          title: 'Trabalhos Por Status',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('trabalhos_status'));

        chart.draw(data, options);
      }
    </script>


<?
	$sql119 = "SELECT * FROM tb_categoria";
	$res119 = mysqlexecuta($id,$sql119);
	$x=0;
    while($row119 = mysql_fetch_array($res119)){
	$cat=$row119['id'];
    $cat_nome[$x] = $row119['nome'];
	$count7 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE categoria = $cat");
	$status7 =  mysql_result($count7, 0);
	$count_cat[$x] = $status7;
//    echo "<tr><td colspan='2'>".utf8_encode($row119['nome'])."</td><td>".$status7."</td>"."</tr>";
	$x++;
    }
?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var incompleto = <? echo $incompleto; ?>, completo = <? echo $completo; ?>, aguardando=<? echo $aguardando; ?>,aprovado=<? echo $aprovado; ?>,recusado=<? echo $recusado; ?>,correcao_solicitada=<? echo $correcao_solicitada; ?>,recusado_orientador=<? echo $recusado_orientador; ?>,recusado_secretaria=<? echo $recusado_secretaria; ?>;

        var data = google.visualization.arrayToDataTable([
          ['Categoria', 'Inscritos'],
<?
$x=0;
while($x<9){
    echo "['".utf8_encode($cat_nome[$x])."',".$count_cat[$x]." ],";
    $x++;
}
?>
        ]);

        var options = {
          title: 'Inscritos Por Categoria',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('inscritos_categoria'));
        chart.draw(data, options);
      }
    </script>








<?
	$sql1199 = "SELECT * FROM tb_categoria";
	$res1199 = mysqlexecuta($id,$sql1199);
	$x=0;
    while($row1199 = mysql_fetch_array($res1199)){
	$cat=$row1199['id'];
    $cat_nome[$x] = $row1199['nome'];
	$count79 = mysql_query("SELECT COUNT(*) FROM tb_trabalhos WHERE usuario_id IN(SELECT id FROM `tb_usuario` WHERE categoria = $cat)");
	$status79 =  mysql_result($count79, 0);
	$count_cat[$x] = $status79;
//    echo "<tr><td colspan='2'>".utf8_encode($row119['nome'])."</td><td>".$status7."</td>"."</tr>";
	$x++;
    }
?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {


        var data = google.visualization.arrayToDataTable([
          ['Categoria', 'Trabalhos'],
<?
$x=0;
while($x<9){
    echo "['".utf8_encode($cat_nome[$x])."',".$count_cat[$x]." ],";
    $x++;
}
?>
        ]);

        var options = {
          title: 'Trabalhos Por Categoria',
          is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('trabalhos_categoria'));

        chart.draw(data, options);
      }
    </script>












  </head>
  <body>
  <div class="ls-box"> 
    <div id="evolucao_inscricao" style="width: 100%; height: 500px;"></div>
    <div id="inscritos_categoria" style="width: 850px; height: 600px;"></div>
    <div id="status_pagamento" style="width: 850px; height: 600px;"></div>
    <div id="trabalhos_status" style="width: 850px; height: 600px;"></div>
    <div id="trabalhos_categoria" style="width: 850px; height: 600px;"></div>
    </div>    
  </body>

</html>