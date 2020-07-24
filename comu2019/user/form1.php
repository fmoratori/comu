<?
if($idioma==1 || $idioma==null){
?>
<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">Nova Inscri&ccedil;&atilde;o</h1>
<form action="./register.php?pg=form2.php&idioma=1" class="ls-form ls-form-horizontal" data-ls-module="form" method="POST">
<label class="ls-label col-md-3">
<br />
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" >
</label>
    <button class="ls-btn">Pr&oacute;ximo</button>
</form>
<?
}
?>


<?
if($idioma==2){
?>
<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">New Register</h1>
<form action="./register.php?pg=form2.php&idioma=2" class="ls-form ls-form-horizontal" data-ls-module="form" method="POST">
<label class="ls-label col-md-3">
<br />
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" >
</label>
    <button class="ls-btn">Next</button>
</form>
<?
}
?>
<?
if($idioma==3){
?>
<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">Nuevo Cadastro</h1>
<form action="./register.php?pg=form2.php&idioma=3" class="ls-form ls-form-horizontal" data-ls-module="form" method="POST">
<label class="ls-label col-md-3">
<br />
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" >
</label>
    <button class="ls-btn">Seguinte</button>
</form>
<?
}
?>
