<?
$id_trabalho = $_GET['id_trabalho'];
$tamanho = $_GET['tamanho'];
$experimentacao = $_POST['experimentacao'];
?>

<?
if($idioma==1 || $idioma==null){
    ?>
<h1 class="ls-title-intro ls-ico-pencil2">Anexar Trabalho - PDF</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/5)*4),2); ?>" class="ls-animated"></div>
<br />
<?
if(($tamanho==0)&&($tamanho!="")){
    ?>
        <div class="ls-alert-danger"><strong>ATEN&Ccedil;&Atilde;O!</strong> Arquivo n&atilde;o anexado. Verifique se n&atilde;o ultrapassou o tamanho m&aacute;ximo de <b>2 MB</b></div>
<?
}
if($tamanho>0){
    ?>
        <div class="ls-alert-success"><strong>Arquivo Gerado com Sucesso.</strong></div>
<?
}

?>
<div class="ls-alert-warning"><strong>Anexar Trabalho em PDF.</strong></div>
<div class="ls-box-filter">
<?
$filename = './ce/ce_'.$id_trabalho.'.pdf';

if ((file_exists($filename))&& ($experimentacao=='sim')) {
	?>
<a href="<? echo $filename ?>" target="_blank"><h3>Clique Aqui para Visualizar o Arquivo Anexado.</h3></a><br />

<form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Trabalho em PDF (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>

</div>

<?
}

if ((file_exists($filename))&&($experimentacao=='nao')) {
	?>
<a href="<? echo $filename ?>" target="_blank"><h3>Clique Aqui para Visualizar o Arquivo Anexado.</h3></a><br />
    
<div class="ls-box-filter">
<h3>O TRABALHO DISPENSA COMIT&Ecirc; DE &Eacute;TICA?</h3><br />
<form name="dispensa_ce" action="./principal.php?pg=salva_arquivo2.php&id_trabalho=<? echo $id_trabalho ?>" class="ls-form ls-form-horizontal" method="POST">
      <label class="ls-label-text">
        <input type="checkbox" name="cea_dispensa" required="required">
        Declaro que o trabalho não faz uso de animais cordados nos termos da lei 11.794/2008 e regulamentações subsequentes do CONCEA. Estou ciente de que, se na avaliação for identificado que o trabalho é sim objeto das legislações acima mencionadas, o mesmo será automaticamente cancelado pela organização <? echo $row_evento['nome']; ?>.
      </label>

 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</div>
      <?
      }





$filename = './ce/ce_'.$id_trabalho.'.pdf';


if ((file_exists($filename))&&($experimentacao!='sim'&&$experimentacao!='nao')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Trabalho (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>

 </div>   
    <?
    }





if ((!file_exists($filename))&&($experimentacao!='sim'&&$experimentacao!='nao')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Trabalho (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>

 </div>   
    <?
    }



if ((!file_exists($filename))&&($experimentacao=='sim')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Trabalho (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>

 </div>   
    <?
    }


if ((!file_exists($filename))&&($experimentacao=='nao')) {
	?>
<div class="ls-box-filter">
<h3>O TRABALHO DISPENSA COMIT&Ecirc; DE &Eacute;TICA?</h3><br />
<form name="dispensa_ce" action="./principal.php?pg=salva_arquivo2.php&id_trabalho=<? echo $id_trabalho ?>" class="ls-form ls-form-horizontal" method="POST">
      <label class="ls-label-text">
        <input type="checkbox" name="cea_dispensa" required="required">
        Declaro que o trabalho não faz uso de animais cordados nos termos da lei 11.794/2008 e regulamentações subsequentes do CONCEA. Estou ciente de que, se na avaliação for identificado que o trabalho é sim objeto das legislações acima mencionadas, o mesmo será automaticamente cancelado pela organização <? echo $row_evento['nome']; ?>.
      </label>

 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</div>
      <?
      }
      ?>
<a href="./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<?
if (file_exists($filename)) {
    ?>
<a href="./principal.php?pg=finalizar_envio.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-right">Próximo</a>
<?
}

}
?>






<?
if($idioma==2){
    ?>
<h1 class="ls-title-intro ls-ico-pencil2">Ethics Committee</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*4),2); ?>" class="ls-animated"></div>
<br />
<?
if(($tamanho==0)&&($tamanho!="")){
    ?>
        <div class="ls-alert-danger"><strong>ATEN&Ccedil;&Atilde;O!</strong> Arquivo n&atilde;o anexado. Verifique se n&atilde;o ultrapassou o tamanho m&aacute;ximo de <b>2 MB</b></div>
<?
}
if($tamanho>0){
    ?>
        <div class="ls-alert-success"><strong>Arquivo Gerado com Sucesso.</strong></div>
<?
}

?>
<div class="ls-alert-warning"><strong>Carta de Aprova&ccedil;&atilde;o do Comit&ecirc; de &Eacute;tica em PDF.</strong></div>
<div class="ls-box-filter">
<?
$filename = './ce/ce_'.$id_trabalho.'.pdf';

if ((file_exists($filename))&& ($experimentacao=='sim')) {
	?>
<a href="<? echo $filename ?>" target="_blank"><h3>Click to view file.</h3></a><br />

<form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>&idioma=2" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</form>

</div>

<?
}

if ((file_exists($filename))&&($experimentacao=='nao')) {
	?>
<a href="<? echo $filename ?>" target="_blank"><h3>Click to view file..</h3></a><br />
    
<div class="ls-box-filter">
<h3>O TRABALHO DISPENSA COMIT&Ecirc; DE &Eacute;TICA?</h3><br />
<form name="dispensa_ce" action="./principal.php?pg=salva_arquivo2.php&id_trabalho=<? echo $id_trabalho ?>&idioma=2" class="ls-form ls-form-horizontal" method="POST">
      <label class="ls-label-text">
        <input type="checkbox" name="cea_dispensa" required="required">
        Declaro que o trabalho não faz uso de animais cordados nos termos da lei 11.794/2008 e regulamentações subsequentes do CONCEA. Estou ciente de que, se na avaliação for identificado que o trabalho é sim objeto das legislações acima mencionadas, o mesmo será automaticamente cancelado pela organização <? echo $row_evento['nome']; ?>.
      </label>

 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</div>
      <?
      }





$filename = './ce/ce_'.$id_trabalho.'.pdf';


if ((file_exists($filename))&&($experimentacao!='sim'&&$experimentacao!='nao')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>&idioma=2" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</form>

 </div>   
    <?
    }





if ((!file_exists($filename))&&($experimentacao!='sim'&&$experimentacao!='nao')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>&idioma=2" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</form>

 </div>   
    <?
    }



if ((!file_exists($filename))&&($experimentacao=='sim')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>&idioma=2" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</form>

 </div>   
    <?
    }


if ((!file_exists($filename))&&($experimentacao=='nao')) {
	?>
<div class="ls-box-filter">
<h3>O TRABALHO DISPENSA COMIT&Ecirc; DE &Eacute;TICA?</h3><br />
<form name="dispensa_ce" action="./principal.php?pg=salva_arquivo2.php&id_trabalho=<? echo $id_trabalho ?>&idioma=2" class="ls-form ls-form-horizontal" method="POST">
      <label class="ls-label-text">
        <input type="checkbox" name="cea_dispensa" required="required">
        Declaro que o trabalho não faz uso de animais cordados nos termos da lei 11.794/2008 e regulamentações subsequentes do CONCEA. Estou ciente de que, se na avaliação for identificado que o trabalho é sim objeto das legislações acima mencionadas, o mesmo será automaticamente cancelado pela organização da XII Reunião Anual da FeSBE.
      </label>

 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</div>
      <?
      }
      ?>
<a href="./principal.php?pg=pre_comite.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-left">Back</a>
<?
if (file_exists($filename)) {
    ?>
<a href="./principal.php?pg=finalizar_envio.php&id_trabalho=<? echo $id_trabalho; ?>&idioma=2" class="ls-btn-dark ls-ico-chevron-right">Next</a>
<?
}

}
?>






<?
if($idioma==3){
    ?>
<h1 class="ls-title-intro ls-ico-pencil2">Ethics Committee</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*4),2); ?>" class="ls-animated"></div>
<br />
<?
if(($tamanho==0)&&($tamanho!="")){
    ?>
        <div class="ls-alert-danger"><strong>ATEN&Ccedil;&Atilde;O!</strong> Arquivo n&atilde;o anexado. Verifique se n&atilde;o ultrapassou o tamanho m&aacute;ximo de <b>2 MB</b></div>
<?
}
if($tamanho>0){
    ?>
        <div class="ls-alert-success"><strong>Arquivo Gerado com Sucesso.</strong></div>
<?
}

?>
<div class="ls-alert-warning"><strong>Carta de Aprova&ccedil;&atilde;o do Comit&ecirc; de &Eacute;tica em PDF.</strong></div>
<div class="ls-box-filter">
<?
$filename = './ce/ce_'.$id_trabalho.'.pdf';

if ((file_exists($filename))&& ($experimentacao=='sim')) {
	?>
<a href="<? echo $filename ?>" target="_blank"><h3>Click to view file.</h3></a><br />

<form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>&idioma=3" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Guardar</button>
  </div>
</form>

</div>

<?
}

if ((file_exists($filename))&&($experimentacao=='nao')) {
	?>
<a href="<? echo $filename ?>" target="_blank"><h3>Click to view file..</h3></a><br />
    
<div class="ls-box-filter">
<h3>O TRABALHO DISPENSA COMIT&Ecirc; DE &Eacute;TICA?</h3><br />
<form name="dispensa_ce" action="./principal.php?pg=salva_arquivo2.php&id_trabalho=<? echo $id_trabalho ?>" class="ls-form ls-form-horizontal" method="POST">
      <label class="ls-label-text">
        <input type="checkbox" name="cea_dispensa" required="required">
        Declaro que o trabalho não faz uso de animais cordados nos termos da lei 11.794/2008 e regulamentações subsequentes do CONCEA. Estou ciente de que, se na avaliação for identificado que o trabalho é sim objeto das legislações acima mencionadas, o mesmo será automaticamente cancelado pela organização da XXXII Reunião Regional da FeSBE.
      </label>

 <div class="ls-actions-btn">
    <button class="ls-btn">Guardar</button>
  </div>
</div>
      <?
      }





$filename = './ce/ce_'.$id_trabalho.'.pdf';


if ((file_exists($filename))&&($experimentacao!='sim'&&$experimentacao!='nao')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Guardar</button>
  </div>
</form>

 </div>   
    <?
    }





if ((!file_exists($filename))&&($experimentacao!='sim'&&$experimentacao!='nao')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Guardar</button>
  </div>
</form>

 </div>   
    <?
    }



if ((!file_exists($filename))&&($experimentacao=='sim')) {
    ?>
    
    <form action="./principal.php?pg=salva_arquivo.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Carta Comit&ecirc; de &eacute;tica (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Guardar</button>
  </div>
</form>

 </div>   
    <?
    }


if ((!file_exists($filename))&&($experimentacao=='nao')) {
	?>
<div class="ls-box-filter">
<h3>O TRABALHO DISPENSA COMIT&Ecirc; DE &Eacute;TICA?</h3><br />
<form name="dispensa_ce" action="./principal.php?pg=salva_arquivo2.php&id_trabalho=<? echo $id_trabalho ?>" class="ls-form ls-form-horizontal" method="POST">
      <label class="ls-label-text">
        <input type="checkbox" name="cea_dispensa" required="required">
        Declaro que o trabalho não faz uso de animais cordados nos termos da lei 11.794/2008 e regulamentações subsequentes do CONCEA. Estou ciente de que, se na avaliação for identificado que o trabalho é sim objeto das legislações acima mencionadas, o mesmo será automaticamente cancelado pela organização da XII Reunião Regional da FeSBE.
      </label>

 <div class="ls-actions-btn">
    <button class="ls-btn">Guardar</button>
  </div>
</div>
      <?
      }
      ?>
<a href="./principal.php?pg=pre_comite.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<?
if (file_exists($filename)) {
    ?>
<a href="./principal.php?pg=finalizar_envio.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-right">Próximo</a>
<?
}

}
?>
