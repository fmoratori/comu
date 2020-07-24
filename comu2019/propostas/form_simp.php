

<h1 class="ls-title-intro ls-ico-home">Proposta Simp&oacute;sio</h1>
<div class="ls-box">
<br />
<p><!--XXXII Reuni&atilde;o Anual da Federa&ccedil;&atilde;o de Sociedades de Biologia Experimental (--->Os simp&oacute;sios ter&atilde;o 25 minutos cada apresenta&ccedil;&atilde;o + 5 de discuss&atilde;o. N&atilde;o podendo ultrapassar o per&iacute;odo de 2 horas.<!--)--></p>
</div>	
<form id="form1" action="./propostas.php?pg=envia_simp.php" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
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
    <input type="text" name="celular" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Cargo/Fun&ccedil;&atilde;o</b>
    <input type="text" name="cargo" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Sociedade(s) de Filia&ccedil;&atilde;o do Proponente</b>
    <input type="text" name="soc_proponente" class="" required="required" value="<? echo $row_cpf['soc_proponente']; ?>" > 
  </label>  
</fieldset>
</div>


<div class="ls-box-filter">
<center><h3>Dados Do Coordenador</h3></center>

<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome_coord" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_coord" class="" placeholder="" required="required" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email_coord" class="" required="required" value="<? echo $row_cpf['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="tel_coord" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="cel_coord" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Departamento</b>
    <input type="text" name="depto_coord" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_coord" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
  
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Endere&ccedil;o</b>
    <input type="text" name="end_coord" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_coord" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_coord" class="" required="required" value="<? echo $row_cpf['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
</div>






<div class="ls-box-filter">
<center><h3>Dados Do Simp&oacute;sio</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo Do Simp&oacute;sio</b>
    <input type="text" name="titulo_geral" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<br />
<center><h3>Aula 1</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_1" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome_conf_1" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_1" class="" placeholder="" required="required" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email_conf_1" class="" required="required" value="<? echo $row_cpf['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="tel_1" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="cel_1" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Departamento</b>
    <input type="text" name="depto_conf_1" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_1" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Endere&ccedil;o</b>
    <input type="text" name="end_1" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_1" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_1" class="" required="required" value="<? echo $row_cpf['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />
<br />
<center><h3>Aula 2</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_2" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome_conf_2" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_2" class="" placeholder="" required="required" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email_conf_2" class="" required="required" value="<? echo $row_cpf['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="tel_2" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="cel_2" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Departamento</b>
    <input type="text" name="depto_conf_2" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_2" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Endere&ccedil;o</b>
    <input type="text" name="end_2" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_2" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_2" class="" required="required" value="<? echo $row_cpf['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />
<br />
<center><h3>Aula 3</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_3" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome_conf_3" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_3" class="" placeholder="" required="required" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email_conf_3" class="" required="required" value="<? echo $row_cpf['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="tel_3" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="cel_3" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Departamento</b>
    <input type="text" name="depto_conf_3" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_3" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Endere&ccedil;o</b>
    <input type="text" name="end_3" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_3" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_3" class="" required="required" value="<? echo $row_cpf['sociedade_prop']; ?>" > 
  </label>  
</fieldset>




<br />
<br />
<center><h3>Aula 4</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_4" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome_conf_4" class="" required="required" value="<? echo $row_cpf['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_4" class="" placeholder="" required="required" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email_conf_4" class="" required="required" value="<? echo $row_cpf['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="tel_4" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_cpf['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="cel_4" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_cpf['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Departamento</b>
    <input type="text" name="depto_conf_4" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_4" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Endere&ccedil;o</b>
    <input type="text" name="end_4" class="" required="required" value="<? echo $row_cpf['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_4" class="" required="required" value="<? echo $row_cpf['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_4" class="" required="required" value="<? echo $row_cpf['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />
<br />
<fieldset>
    <label class="ls-label col-md-7">
      <b class="ls-label-text">Justificativa</b>
      <textarea name="justif" data-ls-module="charCounter" rows="4" maxlength="400"></textarea>
    </label>
</fieldset>
<br />
<fieldset>
<b>Tem interesse em divulgar seu trabalho na m&iacute;dia e aceita dar entrevista?</b><br /><br />
<label class="ls-label-text">
<input type="radio" value="sim" checked="checked" name="midia" class="ls-field-radio" /> SIM 
</label>
<br /><br />
<label class="ls-label-text">
<input type="radio" value="nao" name="midia" class="ls-field-radio" />N&atilde;O
</label>
</fieldset>
<br />
<fieldset>
      <INPUT TYPE="checkbox" NAME="ciencia_insc" VALUE="1">&nbsp;&nbsp;<b>Declaro que tenho ci&ecirc;ncia que deverei fazer a minha inscri&ccedil;&atilde;o para participar da Reuni&atilde;o Anual da FeSBE, caso a presente proposta seja aceita.</b>
</fieldset>
<br />
<fieldset>
     <INPUT TYPE="checkbox" NAME="ciencia_dados" VALUE="2">&nbsp;&nbsp;<b>Concordo e responsabilizo-me por todas as informa&ccedil;&otilde;es contidas no presente formul&aacute;rio. Caso a presente proposta seja aceita, comprometo-me a participar de outras atividades da reuni&atilde;o da FeSBE, se convocado, tais como avalia&ccedil;&atilde;o de pain&eacute;is e coordena&ccedil;&atilde;o de sess&otilde;es cient&iacute;ficas. 
</fieldset>
<br />
<fieldset>
      <INPUT TYPE="checkbox" NAME="ciencia_declaracao" VALUE="2">&nbsp;&nbsp;<b>Declaro tamb&eacute;m que informei aos demais membros desta proposta acerca destes compromissos com a reuni&atilde;o da FeSBE, com o qual concordaram.</b><br />
</fieldset>
<div class=""></div>
    <button class="ls-btn">Enviar</button>
</div>
</div>

</form>

</body>
</html>