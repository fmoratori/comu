<?
include "mysqlconecta.php";
include "mysqlexecuta.php";
$id_trabalho = $_GET['id_trabalho'];
$liberado = $_GET['liberado'];
if($id_trabalho!=''){
    if($liberado=='s'){
      $sql_libera_edicao = "UPDATE `tb_trabalhos` SET `midia`='n' WHERE `id`=$id_trabalho;";
    $res_libera_edicao = mysqlexecuta($id,$sql_libera_edicao);
    echo "Trabalho id $id_trabalho FECHADO Para Edi&ccedil;&atilde;o";  
    }
    else{
    $sql_libera_edicao = "UPDATE `tb_trabalhos` SET `midia`='s' WHERE `id`=$id_trabalho;";
    $res_libera_edicao = mysqlexecuta($id,$sql_libera_edicao);
    echo "Trabalho id $id_trabalho LIBERADO Para Edi&ccedil;&atilde;o";    
    }

}
else{
    echo "Trabalho não encontrado";
}
?>