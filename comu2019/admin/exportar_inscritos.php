<?php
/*
* Criando e exportando planilhas do Excel
* /
*/
// Definimos o nome do arquivo que será exportado
include "./mysqlconecta.php";
include "./mysqlexecuta.php";

$arquivo = 'inscritos_exportar.xls';
// Criamos uma tabela HTML com o formato da planilha
$html .= "<meta http-equiv='content-type' content='text/html;charset=utf-8' />";
$html .= "<table>";
$html .= "<tr>";
$html .= "<td>ID</td>";
$html .= "<td>Nome</td>";
$html .= "<td>E-mail</td>";
$html .= "<td>CPF</td>";
$html .= "<td>Endereco</td>";
$html .= "<td>Número</td>";
$html .= "<td>Complemento</td>";
$html .= "<td>Bairro</td>";
$html .= "<td>Cidade</td>";
$html .= "<td>Estado</td>";
$html .= "<td>CEP</td>";
$html .= "<td>Telefone</td>";
$html .= "<td>Celular</td>";
$html .= "<td>Departamento</td>";
$html .= "<td>Instituto</td>";
$html .= "<td>Instituicão</td>";
$html .= "<td>Sociedade</td>";
$html .= "<td>Boleto</td>";
$html .= "<td>Categoria</td>";
$html .= "<td>Trabalhos</td>";
$html .= "<td>Curso 1</td>";
$html .= "<td>Curso 2</td>";
$html .= "<td>Curso 3</td>";
$html .= "<td>Curso 4</td>";
$html .= "</tr>";

$sql_consulta_inscritos = "SELECT * FROM tb_usuario ORDER BY `id`";
$res_consulta_inscritos = mysqlexecuta($id,$sql_consulta_inscritos);
while($row_consulta_inscritos = mysql_fetch_array($res_consulta_inscritos)){

    $id_usuario = $row_consulta_inscritos['id'];
/**
$sociedade = $row_consulta_inscritos['sociedade_filiada'];
$sql_sociedade = "SELECT * FROM tb_sociedades WHERE id = $sociedade";
$res_sociedade = mysqlexecuta($id,$sql_sociedade);
$row_sociedade = mysql_fetch_array($res_sociedade);
**/
$boletos='';
$sql_boletos = "SELECT * FROM tb_boleto WHERE user_id = $id_usuario";
$res_boletos = mysqlexecuta($id,$sql_boletos);
while($row_boletos = mysql_fetch_array($res_boletos)){
    $boletos = $boletos.'****'.$row_boletos['referente'].' - R$'.$row_boletos['valor'].' - '.$row_boletos['situacao'];
}
/**
$categoria = $row_consulta_inscritos['categoria'];
$sql_categoria = "SELECT * FROM tb_categoria WHERE id = $categoria";
$res_categoria = mysqlexecuta($id,$sql_categoria);
$row_categoria = mysql_fetch_array($res_categoria);
**/
$trabalhos='';
/**
$sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE usuario_id = $id_usuario";
$res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
while($row_trabalhos = mysql_fetch_array($res_trabalhos)){
    $trabalhos = $trabalhos.'***'.$row_trabalhos['id'].' - '.$row_trabalhos['titulo'];
}
**/
$curso1 = $row_consulta_inscritos['inscricao_obs'];
if($curso1!=''){
$sql_curso1 = "SELECT * FROM tb_atividades WHERE id = $curso1";
$res_curso1 = mysqlexecuta($id,$sql_curso1);
$row_curso1 = mysql_fetch_array($res_curso1);
$nome_curso = $row_curso1['nome'];
}

$curso2 = $row_consulta_inscritos['inscricao_obs2'];
if($curso2!=''){
$sql_curso2 = "SELECT * FROM tb_atividades WHERE id = $curso2";
$res_curso2 = mysqlexecuta($id,$sql_curso2);
$row_curso2 = mysql_fetch_array($res_curso2);
$nome_curso2 = $row_curso2['nome'];
}


$curso3 = $row_consulta_inscritos['inscricao_obs3'];
if($curso3!=''){
$sql_curso3 = "SELECT * FROM tb_atividades WHERE id = $curso3";
$res_curso3 = mysqlexecuta($id,$sql_curso3);
$row_curso3 = mysql_fetch_array($res_curso3);
$nome_curso3 = $row_curso3['nome'];
}
$curso4 = $row_consulta_inscritos['inscricao_obs4'];
if($curso4!=''){
$sql_curso4 = "SELECT * FROM tb_atividades WHERE id = $curso4";
$res_curso4 = mysqlexecuta($id,$sql_curso4);
$row_curso4 = mysql_fetch_array($res_curso4);
$nome_curso4 = $row_curso4['nome'];
}
if($row_consulta_inscritos['cpf']==''){
    $cpf='0';
}
else{
    $cpf=$row_consulta_inscritos['cpf'];
}

$html .= "<tr>";
    $id_trabalho = $row_consulta_inscritos['id'];
$html .= "<td>".utf8_encode($row_consulta_inscritos['id'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['nome'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['email'])."</td>";
$html .=  "<td>".utf8_encode($cpf)."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['endereco'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['numero'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['complemento'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['bairro'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['cidade'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['estado'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['cep'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['telefone'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['celular'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['departamento'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['instituto'])."</td>";
$html .=  "<td>".utf8_encode($row_consulta_inscritos['instituicao'])."</td>";
$html .=  "<td>".utf8_encode($row_sociedade['nome'])."</td>";
$html .=  "<td>".utf8_encode($boletos)."</td>";
$html .=  "<td>".utf8_encode($row_categoria['nome'])."</td>";
$html .=  "<td>".utf8_encode($trabalhos)."</td>";
$html .=  "<td>".utf8_encode($nome_curso)."</td>";
$html .=  "<td>".utf8_encode($nome_curso2)."</td>";
$html .=  "<td>".utf8_encode($nome_curso3)."</td>";
$html .=  "<td>".utf8_encode($nome_curso4)."</td>";
$html .= "</tr>";
   }

$html .= '</table>';
// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel; charset=UTF-8");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;