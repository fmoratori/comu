<?
$id_avaliador = $_GET['id_avaliador'];
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
$sql="UPDATE `tb_avaliador` SET `nome`='$nome',`email`='$email',`senha`='$senha',`area_avaliacao`='$area' WHERE id = $id_avaliador";	
$res = mysqlexecuta($id,$sql);
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=editar_avaliador.php&ver=1&id_aval=<? echo $id_avaliador; ?>">
<?
	}
	else{
	echo "Existe campo não preenchido";	
	}
?>
