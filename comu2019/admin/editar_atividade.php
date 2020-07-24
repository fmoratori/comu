<?
$id_atividade = $_GET['id_atividade'];
    $sql_atividade = "SELECT * FROM tb_atividades WHERE `id`=$id_atividade";
    $res_atividade = mysqlexecuta($id,$sql_atividade);
    $row_atividade = mysql_fetch_array($res_atividade);

?>

<h1 class="ls-title-intro ls-ico-accessibility">Editar Atividades</h1>
<div class="ls-box-filter">
  <form action="principal_admin.php?pg=salva_edita_atividade.php&id_atividade=<? echo $id_atividade; ?>" class="ls-form-horizontal" method="POST">
<fieldset>
      <label class="ls-label col-md-5" role='search'>
      <b class="ls-label-text">Sessão</b>
      <div class="ls-custom-select">
        <select name="sessao" class="ls-select">
          <option value="<? echo $row_sessao['sessao']; ?>"><? echo utf8_encode($row_sessao['nome']); ?></option>        
<?
    $sql_sessao = "SELECT * FROM tb_sessao";
    $res_sessao = mysqlexecuta($id,$sql_sessao);
    while($row_sessao = mysql_fetch_array($res_sessao)){
?>
          <option value="<? echo $row_sessao['id']; ?>"><? echo utf8_encode($row_sessao['nome']); ?></option>
<?
    }
?>        
        </select>
      </div>
      </label>
 </fieldset>
 <hr>
<fieldset>
  <label class="ls-label col-md-8" role='search'>
        <b class="ls-label-text">Nome da Atividade</b>
        <input type="text" name="texto" placeholder="" value="<? echo utf8_encode($row_atividade['nome']); ?>">
    </label>
 </fieldset>
 <hr>  
<fieldset>
  <label class="ls-label ls-label-row col-md-6" role='search'>
        <b class="ls-label-text">Nome da Sala</b>
        <input type="text" name="sala" placeholder="" value="<? echo $row_atividade['sala']; ?>">
    </label>

  <label class="ls-label ls-label-row col-md-2" role='search'>
        <b class="ls-label-text">Vagas</b>
        <input type="number" name="vagas" placeholder="" value="<? echo $row_atividade['capacidade']; ?>">
    </label>


  <label class="ls-label ls-label-row col-md-2" role='search'>
        <b class="ls-label-text">Valor</b>
        <input type="number" name="valor" placeholder="" value="<? echo $row_atividade['valor']; ?>">
    </label>


 </fieldset>   
<hr>
<fieldset>
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Alterar</button>
    </label>
</fieldset>
  </form>
</div>
