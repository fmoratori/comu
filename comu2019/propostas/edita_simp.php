<h1 class="ls-title-intro ls-ico-home">Proposta Simpósio</h1>

<?
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php"; // Executa a clausula SQL
$valida = $_GET['valida'];
$sql = "SELECT * FROM `tb_propostas_simp_2018` where valida LIKE '$valida'";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res)
?>
<div class="ls-box">
<!--h5 class="ls-title-3">Formulário de envio de sugest&atilde;o de m&oacute;dulo tem&aacute;tico</h5-->
<br />


<div class="ls-box">
<br />
<p>Os simp&oacute;sios ter&atilde;o 25 minutos cada apresenta&ccedil;&atilde;o + 5 de discuss&atilde;o. N&atilde;o podendo ultrapassar o per&iacute;odo de 2 horas.</p>

<form id="form2" action="./envia_simp.php" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
<div class="ls-box-filter">
<center><h3>Dados Do Proponente</h3></center>
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome" class="" required="required" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF</b>
    <input type="text" name="doc_proponente" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" value="<? echo $row['doc_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" class="" required="required" value="<? echo $row['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="celular" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Cargo/Fun&ccedil;&atilde;o</b>
    <div class="ls-custom-select">
        <select name="cargo" class="ls-select">
          <option value="Cargo">Cargo/Função</option>
          <option value="Professor">Professor</option>
          <option value="Pós-Doutorando">Pós-Doutorando</option>
          <option value="Pesquisador-Doutor">Pesquisador-Doutor</option>
        </select>
        </div>
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst" class="" required="required" value="<? echo $row['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Sociedade(s) de Filia&ccedil;&atilde;o do Proponente</b>
          <div class="ls-custom-select">
        <select name="sociedade" class="ls-select">
<?
$sql_sociedades = "SELECT * FROM tb_sociedades";
$res_sociedades = mysqlexecuta($id,$sql_sociedades);
    echo "<option value='14'>".'Sociedade Filiada'."</option><br />";
    while($row_sociedades=mysql_fetch_array($res_sociedades)){
        //echo "<option value='14'>"."1"."</option>";
        echo "<option value='".$row_sociedades['nome']."'>".utf8_encode($row_sociedades['nome'])."</option>";
    }
?>
        </select>
      </div>
  </label>  
</fieldset>
</div>


<div class="ls-box-filter">
<center><h3>Dados Do Coordenador</h3></center>
<br /><br /><br /><br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text" id="txtt1">Nome Completo</b>
    <input type="text" id="txtt2" name="nome_coord" class="" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="txtt3">Documento (CPF ou Passaporte)</b>
    <input type="text" id="txtt4" name="doc_coord" class="" placeholder="" value="<? echo $row['doc_coord']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="txtt5">E-mail</b>
    <input type="email" id="txtt6" name="email_coord" class="" value="<? echo $row['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="txtt7">Telefone</b>
    <input type="text" id="txtt8" name="tel_coord" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" value="<? echo $row['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="txtt9">Celular</b>
    <input type="text" id="txtt10" name="cel_coord" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" value="<? echo $row['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="txtt11">Departamento</b>
    <input type="text" id="txtt12" name="depto_coord" class="" value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="txtt13">Institui&ccedil;&atilde;o</b>
    <input type="text" id="txtt14" name="inst_coord" class="" value="<? echo $row['inst_prop']; ?>" > 
  </label>
  
</fieldset>
<br />
</div>






<div class="ls-box-filter">
<center><h3>Dados Do Simp&oacute;sio</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo Do Simp&oacute;sio</b>
    <input type="text" name="titulo_geral" class="" required="required" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<br />
<center><h3>Palestra 1</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_1" class="" required="required" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset><label class="col-md-8"><input type="checkbox" name="igual_prop2" value="dif" onclick="ocultarMostrar5(this)">Palestrante <b>não</b> é o proponente.</label></fieldset>
<br />
<fieldset>

<label class="ls-label col-md-4">
    <b class="ls-label-text" id="ttxtttt1">Nome Completo</b>
    <input type="text" name="nome_conf_1" id="ttxtttt2" class="" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="ttxtttt3">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_1" id="ttxtttt4" class="" placeholder="" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="ttxtttt5">E-mail</b>
    <input type="email" name="email_conf_1" id="ttxtttt6" class="" value="<? echo $row['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="ttxtttt7">Telefone</b>
    <input type="text" name="tel_1" id="ttxtttt8" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" value="<? echo $row['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text"id="ttxtttt9">Celular</b>
    <input type="text" name="cel_1" id="ttxtttt10" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" value="<? echo $row['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="ttxtttt11">Departamento</b>
    <input type="text" name="depto_conf_1" id="ttxtttt12" class="" value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="ttxtttt13">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_1" id="ttxtttt14" class="" value="<? echo $row['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<!--
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="ttxtttt15">Endere&ccedil;o</b>
    <input type="text" name="end_1" id="ttxtttt16" class=""  value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="ttxtttt17">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_1" class=""  value="<? echo $row['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_1" class=""  value="<? echo $row['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />
---->
<br />
<center><h3>Palestra 2</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_2" class="" required="required" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset><label class="col-md-8"><input type="checkbox" name="igual_prop3" value="dif" onclick="ocultarMostrar6(this)">Palestrante <b>não</b> é o proponente.</label></fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text" id="tttxtttt1">Nome Completo</b>
    <input type="text" id="tttxtttt2" name="nome_conf_2" class="" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="tttxtttt3">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_2" id="tttxtttt4" class="" placeholder="" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="tttxtttt5">E-mail</b>
    <input type="email" name="email_conf_2" id="tttxtttt6" class="" value="<? echo $row['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="tttxtttt7" >Telefone</b>
    <input type="text" name="tel_2" id="tttxtttt8" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" value="<? echo $row['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="tttxtttt9">Celular</b>
    <input type="text" name="cel_2" id="tttxtttt10" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" value="<? echo $row['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="tttxtttt11">Departamento</b>
    <input type="text" name="depto_conf_2" id="tttxtttt12" class="" value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="tttxtttt13">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_2" id="tttxtttt14" class="" value="<? echo $row['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<!---
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="tttxtttt15">Endere&ccedil;o</b>
    <input type="text" name="end_2" id="tttxtttt16" class=""  value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_2" class=""  value="<? echo $row['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_2" class=""  value="<? echo $row['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />-->
<br />
<center><h3>Palestra 3</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_3" class="" required="required" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset><label class="col-md-8"><input type="checkbox" name="igual_prop4" value="dif" onclick="ocultarMostrar7(this)">Palestrante <b>não</b> é o proponente.</label></fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text" id="ttttxtttt1">Nome Completo</b>
    <input type="text" name="nome_conf_3" id="ttttxtttt2" class="" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="ttttxtttt3">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_3" id="ttttxtttt4" class="" placeholder="" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="ttttxtttt5">E-mail</b>
    <input type="email" id="ttttxtttt6" name="email_conf_3" class="" value="<? echo $row['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="ttttxtttt7">Telefone</b>
    <input type="text" name="tel_3" id="ttttxtttt8" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" value="<? echo $row['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="ttttxtttt9">Celular</b>
    <input type="text" name="cel_3" id="ttttxtttt10" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" value="<? echo $row['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="ttttxtttt11">Departamento</b>
    <input type="text" name="depto_conf_3" id="ttttxtttt12" class="" value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="ttttxtttt13">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_3" id="ttttxtttt14" class="" value="<? echo $row['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<!---
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text">Endere&ccedil;o</b>
    <input type="text" name="end_3" class=""  value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_3" class=""  value="<? echo $row['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_3" class=""  value="<? echo $row['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />
-->
<br />
<center><h3>Palestra 4</h3></center>
<br />
<fieldset>
<label class="ls-label col-md-6">
    <b class="ls-label-text">T&iacute;tulo</b>
    <input type="text" name="titulo_4" class="" required="required" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset><label class="col-md-8"><input type="checkbox" name="igual_prop5" value="dif2" onclick="ocultarMostrar8(this)">Palestrante <b>não</b> é o proponente.</label></fieldset>
<br />
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text" id="tttttxtttt1">Nome Completo</b>
    <input type="text" name="nome_conf_4" id="tttttxtttt2" class="" value="<? echo $row['nome_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="tttttxtttt3">Documento (CPF ou Passaporte)</b>
    <input type="text" name="doc_conf_4" id="tttttxtttt4" class="" placeholder="" value="<? echo $cpf; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text" id="tttttxtttt5">E-mail</b>
    <input type="email" name="email_conf_4" id="tttttxtttt6" class="" value="<? echo $row['email_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="tttttxtttt7">Telefone</b>
    <input type="text" name="tel_4" id="tttttxtttt8" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" value="<? echo $row['tel_prop']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text" id="tttttxtttt9">Celular</b>
    <input type="text" name="cel_4" id="tttttxtttt10" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" value="<? echo $row['cel_prop']; ?>" > 
  </label>
</fieldset>
<br />
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="tttttxtttt11">Departamento</b>
    <input type="text" name="depto_conf_4" id="tttttxtttt12" class="" value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="tttttxtttt13">Institui&ccedil;&atilde;o</b>
    <input type="text" name="inst_conf_4" id="tttttxtttt14" class="" value="<? echo $row['inst_prop']; ?>" > 
  </label> 
</fieldset>
<br />
<!---
<fieldset>
<label class="ls-label col-md-5">
    <b class="ls-label-text" id="tttttxtttt15">Endere&ccedil;o</b>
    <input type="text" name="end_4" class="" id="tttttxtttt1" required="required" value="<? echo $row['cargo']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">C&oacute;digo Postal</b>
    <input type="text" name="codigo_postal_4" class=""  value="<? echo $row['inst_prop']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">Pa&iacute;s</b>
    <input type="text" name="pais_4" class=""  value="<? echo $row['sociedade_prop']; ?>" > 
  </label>  
</fieldset>
<br />--->
<br />
<fieldset>
    <label class="ls-label col-md-7">
      <b class="ls-label-text">Resumo/Linhas Gerais</b>
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
</b>




</div>

</form>

</body>
</html>