<?
$ponto = '.';
$traco = '-';
$cpf = $_POST['cpf'];
$cpf = str_replace($ponto, '', $cpf);
$cpf = str_replace($traco, '', $cpf);
$usp = $_POST['usp'];
$vegano = $_POST['vegano'];
$vegetariano = $_POST['vegetariano'];
$lactose = $_POST['lactose'];
$celiaco = $_POST['celiaco'];
$outros = $_POST['outros'];
$periodo = $_POST['periodo'];
$nome = ucwords($_POST['nome']);
$email = trim($_POST['email']);
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$senha = $_POST['senha1'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$curso = $_POST['curso'];
$departamento = $_POST['departamento'];
$instituto = $_POST['instituto'];
$instituicao = $_POST['instituicao'];
$categoria = $_POST['categoria_id'];
$sociedade = $_POST['sociedade'];
$count_usp1 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE `usp`=$usp");
$inscritos_usp1 =  mysql_result($count_usp1, 0);

if($inscritos_usp1>0){
            echo "<br /><br /><div class='ls-alert-danger'>"."<b>N&uacute;mero USP j&aacute; Utilizado</b>"."</h2></div>"; 
            exit(); 
}


if($cpf==''||$nome==''||$email==''){
    echo "<meta http-equiv='refresh' content='0; url=./register.php?pg=form2.php'>";
    break; 
}
$categoria = 1;
if($categoria==''){
        ?>
    <div class="ls-alert-danger"><strong>Aten&ccedil;&atilde;o:</strong> Voc&ecirc; n&atilde;o selecionou uma categoria pra inscrição.</div>
<?
}

$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

$sql_verifica_inscrito = "SELECT * FROM `tb_usuario` WHERE cpf LIKE '$cpf' OR email LIKE '$email'";
$res_verifica_inscrito = mysqlexecuta($id,$sql_verifica_inscrito);

$x=0;

while($row_verifica_inscrito = mysql_fetch_array($res_verifica_inscrito)){
    $x++;
}
if(($categoria==7)||($categoria==8)||($categoria==9)){
    $valida = 'S';
}
else{
    $valida = 'P';
}
if($x<=0){
    $sql_categorias = "SELECT * FROM tb_categoria WHERE id = $categoria";
    $res_categorias = mysqlexecuta($id,$sql_categorias);
    $row_categorias = mysql_fetch_array($res_categorias);
    $referente = $row_categorias['nome'];
    $categoria = $row_categorias['id'];
        if((strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento1']))){
	 		$valor = $row_categorias['valor1'];
			$vencimento = $row_evento['vencimento1'];
            echo "<td>".$row_categorias['valor1']."</td>"; 
            echo "<td>".$row_evento['vencimento1']."</td>"; 
		}
		else if((strtotime(date('Y-m-d')) > strtotime($row_evento['vencimento1'])) && (strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento2']))){
	 		$valor = $row_categorias['valor2'];
			$vencimento = $row_evento['vencimento2'];
            echo "<td>".$row_categorias['valor2']."</td>"; 
            echo "<td>".$row_evento['vencimento2']."</td>"; 		}
		else if((strtotime(date('Y-m-d')) > strtotime($row_evento['vencimento2'])) && (strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento3']))){
	 		$valor = $row_categorias['valor3'];
			$vencimento = $row_evento['vencimento3'];
            echo "<td>".$row_categorias['valor3']."</td>"; 
            echo "<td>".$row_evento['vencimento3']."</td>";
     		}
if($nome=='' || $email==''){
        ?>
    <div class="ls-alert-danger"><strong>Aten&ccedil;&atilde;o:</strong> Voc&ecirc; n&atilde;o preencheu todos os dados obrigatórios pra inscrição.</div>
<?
}


    
$sql_nova_inscricao = "INSERT INTO `tb_usuario` SET `nome`='$nome', `cpf`='$cpf', `email`='$email', `usp`='$usp',`vegano`='$vegano', `vegetariano`='$vegetariano', `lactose`='$lactose', `celiaco`='$celiaco', `outros`='$outros', `telefone`='$telefone', `celular`='$celular', `categoria`='$categoria', `senha`='$senha', `cep`='$cep', `endereco`='$rua', `numero`='$numero', `complemento`='$complemento', `bairro`='$bairro', `cidade`='$cidade', `estado`='$estado',`curso`='$curso', `periodo`='$periodo',`departamento`='$departamento', `instituto`='$instituto', `instituicao`='$instituicao', `categoria_valida`='$valida',`sociedade_filiada`='$sociedade'";
$res_nova_inscricao = mysqlexecuta($id,$sql_nova_inscricao);
$idDaInsert = mysql_insert_id();

//$sql_novo_boleto = "INSERT INTO `tb_boleto` SET `user_id`='$idDaInsert', `categoria`='$categoria', `referente`='$referente', `vencimento`='$vencimento', `valor`='$valor', `situacao`='NP'";
//$res_novo_boleto = mysqlexecuta($id,$sql_novo_boleto);
}

if($res_nova_inscricao){
session_start();
$_SESSION['cpf_nova_inscricao']=$cpf;
$_SESSION['senha_nova_inscricao']=$senha;
$sql_usuario = "SELECT * FROM tb_usuario WHERE cpf = $cpf";
$res_usuario = mysqlexecuta($id,$sql_usuario);
$row_usuario = mysql_fetch_array($res_usuario);
$_SESSION['usuario'] = $row_usuario['id'];

            $ip = $_SERVER['REMOTE_ADDR'];
			$registra = "Pagina: ".$_SERVER['REQUEST_URI']." # ".$_SESSION["hora"]." # ".$data_atual." # ".$ip." # ".$_SESSION['login']." # ".$_SESSION['usuario']."; \r\n";
			//$abre = fopen("./logs/".$_SESSION['usuario']."_log.txt", "r");
			//$conta = fread($abre, filesize("./logs/".$_SESSION['usuario']."_log.txt"));
			//fclose($abre);
			#Adiciona o novo texto
			$fp = fopen("./logs/".$_SESSION['usuario']."_log.txt", "a");
			fputs ($fp, $registra);
			fclose ($fp);

?>
<meta http-equiv="refresh" content="0; url=./login.php?ver=s1">
<?
}
?>
<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">Nova Inscri&ccedil;&atilde;o</h1>
<form action="./register.php?pg=form2.php" class="ls-form ls-form-horizontal" data-ls-module="form" method="POST">
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF (Somente N&uacute;meros</b>
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" >
  </label>
    <button class="ls-btn">Pr&oacute;ximo</button>
</form>