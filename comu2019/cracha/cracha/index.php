<?php
$id = $_GET['id'];
require_once('barcode.inc.php'); 
//$code_number = '1234';
$code_number = $id;
#new barCodeGenrator($code_number,0,'hello.gif'); 
new barCodeGenrator($code_number,0,'', 100, 50, true);
?> 