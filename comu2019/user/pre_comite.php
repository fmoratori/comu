<?
$id_trabalho = $_GET['id_trabalho'];
$tamanho = $_GET['tamanho'];
?>
<?
if($idioma==1 || $idioma==null){
?>
<h1 class="ls-title-intro ls-ico-pencil2">Comit&ecirc; de &eacute;tica</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*4),2); ?>" class="ls-animated"></div>
<br />
<div class="ls-box-filter">

<form action="./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho ?>&idioma=1" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
<h3>Seu trabalho foi realizado com Seres Humanos ou Animais?</h3>
<br />
<input type='radio' name='experimentacao' value='sim'>SIM
<br /><br />
<input type='radio' name='experimentacao' value='nao' required="required">N&Atilde;O
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>
</div>
</div>
<a href="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=1" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<?
}
?>


<?
if($idioma==2){
?>
<h1 class="ls-title-intro ls-ico-pencil2">Ethics Committee</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*4),2); ?>" class="ls-animated"></div>
<br />
<div class="ls-box-filter">

<form action="./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho ?>&idioma=2" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
<h3>Has your abstract been done with Human or Animal Beings?</h3>
<br />
<input type='radio' name='experimentacao' value='sim'>Yes
<br /><br />
<input type='radio' name='experimentacao' value='nao' required="required">No
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Next</button>
  </div>
</form>
</div>
</div>
<a href="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<?
}
?>

<?
if($idioma==3){
?>
<h1 class="ls-title-intro ls-ico-pencil2">Comité de Ética</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*4),2); ?>" class="ls-animated"></div>
<br />
<div class="ls-box-filter">

<form action="./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho ?>&idioma=3" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
<h3>¿Se ha hecho tu trabajo con seres humanos o animales?</h3>
<br />
<input type='radio' name='experimentacao' value='sim'>Sí
<br /><br />
<input type='radio' name='experimentacao' value='nao' required="required">No
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Siguiente</button>
  </div>
</form>
</div>
</div>
<a href="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=3" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<?
}
?>