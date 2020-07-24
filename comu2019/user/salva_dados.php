<?
$ponto = '.';
$traco = '-';
//$cpf = $_POST['cpf'];
//$cpf = str_replace($ponto, '', $cpf);
//$cpf = str_replace($traco, '', $cpf);
$nome = ucwords($_POST['nome']);
$nome_cracha = ucwords($_POST['nome_cracha']);
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$senha = $_POST['senha1'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$periodo = $_POST['periodo'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$curso = $_POST['curso'];
$departamento = $_POST['departamento'];
$instituto = $_POST['instituto'];
$instituicao = $_POST['instituicao'];
$cpf_altera_dados = $row_usuario['cpf'];
$sociedade = $_POST['sociedade'];

$sql_salva_alteracao = "UPDATE `tb_usuario` SET `nome`='$nome', `nome_cracha`='$nome_cracha', `email`='$email', `periodo`='$periodo', `telefone`='$telefone', `celular`='$celular', `senha`='$senha', `cep`='$cep', `endereco`='$rua', `numero`='$numero', `complemento`='$complemento', `bairro`='$bairro', `cidade`='$cidade', `estado`='$estado',`curso`='$curso',`departamento`='$departamento',`instituto`='$instituto',`instituicao`='$instituicao',`categoria_valida`='P', `sociedade_filiada`='$sociedade' WHERE `cpf`=$cpf_altera_dados";
$res_salva_alteracao = mysqlexecuta($id,$sql_salva_alteracao);
if($res_salva_alteracao){
    echo "DADOS SALVOS";
  // exit();
    ?>
<meta http-equiv="refresh" content="0; url=./principal.php?pg=alterar_dados.php&ver=s2">
<?
}
?>

</form>