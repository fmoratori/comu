<?
session_start();
$ver = $_GET['ver'];

if($ver=='s1'){
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$login = $_SESSION['cpf_nova_inscricao'];
$senha = $_SESSION['senha_nova_inscricao'];
$val = base64_encode($login);
$sql = "SELECT * FROM tb_avaliador WHERE email LIKE '$login'";
$res = mysqlexecuta($id,$sql);


				while($row = mysql_fetch_array($res)){
					if($row['email']==$login && $row['senha']==$senha){
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION['usuario'] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">

<?							break;

						}

						else{
							if($row['cpf']==$login && $row['senha']==$senha){
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION["usuario"] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">

<?							break;
								}

							}			
                }
}


if($ver=='s'){
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$login = $_POST['login'];
$senha = $_POST['senha'];
$val = base64_encode($login);
$sql = "SELECT * FROM tb_avaliador WHERE email LIKE '$login'";
$res = mysqlexecuta($id,$sql);

				while($row = mysql_fetch_array($res)){
					if($row['email']==$login && $row['senha']==$senha){
                            session_start();
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION['usuario'] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
echo $login." - ".$senha;
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">

<?							break;

						}

						else{
							if($row['cpf']==$login && $row['senha']==$senha){
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION["usuario"] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">

<?							break;
								}

							}			
                }
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../user/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../user/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../user/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php?ver=s" autocomplete="on" method="POST"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > CPF ou E-mail </label>
                                    <input id="username" name="login" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Senha </label>
                                    <input id="password" name="senha" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Manter Logado?</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                              
                            </form>
                        </div>

						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>