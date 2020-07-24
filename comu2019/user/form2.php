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

<?
if($idioma==1 || $idioma==null){
?>

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

<label class="ls-label col-md-3">
    <b class="ls-label-text">Número USP (Só preencher se for aluno USP)</b>
    <input type="text" name="usp" class="" placeholder="" value="<? echo $row_cpf['usp']; ?>" > 
  </label>
</fieldset>


<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo (Para Certificado)</b>
    <input type="text" name="nome" class="" required="required" value="<? echo $row_cpf['nome']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" class="" required="required" value="<? echo $row_cpf['email']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['telefone']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="celular" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['celular']; ?>" > 
  </label>
</fieldset>
<fieldset>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Senha</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" required="required" id="senha1" name="senha1" >
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha1" href="#">
          </a>
      </div>
    </label>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Confirme sua senha</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha2" required="required" name="senha2" oninput="validaSenha(this)">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha2" href="#">
          </a>
      </div>
    </label>

</fieldset>
<fieldset>
            <label class="ls-label col-md-2">
            <b class="ls-label-text">CEP</b>
            <input type="text" name="cep" id="cep" class="ls-mask-cep" placeholder="00000-000" maxlength="8" required="required" value="<? echo $row_cpf['cep']; ?>" />
            </label>
</fieldset>
<fieldset>
            <label class="ls-label col-md-5">
            <b class="ls-label-text">Rua</b>
            <input type="text" name="rua" id="rua" size="45" value="<? echo $row_cpf['endereco']; ?>" />
            </label> 

 
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Número</b>
            <input type="text" name="numero" id="numero" size="5" required="required" />
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
            <label class="ls-label col-md-8">
            <b class="ls-label-text">Instituição de Ensino</b>
            <input type="text" name="departamento" id="departamento" size="25" value="<? echo $row_cpf['departamento']; ?>" />
            </label>

</fieldset>


<hr />
<div class=""></div>
  <fieldset>
    <div class="ls-label col-md-12">
      <label class="ls-label col-md-12">
      <center><b class="ls-label-text">Ano que est&aacute; Cursando </b></center><br />
</label>
      <label class="ls-label-text">
        <input type="radio" value="1" name="periodo">
        1&nbsp;&nbsp;&nbsp;
      </label>
      
      <label class="ls-label-text">
        <input type="radio" value="2" name="periodo">
        2&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
        <input type="radio" value="3" name="periodo">
        3&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
        <input type="radio" value="4" name="periodo">
        4&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
        <input type="radio" value="5" name="periodo" required="required">
        5&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
        <input type="radio" value="6" name="periodo" required="required">
        6&nbsp;&nbsp;&nbsp;
      </label>
  </fieldset>




<hr />

<div class=""></div>
  <fieldset>
    <div class="ls-label col-md-11">
      <label class="ls-label col-md-11">
      <center><b class="ls-label-text">Restrições Alimentares</b></center><br />
</label>
      <label class="ls-label-text">
        <input type="checkbox" value="s" name="vegano">
        Vegano
      </label>
      
      <label class="ls-label-text">
        <input type="checkbox" value="s" name="vegetariano">
        Vegetariano
      </label>
      <label class="ls-label-text">
        <input type="checkbox" value="s" name="lactose">
        Intolerante a Lactose
      </label>
      <label class="ls-label-text">
        <input type="checkbox" value="s" name="celiaco">
        Celíaco
      </label>
      <br /><br />
    </div>
      <label class="ls-label col-md-6">    
      <b class="ls-label-text">Outros</b>
      <input type="text" name="outros" id="outros" size="25" value="<? echo $row_cpf['outros']; ?>" />
      </label>      

  </fieldset>




    <button class="ls-btn">Pr&oacute;ximo</button>
</div>
<br /><br />
<?
}
?>
</form>
<?
}
?>


<?
if($idioma==2){
?>

<meta charset="utf-8">
        <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
        <script type='text/javascript' src='cep.js'></script>
<h1 class="ls-title-intro ls-ico-home">New Register</h1>

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

<form id="form1" action="./register.php?pg=form3.php&idioma=2" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF (Only Numbers)</b>
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" value="<? echo $cpf; ?>" > 
  </label>
</fieldset>
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Name</b>
    <input type="text" name="nome" class="" required="required" value="<? echo $row_cpf['nome']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" class="" required="required" value="<? echo $row_cpf['email']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Phone</b>
    <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['telefone']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celphone</b>
    <input type="text" name="celular" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['celular']; ?>" > 
  </label>
</fieldset>
<fieldset>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Password</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha1" name="senha1" >
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha1" href="#">
          </a>
      </div>
    </label>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Repeat Password</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha2" name="senha2" oninput="validaSenha(this)">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha2" href="#">
          </a>
      </div>
    </label>

</fieldset>
<fieldset>
            <label class="ls-label col-md-2">
            <b class="ls-label-text">Postal Code</b>
            <input type="text" name="cep" id="cep" class="ls-mask-cep" placeholder="00000-000" maxlength="8" required="required" value="<? echo $row_cpf['cep']; ?>" />
            </label>
</fieldset>
<fieldset>
            <label class="ls-label col-md-5">
            <b class="ls-label-text">Address</b>
            <input type="text" name="rua" id="rua" size="45" value="<? echo $row_cpf['endereco']; ?>" />
            </label> 

 
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Number</b>
            <input type="text" name="numero" id="numero" size="5" required="required" />
            </label>
            
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Address Complement</b>
            <input type="text" name="complemento" id="complemento" size="5" value="<? echo $row_cpf['complemento']; ?>" />
            </label>


            <label class="ls-label col-md-5">
            <b class="ls-label-text">District</b>
            <input type="text" name="bairro" id="bairro" size="25" value="<? echo $row_cpf['bairro']; ?>" />
            </label>
            
            <label class="ls-label col-md-4">
            <b class="ls-label-text">City</b>
            <input type="text" name="cidade" id="cidade" size="25" value="<? echo $row_cpf['cidade']; ?>" />
            </label>
            
 
            <label class="ls-label col-md-2">
            <b class="ls-label-text">State</b>
            <input type="text" name="estado" id="estado" size="2" value="<? echo $row_cpf['estado']; ?>" />
            </label>
</fieldset>


<fieldset>
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Departament</b>
            <input type="text" name="departamento" id="departamento" size="25" value="<? echo $row_cpf['departamento']; ?>" />
            </label>

            <label class="ls-label col-md-3">
            <b class="ls-label-text">Institute</b>
            <input type="text" name="instituto" id="instituto" size="25" value="<? echo $row_cpf['instituto']; ?>" />
            </label>

            <label class="ls-label col-md-4">
            <b class="ls-label-text">Instituition</b>
            <input type="text" name="instituicao" id="instituicao" size="25" value="<? echo $row_cpf['instituicao']; ?>" />
            </label>

    <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Society Partner</b>
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
      <th>Category</th>
      <th class="hidden-xs">Price</th>
      <th>Expiration Date</th>
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
    <button class="ls-btn">Next</button>
</div>
<?
}
?>
</form>
<?
}
?>





<?
if($idioma==3){
?>

<meta charset="utf-8">
        <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
        <script type='text/javascript' src='cep.js'></script>
<h1 class="ls-title-intro ls-ico-home">Nuevo Cadastro</h1>

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
   echo  "<div class='ls-alert-danger'><strong>CPF já Registrado</strong> <a href='./register.php?pg=recuperar_senha.php&cpf=$cpf_consulta'>Recuperar contraseña?</a></div>";
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

<form id="form1" action="./register.php?pg=form3.php&idioma=3" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF (Sólo Números)</b>
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" value="<? echo $cpf; ?>" > 
  </label>
</fieldset>
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nombre Completo</b>
    <input type="text" name="nome" class="" required="required" value="<? echo $row_cpf['nome']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" class="" required="required" value="<? echo $row_cpf['email']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Teléfono</b>
    <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['telefone']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Teléfono Celular</b>
    <input type="text" name="celular" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['celular']; ?>" > 
  </label>
</fieldset>
<fieldset>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Contraseña</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha1" name="senha1" >
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha1" href="#">
          </a>
      </div>
    </label>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Confirmar La Contraseña</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha2" name="senha2" oninput="validaSenha(this)">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha2" href="#">
          </a>
      </div>
    </label>

</fieldset>
<fieldset>
            <label class="ls-label col-md-2">
            <b class="ls-label-text">C&oacute;digo Postal</b>
            <input type="text" name="cep" id="cep" class="ls-mask-cep" placeholder="00000-000" maxlength="8" required="required" value="<? echo $row_cpf['cep']; ?>" />
            </label>
</fieldset>
<fieldset>
            <label class="ls-label col-md-5">
            <b class="ls-label-text">Dirección </b>
            <input type="text" name="rua" id="rua" size="45" value="<? echo $row_cpf['endereco']; ?>" />
            </label> 

 
            <label class="ls-label col-md-3">
            <b class="ls-label-text">N&uacute;mero</b>
            <input type="text" name="numero" id="numero" size="5" required="required" />
            </label>
            
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Complemento de La Dirección</b>
            <input type="text" name="complemento" id="complemento" size="5" value="<? echo $row_cpf['complemento']; ?>" />
            </label>


            <label class="ls-label col-md-5">
            <b class="ls-label-text">Barrio</b>
            <input type="text" name="bairro" id="bairro" size="25" value="<? echo $row_cpf['bairro']; ?>" />
            </label>
            
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Ciudad</b>
            <input type="text" name="cidade" id="cidade" size="25" value="<? echo $row_cpf['cidade']; ?>" />
            </label>
            
 
            <label class="ls-label col-md-2">
            <b class="ls-label-text">Prov&iacute;ncia</b>
            <input type="text" name="estado" id="estado" size="2" value="<? echo $row_cpf['estado']; ?>" />
            </label>
</fieldset>


<fieldset>
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Setor</b>
            <input type="text" name="departamento" id="departamento" size="25" value="<? echo $row_cpf['departamento']; ?>" />
            </label>

            <label class="ls-label col-md-3">
            <b class="ls-label-text">Instituto</b>
            <input type="text" name="instituto" id="instituto" size="25" value="<? echo $row_cpf['instituto']; ?>" />
            </label>

            <label class="ls-label col-md-4">
            <b class="ls-label-text">Institución</b>
            <input type="text" name="instituicao" id="instituicao" size="25" value="<? echo $row_cpf['instituicao']; ?>" />
            </label>

    <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Sociedad Afiliada </b>
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
      <th class="hidden-xs">Precio</th>
      <th>Vencimiento de La Factura</th>
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
    <button class="ls-btn">Next</button>
</div>
<?
}
?>
</form>
<?
}
?>