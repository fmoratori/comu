<h1 class="ls-title-intro ls-ico-pencil2">Inscri&ccedil;&atilde;o Em Atividades</h1>

<?
if($row_usuario['periodo']==''){
    ?>
    <meta http-equiv="refresh" content="0; url=./principal.php?pg=altera_periodo.php">
    <?
    exit();
}
//echo "<div class='ls-alert-danger'><b>Inscri??es Liberadas a partir das 18h!</b><br />";
    echo "<div class='ls-alert-danger'><b>UMA VEZ SALVAS, AS ATIVIDADES NAO PODER&Atilde;O SER ALTERADAS!</b><br />
    <p>Curso: R$ 45,00</p>
    <p>Workshop: R$ 65,00</p>
    <p>Workshop Externo: R$ 100,00</p></div>";   
   // exit();
     
    $pagto = 0;
    $xyz=0;
$sql_sessao = "SELECT * FROM tb_sessao ORDER BY id ASC";
$res_sessao = mysqlexecuta($id,$sql_sessao);
if($row_usuario['inscricao_obs']!=''){
echo "<h2>Inscri&ccedil;&otilde;es Realizadas: </h2><br />";
echo "<h3>Acesse a &Aacute;rea 'Pagamentos' para concluir sua inscri&ccedil;&atilde;o! </h3><br />";
}
if($row_usuario['inscricao_obs']!=''){
    $insc_obs = $row_usuario['inscricao_obs'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}
if($row_usuario['inscricao_obs2']!=''){
    $insc_obs = $row_usuario['inscricao_obs2'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}

if($row_usuario['inscricao_obs3']!=''){
    $insc_obs = $row_usuario['inscricao_obs3'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}

if($row_usuario['inscricao_obs4']!=''){
    $insc_obs = $row_usuario['inscricao_obs4'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}


$ver = $_GET['ver'];
if($ver==s){
    
//    echo "<div class='ls-alert-danger'><b>EM MANUTEN??O. Retornamos em Breve!</b><br />";

//exit();
    
    $atividade = $_POST['1'];
    $atividade2 = $_POST['2'];
    $atividade3 = $_POST['3'];
    $atividade4 = $_POST['4'];            
    if($atividade==''){
        if($row_usuario['inscricao_obs']==''){
        $atividade=101;
        }
        else{
            $atividade = $row_usuario['inscricao_obs'];
        }
    }
    if($atividade2==''){
        if($row_usuario['inscricao_obs2']==''){
        $atividade2=102;
        }
        else{
            $atividade2 = $row_usuario['inscricao_obs2'];
        }
    }
    if($atividade3==''){
       if($row_usuario['inscricao_obs3']==''){
        $atividade3=103;
        }
        else{
            $atividade3 = $row_usuario['inscricao_obs3'];
        }
     }
    if($atividade4==''){
       if($row_usuario['inscricao_obs4']==''){
        $atividade4=104;
        }
        else{
            $atividade4 = $row_usuario['inscricao_obs4'];
        }

    }
    



//else{
//    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2' WHERE `id`=$id_usuario";
    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2', `inscricao_obs3`='$atividade3', `inscricao_obs4`='$atividade4' WHERE `id`=$id_usuario";
    $res_insere_atividade_inscrito = mysqlexecuta($id,$sql_insere_atividade_inscrito);


$id_atividade='';
    $id_atividade='';
    $valor = '';
    $vencimento = '';
    $nome_atividade = '';

if($atividade!=101){

    
$sql_atividades_inscrito50 = "SELECT * FROM tb_atividades WHERE id = $atividade";
$res_atividades_inscrito50 = mysqlexecuta($id,$sql_atividades_inscrito50);
$row_atividades_inscrito50 = mysql_fetch_array($res_atividades_inscrito50);
    $id_atividade=$atividade;



$usp = $row_usuario['usp'];
$cpf2 = $row_usuario['cpf'];
$valor2='';    
 $desconto = 1;   
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
$valor2 = $row_atividades_inscrito50['valor'];
//echo $row_atividades_inscrito50['valor'];
$valor2 = $valor2/$desconto;
$valor2 = number_format($valor2, 2, '.', '');
$count_boleto1 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE `user_id`=$id_usuario AND `categoria`=$id_atividade AND `situacao` != 'cancelada'");
$inscritos_boleto1 =  mysql_result($count_boleto1, 0);
if($inscritos_boleto1<=0){
    //$valor = $row_atividades_inscrito50['valor'];

    $vencimento = date('Y-m-d', strtotime('+2 days'));
    $nome_atividade = $row_atividades_inscrito50['nome'];
    $sql_insere_boleto_inscrito = "INSERT INTO `tb_boleto` SET `user_id`='$id_usuario', `categoria`='$id_atividade', `referente`='$nome_atividade', `vencimento`='$vencimento', `valor`='$valor2', `situacao`='NP'";
    $res_insere_boleto_inscrito = mysqlexecuta($id,$sql_insere_boleto_inscrito);
}
}
    $id_atividade='';
    $valor = '';
    $vencimento = '';
    $nome_atividade = '';

if($atividade2!=102){
    $id_atividade='';
    $valor = '';
    $vencimento = '';
    $nome_atividade = '';
$sql_atividades_inscrito50 = "SELECT * FROM tb_atividades WHERE id = $atividade2";
$res_atividades_inscrito50 = mysqlexecuta($id,$sql_atividades_inscrito50);
$row_atividades_inscrito50 = mysql_fetch_array($res_atividades_inscrito50);
    $id_atividade=$atividade2;
    
    
 $usp = $row_usuario['usp'];
$cpf2 = $row_usuario['cpf'];
$valor2='';    
 $desconto = 1;   
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
$valor2 = $row_atividades_inscrito50['valor'];
$valor2 = $valor2/$desconto;
$valor2 = number_format($valor2, 2, '.', '');
   

$count_boleto2 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE `user_id`=$id_usuario AND `categoria`=$id_atividade AND `situacao` != 'cancelada'");
$inscritos_boleto2 =  mysql_result($count_boleto2, 0);

if($inscritos_boleto2<=0){
 
//    $valor = $row_atividades_inscrito50['valor'];
$vencimento = date('Y-m-d', strtotime('+2 days'));
    $nome_atividade = $row_atividades_inscrito50['nome'];
    $sql_insere_boleto_inscrito = "INSERT INTO `tb_boleto` SET `user_id`='$id_usuario', `categoria`='$id_atividade', `referente`='$nome_atividade', `vencimento`='$vencimento', `valor`='$valor2', `situacao`='NP'";
    $res_insere_boleto_inscrito = mysqlexecuta($id,$sql_insere_boleto_inscrito);
}
}
    $id_atividade='';
    $valor = '';
    $vencimento = '';
    $nome_atividade = '';

if($atividade3!=103){
    $id_atividade='';
    $valor = '';
    $vencimento = '';
    $nome_atividade = '';
$sql_atividades_inscrito50 = "SELECT * FROM tb_atividades WHERE id = $atividade3";
$res_atividades_inscrito50 = mysqlexecuta($id,$sql_atividades_inscrito50);
$row_atividades_inscrito50 = mysql_fetch_array($res_atividades_inscrito50);
    $id_atividade=$atividade3;
    

$cpf2 = $row_usuario['cpf'];
$valor2='';    
 $desconto = 1;   
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
$valor2 = $row_atividades_inscrito50['valor'];
$valor2 = $valor2/$desconto;
$valor2 = number_format($valor2, 2, '.', '');
    
$count_boleto3 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE `user_id`=$id_usuario AND `categoria`=$id_atividade AND `situacao` != 'cancelada'");
$inscritos_boleto3 =  mysql_result($count_boleto3, 0);

if($inscritos_boleto3<=0){
$vencimento = date('Y-m-d', strtotime('+2 days'));
    $nome_atividade = $row_atividades_inscrito50['nome'];
    $sql_insere_boleto_inscrito = "INSERT INTO `tb_boleto` SET `user_id`='$id_usuario', `categoria`='$id_atividade', `referente`='$nome_atividade', `vencimento`='$vencimento', `valor`='$valor2', `situacao`='NP'";
    $res_insere_boleto_inscrito = mysqlexecuta($id,$sql_insere_boleto_inscrito);
}
}
    $id_atividade='';
    $valor = '';
    $vencimento = '';
    $nome_atividade = '';

if($atividade4!=104){
    $id_atividade='';
    $valor = '';
    $vencimento = '';
    $nome_atividade = '';

$sql_atividades_inscrito50 = "SELECT * FROM tb_atividades WHERE id = $atividade4";
$res_atividades_inscrito50 = mysqlexecuta($id,$sql_atividades_inscrito50);
$row_atividades_inscrito50 = mysql_fetch_array($res_atividades_inscrito50);
    $id_atividade=$atividade4;
    
$cpf2 = $row_usuario['cpf'];
$valor2='';    
 $desconto = 1;   
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
$valor2 = $row_atividades_inscrito50['valor'];
$valor2 = $valor2/$desconto;
$valor2 = number_format($valor2, 2, '.', '');
    
    
    
    
$count_boleto4 = mysql_query("SELECT COUNT(*) FROM `tb_boleto` WHERE `user_id`=$id_usuario AND `categoria`=$id_atividade AND `situacao` != 'cancelada'");
$inscritos_boleto4 =  mysql_result($count_boleto4, 0);

if($inscritos_boleto4<=0){    

$vencimento = date('Y-m-d', strtotime('+2 days'));
    $nome_atividade = $row_atividades_inscrito50['nome'];
    $sql_insere_boleto_inscrito = "INSERT INTO `tb_boleto` SET `user_id`='$id_usuario', `categoria`='$id_atividade', `referente`='$nome_atividade', `vencimento`='$vencimento', `valor`='$valor2', `situacao`='NP'";
    $res_insere_boleto_inscrito = mysqlexecuta($id,$sql_insere_boleto_inscrito);
}
}

header("Refresh: 0; url = ./principal.php?pg=atividades2.php");
$sql_atividades_inscrito = "SELECT * FROM tb_atividades WHERE id = $atividade";
$res_atividades_inscrito = mysqlexecuta($id,$sql_atividades_inscrito);
$row_atividades_inscrito = mysql_fetch_array($res_atividades_inscrito);
$nome_atividade = $row_atividades_inscrito['nome'];

$sql_atividades_inscrito2 = "SELECT * FROM tb_atividades WHERE id = $atividade2";
$res_atividades_inscrito2 = mysqlexecuta($id,$sql_atividades_inscrito2);
$row_atividades_inscrito2 = mysql_fetch_array($res_atividades_inscrito2);
$nome_atividade2 = $row_atividades_inscrito2['nome'];
 //   echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade</b> foi realizada com sucesso</div>";    
    
  //  echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade2</b> foi realizada com sucesso</div>";    
//}
}




?>
<form action="./principal.php?pg=atividades2.php&ver=s" class="ls-form row" method="POST">
<?
while($row_sessao = mysql_fetch_array($res_sessao)){
    $id_sessao = $row_sessao['id'];
?>
  <div data-ls-module="collapse" data-target="<? echo "#".$id_sessao; ?>" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title"><? echo $row_sessao['nome']; ?></h3>
    </a>
<?
$periodo = $row_usuario['periodo'];
if($periodo==''){
    $periodo=1;
}
$sql_atividades = "SELECT * FROM tb_atividades WHERE sessao='$id_sessao' AND periodo<='$periodo' ORDER BY id ASC";
$res_atividades = mysqlexecuta($id,$sql_atividades);
while($row_atividades = mysql_fetch_array($res_atividades)){
$sessao = $row_atividades['sessao'];
$id_atividade = $row_atividades['id'];
//echo $periodo;
?>
    <div class="ls-collapse-body" id="<? echo $id_sessao; ?>">
      <p>
      <?
      $selected='';
      $disabled = '';
      
      if($row_usuario['inscricao_obs']>105 && $sessao==1){
      $disabled = "disabled='disabled'";
      }
      if($row_usuario['inscricao_obs2']>105 && $sessao==2){
      $disabled = "disabled='disabled'";        
      }
      if($row_usuario['inscricao_obs3']>105 && $sessao==3){
      $disabled = "disabled='disabled'";        
      }
      if($row_usuario['inscricao_obs4']>105 && $sessao==4){
      $disabled = "disabled='disabled'";        
      }
$fila ="";      
$count = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs=$id_atividade");
$inscritos =  mysql_result($count, 0);
if($inscritos>=$row_atividades['capacidade']){
    $fila = $inscritos - $row_atividades['capacidade']+1;
    $fila = '<b> - FILA DE ESPERA POSI&Ccedil;&Atilde;O: '.$fila.'</b>';
}
$count2 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs2=$id_atividade");
$inscritos2 =  mysql_result($count2, 0);
if($inscritos2>=$row_atividades['capacidade']){
    $fila = $inscritos2 - $row_atividades['capacidade']+1;
    $fila = '<b> - FILA DE ESPERA POSI&Ccedil;&Atilde;O: '.$fila.'</b>';
}     
$count3 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs3=$id_atividade");
$inscritos3 =  mysql_result($count3, 0);
if($inscritos3>=$row_atividades['capacidade']){
    $fila = $inscritos3 - $row_atividades['capacidade']+1;
    $fila = '<b> - FILA DE ESPERA POSI&Ccedil;&Atilde;O: '.$fila.'</b>';
}
$count4 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs4=$id_atividade");
$inscritos4 =  mysql_result($count4, 0);
if($inscritos4>=$row_atividades['capacidade']){
    $fila = $inscritos4 - $row_atividades['capacidade']+1;
    $fila = '<b> - FILA DE ESPERA POSI&Ccedil;&Atilde;O: '.$fila.'</b>';
}       
      if($sessao==1 && $id_atividade== $row_usuario['inscricao_obs']){
        $selected = "checked='checked'";
        //$disabled = "disabled = 'disabled'";
      }
      if($sessao==2 && $id_atividade== $row_usuario['inscricao_obs2']){
        $selected = "checked='checked'";
      }
      if($sessao==3 && $id_atividade== $row_usuario['inscricao_obs3']){
        $selected = "checked='checked'";
      }
      if($sessao==4 && $id_atividade== $row_usuario['inscricao_obs4']){
        $selected = "checked='checked'";
      }
if($id_atividade==116 || $id_atividade==127 || $id_atividade==131 || $id_atividade==134 || $id_atividade==128 || $id_atividade==133 || $id_atividade==144 || $id_atividade==147 || $id_atividade==145 || $id_atividade==161 || $id_atividade==167 || $id_atividade==168){
   // $disabled = "disabled = 'disabled'";
}

if($id_atividade==116 || $id_atividade==127 || $id_atividade==131 || $id_atividade==134 || $id_atividade==128 || $id_atividade==133 || $id_atividade==144 || $id_atividade==147 || $id_atividade==145 || $id_atividade==161 || $id_atividade==167 || $id_atividade==168 || 1==1){
    //$disabled = "disabled = 'disabled'";
}


      ?>
        <input type="radio" name="<? echo $id_sessao; ?>" <? echo $selected; ?><? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;      <a href="#" class="" data-custom-class="ls-color-success" data-ls-module="popover" data-trigger="hover" data-title="<? echo $row_atividades['nome']; ?>" data-content="<p><? echo $row_atividades['exibe']; ?></p>" data-placement="right"><? echo $row_atividades['nome'].$fila; ?></td>
        </a>
      </p>
    </div>

<?
}
?>
  </div>
<?
}
?>
  <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
