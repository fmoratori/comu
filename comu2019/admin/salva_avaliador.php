<?
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
while($x<31){
    if(isset($_POST[$x])){
        if($area==''){
            $area = $x.',';
        }
        else{
        $area = $area.$x.',';
        }
    }
    $x++;
}

if($nome!="" && $email!="" && $senha!=""){
	$count = mysql_query("SELECT COUNT(*) FROM `tb_avaliador` WHERE email LIKE '$email'");
	$inscritos =  mysql_result($count, 0);
	if($inscritos<=0){
$sql="INSERT INTO `tb_avaliador` SET `nome`='$nome',`email`='$email',`senha`='$senha',`area_avaliacao`='$area'";	
$res = mysqlexecuta($id,$sql);
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=cadastrar_avaliador.php&ver=1">
<?
	}
	else{
	echo "Já existe avaliador com esse e-mail($nome, $email, $senha)";
	}
	}
	else{
	echo "Existe campo não preenchido";	
	}
?>
