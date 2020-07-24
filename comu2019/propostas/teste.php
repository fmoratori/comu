<script> 
function ocultarMostrar(chk){
var mostrar = 'none';
if(chk.checked) mostrar = '';
document.getElementById('txt1').style.display = mostrar ;
document.getElementById('txt2').style.display = mostrar ;

}
</script>
<input type="checkbox" onclick="ocultarMostrar(this)">
<input id="txt1" style="display:none"><br>
<input id="txt2" style="display:none"><br>
