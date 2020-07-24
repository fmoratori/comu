<h1 class="ls-title-intro ls-ico-home">Proposta Conferência</h1>


<div class="ls-box">
<!--h5 class="ls-title-3">Formulário de envio de sugest&atilde;o de m&oacute;dulo tem&aacute;tico</h5-->
<br />
<!---p>A XXXII Reunião Anual da FeSBE ocorrerá em Campos do Jordão - SP, entre os dias 3 a 6 de setembro de 2017.<br /---> 
As conferências terão a duração máxima de 50 minutos, seguidas por uma discussão final de 10 minutos.</p></div>	
<form id="form1" action="./propostas.php?pg=envia_conf.php" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
<div class="ls-box-filter">

<center><h3>Dados Do Proponente</h3></center>
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF</b>
    <input type="text" name="doc_proponente" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" class="" required="required" value="<? echo $row_cpf['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="cel_prop" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Cargo/Função</b>
    <input type="text" name="cargo" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Instituição</b>
    <input type="text" name="inst" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Sociedade(s) de Filiação do Proponente</b>
    <input type="text" name="soc_proponente" class="" required="required" value="<? echo $row_cpf['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
</div>




<div class="ls-box-filter">
<center><h3>Dados Da Conferência</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">TÍTULO (informe o título em inglês se for convidado estrangeiro)</b>
    <input type="text" name="titulo" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome_conf" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf" class="" placeholder="" required="required" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email_conf" class="" required="required" value="<? echo $row_cpf['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="tel" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['tel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Departamento</b>
    <input type="text" name="depto_conf" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Instituição</b>
    <input type="text" name="inst_conf" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Endereço</b>
    <input type="text" name="end" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Código Postal</b>
    <input type="text" name="codigo_postal" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">País</b>
    <input type="text" name="pais" class="" required="required" value="<? echo $row_cpf['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />
<fieldset>
    <label class="ls-label col-md-7">
      <b class="ls-label-text">Justificativa</b>
      <textarea name="justif" data-ls-module="charCounter" rows="4" maxlength="400"></textarea>
    </label>
</fieldset>
<br />
<fieldset>
<b>Tem interesse em divulgar seu trabalho na mídia e aceita dar entrevista?</b><br /><br />
<label class="ls-label-text">
<input type="radio" value="sim" checked="checked" name="midia" class="ls-field-radio" /> SIM 
</label>
<br /><br />
<label class="ls-label-text">
<input type="radio" value="nao" name="midia" class="ls-field-radio" />NÃO
</label>
</fieldset>
<br />
<fieldset>
      <INPUT TYPE="checkbox" NAME="ciencia_insc" VALUE="1">&nbsp;&nbsp;<b>Declaro que tenho ciência que deverei fazer a minha inscrição para participar da Reunião Anual da FeSBE, caso a presente proposta seja aceita.</b>
</fieldset>
<br />
<fieldset>
     <INPUT TYPE="checkbox" NAME="ciencia_dados" VALUE="2">&nbsp;&nbsp;<b>Concordo e responsabilizo-me por todas as informações contidas no presente formulário. Caso a presente proposta seja aceita, comprometo-me a participar de outras atividades da reunião da FeSBE, se convocado, tais como avaliação de painéis e coordenação de sessões científicas. 
</fieldset>
<br />
<fieldset>
      <INPUT TYPE="checkbox" NAME="ciencia_declaracao" VALUE="2">&nbsp;&nbsp;<b>Declaro também que informei aos demais membros desta proposta acerca desses compromissos com a reunião da FeSBE, e de que a FeSBE não financia custos com passagens nacionais, propondo-se a financiar 2 diárias em quarto duplo, considerando o financiamento que vier obter para a XXXII Reunião Anual. Informados desses pontos, declaro que os demais membros da proposta com eles concordaram.</b><br />
</fieldset>
<div class=""></div>
    <button class="ls-btn">Enviar</button>
</div>
</div>

</form>

</body>
</html>