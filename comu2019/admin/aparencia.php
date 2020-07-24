<h1 class="ls-title-intro ls-ico-dashboard">Dados do Evento</h1>
<div class="ls-box-filter">
  <fieldset>
 <form action="principal_admin.php?pg=salva_aparencia.php" class="ls-form row" method="POST">
    <label class="ls-label col-md-5">
      <b class="ls-label-text">Cores</b>
      <div class="ls-custom-select">
        <select class="ls-custom" name="cor">
            <option value=''>Selecione</option>
            <option value='ls-theme-dark-yellow'>Amarelo Escuro</option>
            <option value='ls-theme-yellow-gold'>Amarelo Ouro</option>
            <option value='ls-theme-blue'>Azul</option>
            <option value='ls-theme-indigo'>Azull Índigo</option>
            <option value='ls-theme-turquoise'>Azul Turquesa</option>
            <option value='ls-theme-light-blue'>Azul Claro</option>
            <option value='ls-theme-gray'>Cinza</option>
            <option value='ls-theme-gold'>Dourado</option>
            <option value='ls-theme-orange'>Laranja</option>
            <option value='ls-theme-light-brown'>Marrom Claro</option>
            <option value='ls-theme-purple'>Roxo</option>
            <option value='ls-theme-green'>Verde</option>
            <option value='ls-theme-light-green'>Verde Claro</option>
            <option value='ls-theme-green-lemon'>Verde Limão</option>
            <option value='ls-theme-moss'>Verde Musgo</option>
            <option value='ls-theme-light-red'>Vermelho Claro</option>
        </select>
      </div>
     <div class="ls-actions-btn">
        <button class="ls-btn">Salvar</button>
        </div>    
    </label>
    </form>
   </fieldset>
</div>

<div class="ls-box-filter">
<fieldset>
 <form action="principal_admin.php?pg=salva_dados.php&div=2" class="ls-form row ls-form-horizontal" method="POST">
    <label class="ls-label col-md-6">
        <b class="ls-label-text">Nome do Evento</b>
        <input type="text" name="nome_evento" placeholder="" value="<? echo $row_evento['nome_evento']; ?>" required >
    </label>
    <label class="ls-label col-md-4">
        <b class="ls-label-text">Sigla do Evento</b>
        <input type="text" name="sigla_evento" placeholder="" value="<? echo $row_evento['sigla']; ?>" required >
    </label>
    <label class="ls-label col-md-4">
        <b class="ls-label-text">Local do Evento</b>
        <input type="text" name="local_evento" placeholder="" value="<? echo $row_evento['local']; ?>" required >
    </label>
    <label class="ls-label col-md-3">
        <b class="ls-label-text">Data Início Evento</b>
        <input type="date" name="inicio" placeholder="" value="<? echo $row_evento['inicio']; ?>" required >
    </label>
    <label class="ls-label col-md-3">
        <b class="ls-label-text">Data Fim Evento</b>
        <input type="date" name="fim" placeholder="" value="<? echo $row_evento['fim']; ?>" required >
    </label>

    <label class="ls-label col-md-5">
        <button class="ls-btn">Salvar</button>
    </label>
 </form>
</fieldset>
 </div>
 
 
 
 <div class="ls-box-filter">
<fieldset>
 <form action="principal_admin.php?pg=salva_dados.php&div=3" class="ls-form row ls-form-horizontal" method="POST">
    <label class="ls-label col-md-3">
        <b class="ls-label-text">Inicio Inscrições</b>
        <input type="date" name="inicio_inscricao" placeholder="" value="<? echo $row_evento['dia_ini_insc']; ?>" required >
    </label>
    <label class="ls-label col-md-3">
        <b class="ls-label-text">Fim Inscrições</b>
        <input type="date" name="fim_inscricao" placeholder="" value="<? echo $row_evento['dia_fim_insc']; ?>" required >
    </label>
    <label class="ls-label col-md-4">
        <b class="ls-label-text">Número de Trabalhos por Inscrição</b>
        <input type="text" name="num_trabalhos" placeholder="" value="<? echo $row_evento['num_trabalhos']; ?>" required >
    </label>
        
    <label class="ls-label col-md-9">
        <button class="ls-btn" align="left">Salvar</button>
    </label>
 </form>
</fieldset>
 </div>