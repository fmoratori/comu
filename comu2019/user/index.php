<meta http-equiv="refresh" content=0;url="./login.php">
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
<!DOCTYPE html>
<html class="ls-theme-dark-yellow">
  <head>
    <title>FMSYS</title>

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <!--meta charset="UTF-8"-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Sistema Para eventos">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
<body class="documentacao documentacao_exemplos documentacao_exemplos_login-screen documentacao_exemplos_login-screen_index">
<div class="ls-login-parent">
  <div class="ls-login-inner">
    <div class="ls-login-container">
      <div class="ls-login-box">
  <h1 class="ls-login-logo">Regional FeSBE 2018<!--img title="Regional FeSBE 2018" src="" /--></h1>
  <form role="form" class="ls-form ls-login-form" action="login.php">
    <fieldset>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Usuário</b>
        <input class="ls-login-bg-user ls-field-lg" id="username" name="username" required="required" type="text" placeholder="Usuário" required autofocus>
      </label>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Senha</b>
        <div class="ls-prefix-group ls-field-lg">
          <input id="password" name="password" required="required" class="ls-login-bg-password" type="password" placeholder="Senha" required>
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
        </div>
      </label>

      <p><a class="ls-login-forgot" href="./register.php?pg=form_recuperar_senha.php">Esqueci minha senha</a></p>

      <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">
      <p class="ls-txt-center ls-login-signup">Não possui um usuário na Locaweb? <a href="#">Cadastre-se agora</a></p>

    </fieldset>
  </form>
</div>

<!--div class="ls-login-adv"><img title="Exemplo banner" src="../../../assets/images/banner-example.png" /></div--->

    </div>
  </div>
</div>

<script src="../../../assets/javascripts/libs/jquery-2.1.0.min.js" type="text/javascript"></script><script src="../../../assets/javascripts/locastyle.js" type="text/javascript"></script>

</body>
</html>
