<head>
	<title>Validade Senha</title>
<script>
function validaSenha (input){ 
    if (input.value != document.getElementById('senha1').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>
</head>
<meta charset="utf-8">
        <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
        <script type='text/javascript' src='cep.js'></script>
<h1 class="ls-title-intro ls-ico-home">Nova Inscri&ccedil;&atilde;o</h1>

<?
$verifica_cadastro = 0;
$ponto = '.';
$traco = '-';
$cpf = $_POST['cpf'];
$cpf_consulta = str_replace($ponto, '', $cpf);
$cpf_consulta = str_replace($traco, '', $cpf_consulta);
$sql_consulta_cadastro = "SELECT * FROM tb_usuario WHERE cpf LIKE '$cpf_consulta'";
$res_consulta_cadastro = mysqlexecuta($id,$sql_consulta_cadastro);
while($row_consulta_cadastro = mysql_fetch_array($res_consulta_cadastro)){
   echo  "<div class='ls-alert-danger'><strong>CPF já cadastrado</strong> <a href='./register.php?pg=recuperar_senha.php&cpf=$cpf_consulta'>Clique aqui para recuperar sua senha.</a></div>";
   $verifica_cadastro=2;
}
if($verifica_cadastro<=0){
include './mysqlconecta_bd_geral.php';
$ponto = '.';
$traco = '-';
$cpf_consulta = str_replace($ponto, '', $cpf);
$cpf_consulta = str_replace($traco, '', $cpf_consulta);
$sql_cpf = "SELECT * FROM inscritos_geral WHERE cpf LIKE '$cpf_consulta' ORDER BY id DESC";
$res_cpf = mysqlexecuta($id,$sql_cpf);
$row_cpf = mysql_fetch_array($res_cpf);
?>

<form id="form1" action="./register.php?pg=form3.php" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF (Somente N&uacute;meros)</b>
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" value="<? echo $cpf; ?>" > 
  </label>
</fieldset>
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome" class="" required="required" value="<? echo $row_cpf['nome']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" class="" required="required" value="<? echo $row_cpf['email']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" value="<? echo $row_cpf['telefone']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="celular" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" value="<? echo $row_cpf['celular']; ?>" > 
  </label>
</fieldset>
<fieldset>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Senha</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha1" name="senha1" >
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha1" href="#">
          </a>
      </div>
    </label>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Confirme sua senha</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha2" name="senha2" oninput="validaSenha(this)">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha2" href="#">
          </a>
      </div>
    </label>

</fieldset>
<fieldset>
            <label class="ls-label col-md-2">
            <b class="ls-label-text">CEP</b>
            <input type="text" name="cep" id="cep" class="ls-mask-cep" placeholder="00000-000" maxlength="8" value="<? echo $row_cpf['cep']; ?>" />
            </label>
</fieldset>
<fieldset>
            <label class="ls-label col-md-5">
            <b class="ls-label-text">Rua</b>
            <input type="text" name="rua" id="rua" size="45" value="<? echo $row_cpf['endereco']; ?>" />
            </label> 

 
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Número</b>
            <input type="text" name="numero" id="numero" size="5" />
            </label>
            
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Complemento</b>
            <input type="text" name="complemento" id="complemento" size="5" value="<? echo $row_cpf['complemento']; ?>" />
            </label>


            <label class="ls-label col-md-5">
            <b class="ls-label-text">Bairro</b>
            <input type="text" name="bairro" id="bairro" size="25" value="<? echo $row_cpf['bairro']; ?>" />
            </label>
            
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Cidade</b>
            <input type="text" name="cidade" id="cidade" size="25" value="<? echo $row_cpf['cidade']; ?>" />
            </label>
            
 
            <label class="ls-label col-md-2">
            <b class="ls-label-text">Estado</b>
            <input type="text" name="estado" id="estado" size="2" value="<? echo $row_cpf['estado']; ?>" />
            </label>
</fieldset>


<fieldset>
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Departamento</b>
            <input type="text" name="departamento" id="departamento" size="25" value="<? echo $row_cpf['departamento']; ?>" />
            </label>

            <label class="ls-label col-md-3">
            <b class="ls-label-text">Instituto</b>
            <input type="text" name="instituto" id="instituto" size="25" value="<? echo $row_cpf['instituto']; ?>" />
            </label>

            <label class="ls-label col-md-4">
            <b class="ls-label-text">Instituição</b>
            <input type="text" name="instituicao" id="instituicao" size="25" value="<? echo $row_cpf['instituicao']; ?>" />
            </label>

    <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Sociedade Filiada</b>
      <div class="ls-custom-select">
        <select name="sociedade" class="ls-select">
<?
include 'mysqlconecta.php';
$sql_sociedades = "SELECT * FROM tb_sociedades";
$res_sociedades = mysqlexecuta($id,$sql_sociedades);
    echo "<option value='14'>".'Sociedade Filiada'."</option><br />";
    while($row_sociedades=mysql_fetch_array($res_sociedades)){
        //echo "<option value='14'>"."1"."</option>";
        echo "<option value='".$row_sociedades['id']."'>".$row_sociedades['nome']."</option>";
    }
?>
        </select>
      </div>
    </label>
</fieldset>
<fieldset>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
    <th></th>
      <th>Categoria</th>
      <th class="hidden-xs">Valor</th>
      <th>Vencimento</th>
    </tr>
  </thead>
  <tbody>

<?

$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

    $sql_categorias = "SELECT * FROM tb_categoria";
    $res_categorias = mysqlexecuta($id,$sql_categorias);

   while($row_categorias = mysql_fetch_array($res_categorias)){
    $categoria_id = $row_categorias['id'];
        echo "<tr>";
        echo "<td><input type='radio' name='categoria_id' value='$categoria_id'></td>";
        echo "<td>".$row_categorias['nome']."</td>";
        if((strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento1']))){
	 		$valor = $row_categorias['valor1'];
			$vencimento = $row_evento['vencimento1'];
            echo "<td>R$ ".$row_categorias['valor1']."</td>"; 
            echo "<td>".$row_evento['vencimento1']."</td>"; 
		}
		else if((strtotime(date('Y-m-d')) > strtotime($row_evento['vencimento1'])) && (strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento2']))){
	 		$valor = $row_categorias['valor2'];
			$vencimento = $row_evento['vencimento2'];
            echo "<td>R$ ".$row_categorias['valor2']."</td>"; 
            echo "<td>".$row_evento['vencimento2']."</td>"; 		}
		else if((strtotime(date('Y-m-d')) > strtotime($row_evento['vencimento2'])) && (strtotime(date('Y-m-d')) <= strtotime($row_evento['vencimento3']))){
	 		$valor = $row_categorias['valor3'];
			$vencimento = $row_evento['vencimento3'];
            echo "<td>R$ ".$row_categorias['valor3']."</td>"; 
            echo "<td>".$row_evento['vencimento3']."</td>";
     		}
        echo "<tr>";
    }



?> 
</tbody></table> 
</fieldset>  
<div class=""></div>
    <button class="ls-btn">Pr&oacute;ximo</button>
</div>
<?
}
?>
</form>