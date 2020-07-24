<h1 class="ls-title-intro ls-ico-accessibility">Criar Sessões</h1>

<div class="ls-box-filter">

  <form action="principal_admin.php?pg=salva_sessao.php" class="ls-form-horizontal" method="POST">
<fieldset>
  <label class="ls-label col-md-6" role='search'>
        <b class="ls-label-text">Nome da Sessão</b>
        <input type="text" name="nome_sessao" placeholder="" value="">
    </label>

  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Sigla da Sessão</b>
        <input type="text" name="sigla_sessao" placeholder="" value="">
    </label>
 </fieldset>
 <hr>  
<fieldset>
  <label class="ls-label ls-label-row col-md-3" role='search'>
        <b class="ls-label-text">Data Início</b>
        <input type="date" name="data_inicio" placeholder="" value="">
    </label>

  <label class="ls-label ls-label-row col-md-3" role='search'>
        <b class="ls-label-text">Data Fim</b>
        <input type="date" name="data_fim" placeholder="" value="">
    </label>
 </fieldset>   
<hr>
<fieldset>
  <label class="ls-label ls-label-row col-md-3" role='search'>
        <b class="ls-label-text">Hora Início</b>
        <input type="time" name="hora_inicio" placeholder="" value="">
    </label>

  <label class="ls-label ls-label-row col-md-3" role='search'>
        <b class="ls-label-text">Hora Fim</b>
        <input type="time" name="hora_fim" placeholder="" value="">
    </label>
 </fieldset>   
<hr>
<fieldset>
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Inserir</button>
    </label>
</fieldset>
  </form>
</div>
