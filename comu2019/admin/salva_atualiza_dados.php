<?
$ponto = '.';
$traco = '-';
$cpf = $_POST['cpf'];
$cpf = str_replace($ponto, '', $cpf);
$cpf = str_replace($traco, '', $cpf);
$nome = ucwords($_POST['nome']);
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$senha = $_POST['senha1'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$departamento = $_POST['departamento'];
$instituto = $_POST['instituto'];
$instituicao = $_POST['instituicao'];
$id_usuario = $_GET['id_inscrito'];
$sql_atualiza_inscricao = "UPDATE `tb_usuario` SET `nome`='$nome', `cpf`='$cpf', `email`='$email', `telefone`='$telefone', `celular`='$celular', `senha`='$senha', `cep`='$cep', `endereco`='$rua', `numero`='$numero', `complemento`='$complemento', `bairro`='$bairro', `cidade`='$cidade', `estado`='$estado', `departamento`='$departamento', `instituto`='$instituto', `instituicao`='$instituicao', `categoria_valida`='P' WHERE id = $id_usuario";
//echo $sql_atualiza_inscricao;
//break;
$res_atualiza_inscricao = mysqlexecuta($id,$sql_atualiza_inscricao);
if($res_atualiza_inscricao){
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=dados_inscrito.php&id_inscrito=<? echo $id_usuario; ?>">
<?
}
?>
