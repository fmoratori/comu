<h1 class="ls-title-intro ls-ico-user">Dados Inscrito</h1>
<?
$id_inscrito = $_GET['id_inscrito'];

$sql_cpf = "SELECT * FROM tb_usuario WHERE id = '$id_inscrito'";
$res_cpf = mysqlexecuta($id,$sql_cpf);
$row_cpf = mysql_fetch_array($res_cpf);
?>

<form id="form1" action="./principal_admin.php?pg=salva_atualiza_dados.php&id_inscrito=<? echo $id_inscrito; ?>" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF</b>
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" value="<? echo $row_cpf['cpf']; ?>" > 
  </label>
</fieldset>
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome" class="" required="required" value="<? echo utf8_encode($row_cpf['nome']); ?>" > 
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
        <input type="password" maxlength="20" id="senha1" name="senha1" value="<? echo $row_cpf['senha']; ?>">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha1" href="#">
          </a>
      </div>
    </label>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Confirme sua senha</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha2" name="senha2" oninput="validaSenha(this)" value="<? echo $row_cpf['senha']; ?>">
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
            <input type="text" name="rua" id="rua" size="45" value="<? echo utf8_encode($row_cpf['endereco']); ?>" />
            </label> 

 
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Número</b>
            <input type="text" name="numero" id="numero" size="5" required="required" value="<? echo $row_cpf['numero']; ?>" />
            </label>
            
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Complemento</b>
            <input type="text" name="complemento" id="complemento" size="5" value="<? echo utf8_encode($row_cpf['complemento']); ?>" />
            </label>


            <label class="ls-label col-md-5">
            <b class="ls-label-text">Bairro</b>
            <input type="text" name="bairro" id="bairro" size="25" value="<? echo utf8_encode($row_cpf['bairro']); ?>" />
            </label>
            
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Cidade</b>
            <input type="text" name="cidade" id="cidade" size="25" value="<? echo utf8_encode($row_cpf['cidade']); ?>" />
            </label>
            
 
            <label class="ls-label col-md-2">
            <b class="ls-label-text">Estado</b>
            <input type="text" name="estado" id="estado" size="2" value="<? echo $row_cpf['estado']; ?>" />
            </label>
</fieldset>


<fieldset>
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Departamento</b>
            <input type="text" name="departamento" id="departamento" size="25" value="<? echo utf8_encode($row_cpf['departamento']); ?>" />
            </label>

            <label class="ls-label col-md-3">
            <b class="ls-label-text">Instituto</b>
            <input type="text" name="instituto" id="instituto" size="25" value="<? echo utf8_encode($row_cpf['instituto']); ?>" />
            </label>

            <label class="ls-label col-md-4">
            <b class="ls-label-text">Instituição</b>
            <input type="text" name="instituicao" id="instituicao" size="25" value="<? echo utf8_encode($row_cpf['instituicao']); ?>" />
            </label>


</fieldset>
  
  
<div class=""></div>
    <button class="ls-btn">Salvar Dados</button>
</div>
</form>