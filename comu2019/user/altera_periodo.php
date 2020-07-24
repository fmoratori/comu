<form id="form1" action="./principal.php?pg=salva_periodo.php" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">

  <fieldset>
    <div class="ls-label col-md-12">
      <label class="ls-label col-md-12">
      <h1><center><b class="ls-label-text">Ano que est&aacute; Cursando</b></center></h1><br />
</label>
      <label class="ls-label-text">
      <?
      $selected12='';
      if($row_usuario['periodo']==1){
        $selected12 = "checked='checked'"; 
      }
      ?>
        <input type="radio" value="1" <? echo $selected12 ;?> name="periodo">
        1&nbsp;&nbsp;&nbsp;
      </label>
      
      <label class="ls-label-text">
            <?
      $selected12='';
      if($row_usuario['periodo']==2){
        $selected12 = "checked='checked'";  
      }
      ?>
        <input type="radio" value="2" <? echo $selected12 ;?>  name="periodo">
        2&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
            <?
      $selected12='';
      if($row_usuario['periodo']==3){
        $selected12 = "checked='checked'"; 
      }
      ?>
        <input type="radio" value="3"  <? echo $selected12 ;?> name="periodo">
        3&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
            <?
      $selected12='';
      if($row_usuario['periodo']==4){
        $selected12 = "checked='checked'"; 
      }
      ?>
        <input type="radio" value="4" <? echo $selected12 ;?> name="periodo">
        4&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
            <?
      $selected12='';
      if($row_usuario['periodo']==5){
        $selected12 = "checked='checked'";  
      }
      ?>
        <input type="radio" value="5" name="periodo" <? echo $selected12 ;?>  required="required">
        5&nbsp;&nbsp;&nbsp;
      </label>
      <label class="ls-label-text">
            <?
      $selected12='';
      if($row_usuario['periodo']==6){
        $selected12 = "checked='checked'"; 
      }
      ?>
        <input type="radio" value="6" name="periodo" <? echo $selected12 ;?> required="required">
        6&nbsp;&nbsp;&nbsp;
      </label>
  </fieldset>


  
<div class=""></div>
    <button class="ls-btn">Salvar</button>
</div>