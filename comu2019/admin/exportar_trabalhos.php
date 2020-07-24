<?php
/*
* Criando e exportando planilhas do Excel
* /
*/
// Definimos o nome do arquivo que será exportado
include "mysqlconecta.php";
include "mysqlexecuta.php";

$arquivo = 'trabalhos_exportar.xls';
// Criamos uma tabela HTML com o formato da planilha
$html .= "<meta http-equiv='content-type' content='text/html;charset=utf-8' />";
$html .= "<table>";
$html .= "<tr>";
$html .= "<td>ID</td>";
$html .= "<td>Nome</td>";
$html .= "<td>E-mail</td>";
$html .= "<td>Prêmio</td>";
$html .= "<td>Área</td>";
$html .= "<td>Painel</td>";
$html .= "<td>Sessão</td>";
$html .= "<td>Status</td>";
$html .= "<td>Título</td>";
$html .= "<td>Introdução</td>";
$html .= "<td>Objetivos</td>";
$html .= "<td>Métodos</td>";
$html .= "<td>Resultados</td>";
$html .= "<td>Conclusão</td>";
$html .= "<td>Apoio</td>";
$html .= "<td>Comite</td>";
$html .= "<td>Parecer</td>";
$html .= "<td>Avaliador</td>";
$html .= "</tr>";

$sql_consulta_trabalhos = "SELECT * FROM tb_trabalhos ORDER BY `id`";
$res_consulta_trabalhos = mysqlexecuta($id,$sql_consulta_trabalhos);
while($row_consulta_trabalhos = mysql_fetch_array($res_consulta_trabalhos)){

$html .= "<tr>";
    $id_trabalho = $row_consulta_trabalhos['id'];
$html .= "<td>".utf8_encode($row_consulta_trabalhos['id'])."</td>";
    $area_trabalho = $row_consulta_trabalhos['area_id'];
    $sql_area_trabalhos = "SELECT * FROM tb_areas WHERE `id` = '$area_trabalho'";
    $res_area_trabalhos = mysqlexecuta($id,$sql_area_trabalhos);
    $row_area_trabalhos = mysql_fetch_array($res_area_trabalhos);
    $sql_consulta_nome_autor = "SELECT * FROM tb_usuario WHERE id IN (SELECT usuario_id FROM tb_trabalhos WHERE id = $id_trabalho)";
    $res_consulta_nome_autor = mysqlexecuta($id,$sql_consulta_nome_autor);
    $row_consulta_nome_autor = mysql_fetch_array($res_consulta_nome_autor);
$html .=  "<td>".utf8_encode($row_consulta_nome_autor['nome'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_nome_autor['email'])."</td>";
    $premio = $row_consulta_trabalhos['premio'];    
    $sql_premio_trabalhos = "SELECT * FROM tb_premio WHERE `id` = '$premio'";
    $res_premio_trabalhos = mysqlexecuta($id,$sql_premio_trabalhos);
    $row_premio_trabalhos = mysql_fetch_array($res_premio_trabalhos);    
    $id_premio = $row_premio_trabalhos['id'];
    $premio_nome = utf8_encode($row_premio_trabalhos['nome']);   
$html .=  "<td>".$premio_nome."</td>";
$html .=  "<td>".$area_trabalho." - ".utf8_encode($row_area_trabalhos['nome_area'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['painel'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['sessao_id'])."</td>";
    $status = $row_consulta_trabalhos['status'];    
    $sql_status_trabalhos = "SELECT * FROM tb_status WHERE `id` = '$status'";
    $res_status_trabalhos = mysqlexecuta($id,$sql_status_trabalhos);
    $row_status_trabalhos = mysql_fetch_array($res_status_trabalhos);    
    $id_status = $row_status_trabalhos['id'];
    $status_nome = utf8_encode($row_status_trabalhos['status']);
$html .=  "<td>".$status_nome."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['titulo'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['introducao'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['objetivos'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['metodos'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['resultados'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['conclusao'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['apoio'])."</td>";
$html .= "<td>".utf8_encode($row_consulta_trabalhos['comite'])."</td>";
$parecer = str_replace("<br />"," -- ",$row_consulta_trabalhos['parecer']);

$html .= "<td>".utf8_encode($parecer)."</td>";
    $avaliador = $row_consulta_trabalhos['avaliador_id'];
    $sql_avaliador_trabalhos = "SELECT * FROM tb_avaliador WHERE `id` = '$avaliador'";
    $res_avaliador_trabalhos = mysqlexecuta($id,$sql_avaliador_trabalhos);
    $row_avaliador_trabalhos = mysql_fetch_array($res_avaliador_trabalhos);            
$html .=  "<td>".utf8_encode($row_avaliador_trabalhos['nome'])."</td>";
$html .=  "<td>";
$html .= "</tr>";
   }

$html .= '</table>';
// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;