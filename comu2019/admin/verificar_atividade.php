<h1 class="ls-title-intro ls-ico-accessibility">Listar Atividades</h1>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th class="hidden-xs">Sala</th>
      <th>Vagas</th>
      <th class="hidden-xs">Sessão</th>
      <th>Valor</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
<?
$sql_atividades = "SELECT * FROM tb_atividades";
$res_atividades = mysqlexecuta($id,$sql_atividades);
   while($row_atividades = mysql_fetch_array($res_atividades)){
    $id_atividade = $row_atividades['id'];
        echo "<tr>";
        echo "<td>".utf8_encode($row_atividades['nome'])."</td>";
        echo "<td>".$row_atividades['sala']."</td>";
        echo "<td>".$row_atividades['capacidade']."</td>";
        echo "<td>".$row_atividades['sessao']."</td>";
        echo "<td>".$row_atividades['valor']."</td>";
        echo "<td>"."<a href='./principal_admin.php?pg=editar_atividade.php&id_atividade=$id_atividade' class='ls-ico-pencil'>"."</td>";
   }
?>