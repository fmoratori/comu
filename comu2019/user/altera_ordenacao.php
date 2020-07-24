<?
$id_trabalho = $_GET['id_trabalho'];
$id_autor = $_GET['id_autor'];
$sql_instituicao = "SELECT * FROM tb_instituicao WHERE trabalho_id=$id_trabalho";
$res_instituicao = mysqlexecuta($id,$sql_instituicao);
?>
<?
    $sql_autores = "SELECT * FROM tb_autores WHERE trabalho_id=$id_trabalho ORDER BY `ordenacao` ASC";
    $res_autores = mysqlexecuta($id,$sql_autores);

?>
  <p>  <div class="ls-alert-success">Preencha o campo Ordem com valores entre 1 e 99.</div></p>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
    <th class="hidden-xs" width='15%'>Ordem</th>
    <th>&nbsp;</th>
      <th class="hidden-xs">Nome</th>
      <th class="hidden-xs">E-mail</th>
      <th>Nome Cient&iacute;fico</th>      
      <!--th class="hidden-xs">Filia&ccedil;&atilde;o</th--->      
      <th></th>  
    </tr>
  </thead>
  <tbody>
<?
$x=0;
    while($row_autores = mysql_fetch_array($res_autores)){
        $inst_autor = $row_autores['inst1'];
        $sql_inst_autor = "SELECT * FROM tb_instituicao WHERE id = $inst_autor";
        $res_inst_autor = mysqlexecuta($id,$sql_inst_autor);
        $row_inst_autor = mysql_fetch_array($res_inst_autor);
        $autor ='';
        $autor = $row_autores['id'];
        if($row_autores['ordenacao']==100){
            $disabled = "disabled = 'disabled'";
        }
?>
    <tr>
      <td>
      <label class="ls-label col-md-7">
      <form action="./principal.php?pg=salva_ordem.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $autor; ?>" class="ls-form ls-form-horizontal" method="POST">
      <input type="text" name="<? echo $row_autores['id']; ?>" <? echo $disabled; ?> value="<? echo $row_autores['ordenacao']; ?>" required>
        </label>
        </td>
        <td>
    <?
    if($row_autores['ordenacao']==100){
      echo "<b>Orientador possui ordenação fixa.</b>";  
    }
    else{
    echo    "<button class='ls-btn'>Salvar</button>";
        
    }
    ?>
      </form>

    </td>    
      <td><? echo $row_autores['nome']; ?></td>
      <td><? echo $row_autores['email']; ?></td>
      <td><? echo $row_autores['nome_cientifico']; ?></td>
      <!--td><? // echo $row_inst_autor['depto'].'/'.$row_inst_autor['inst'].'/'.$row_inst_autor['sigla_inst']; ?></td--->
<?
    if($row_autores['ordenacao']==100){
        ?>
              <td><B>ORIENTADOR</B></td>
        <?
    }
    else{
?>
      <td>
     </td>
<?
}
?>
    </tr>
<?              
$x++;
    }
?>
  </tbody>
</table>
<a href="./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Voltar</a>