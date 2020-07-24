<h1 class="ls-title-intro ls-ico-pencil2">Resultado Avalia&ccedil;&atilde;o do Trabalho</h1>
<?
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE usuario_id=$id_usuario";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    
while($row_trabalhos = mysql_fetch_array($res_trabalhos)){
    $id_trabalho = $row_trabalhos['id'];
    $id_area_trabalho = $row_trabalhos['area_id'];
    $area_trabalho = "SELECT * FROM tb_areas WHERE id=$id_area_trabalho";
    $res_area_trabalho = mysqlexecuta($id,$area_trabalho);
    $row_area_trabalho = mysql_fetch_array($res_area_trabalho);
    
    $status = $row_trabalhos['status'];
    $sql_status = "SELECT * FROM tb_status WHERE id=$status";
    $res_status = mysqlexecuta($id,$sql_status);
    $row_status = mysql_fetch_array($res_status);
    
    if($status==1){
    ?>
    <div class="ls-alert-danger">O envio do Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> ainda n&atilde;o foi finalizado.</div>
    <?            
        }
    if($status==2){
    ?>
    <div class="ls-alert-info">O Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> ainda n&atilde;o foi validado pelo orientador.</div>
    <?            
        }
    if($status==3){
    ?>
    <div class="ls-alert-success">O envio do Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> j&aacute; foi finalizado. Em breve ser&aacute; avaliado.</div>
    <?            
        }
    if($status==4){
    $sessao = $row_trabalhos['sessao_id'];    
    $sql_sessao = "SELECT * FROM tb_sessao WHERE id=$sessao";
    $res_sessao = mysqlexecuta($id,$sql_sessao);
    $row_sessao = mysql_fetch_array($res_sessao);
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dia_hora_apresent = strftime('%d de %B de %Y', strtotime($row_sessao['data_inicio']))." -  Das ".date("H:i",strtotime($row_sessao['hora_inicio']))." &agrave;s ".date("H:i",strtotime($row_sessao['hora_fim']));
    if($row_trabalhos['area_id']<10){
        $area = '0'.$row_trabalhos['area_id'];
    }    
    else{
        $area=$row_trabalhos['area_id'];
    }
    if($row_trabalhos['painel']<10){
        $painel = '00'.$row_trabalhos['painel'];
    }
    if($row_trabalhos['painel']>9 && $row_trabalhos['painel']<100){
        $painel = '0'.$row_trabalhos['painel'];
        
    }
    if($row_trabalhos['painel']>99 ){
        $painel = $row_trabalhos['painel'];
        
    }

    ?>
    <div class="ls-alert-success">O Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> foi aprovado para ser apresentado.<br /> 
    Número de Apresentação: <b><? echo $area.".".$painel;  ?></b><br />
    Data e horario de Apresentação: <b><?  echo $dia_hora_apresent;  ?></b>
    <br /><br /><!---a href="./carta_aceite.php?id_trab=<? echo $id_trabalho; ?>" target="_blank"><b>Clique Aqui para Acessar a Carta de Aceite</a></b--></div>
<?            
        }
    if($status==5){
    ?>
    <div class="ls-alert-danger">O Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> foi recusado pela Comiss&atilde;o de Avalia&ccedil;&atilde;o.<br />
    Segue abaixo o motivo da recusa: <br />
    <?
    $parecer = str_replace('---------', '<br />',$row_trabalhos['parecer']);
    echo $parecer;
     ?>
     </div>
<?            
        }
    if($status==6){
    ?>
    <div class="ls-alert-danger">O Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> necessita de corre&ccedil;&otilde;es.<br />
    Segue abaixo o parecer: <br />
    <?
    $parecer = str_replace('---------', '<br />',$row_trabalhos['parecer']);
    echo $parecer."<br />";
    echo "A Correção deverá ser efetuada até o dia <b>19 de abril de 2018</b>, para que seja reavaliado, caso contrário será cancelado.";
     ?>
     </div>
<?            
        }
    if($status==7){
    ?>
    <div class="ls-alert-success">O Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> foi recusado pelo seu orientador.</div>
<?            
        }
    if($status==8){
    ?>
    <div class="ls-alert-danger">O Trabalho <b><? echo $row_trabalhos['titulo']; ?></b> foi recusado pela secretaria do evento.</div>
<?            
        }

    }
    if($status==null){
    ?>
    <div class="ls-alert-danger">Não há registro de trabalhos enviados na sua inscrição.</div>
    <?            
        }
        ?>