
<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Banespa : Fabio Gabbay                  		  |
// +----------------------------------------------------------------------+


// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

//include "../user/header.php";
include "./mysqlconecta.php"; // Conecta ao banco de dados
include "./mysqlexecuta.php";
//include "../user/verifica_sessao.php";	

//session_start();

//$cpf_session = $_SESSION['cpf'];
//$senha_session = $_SESSION['senha'];
//$email_session = $_SESSION['email'];

//Executa a consulta
$sql = "SELECT * FROM tb_evento where id=1";
$res = mysqlexecuta($id,$sql);
$row = mysql_fetch_array($res);

$boleto_id = $_GET['boleto_id'];
$sql37 = "SELECT * FROM tb_boleto_expo where id=$boleto_id";
$res37 = mysqlexecuta($id,$sql37);
$row37 = mysql_fetch_array($res37);
$user_id = $row37['user_id'];
$sql38 = "SELECT * FROM tb_expositor where id=$user_id";
$res38 = mysqlexecuta($id,$sql38);
$row38 = mysql_fetch_array($res38);
$categoria = $row38['categoria'];

if($row37!=NULL){
//$sql39 = "SELECT * FROM tb_categoria where id=$categoria";
//$res39 = mysqlexecuta($id,$sql39);
//$row39 = mysql_fetch_array($res39);

//if(strtotime($row37['vencimento']) < (strtotime(date('Y-m-d')))){
//if(strtotime($row['vencimento2'])>= (strtotime(date('Y-m-d')))){
//$valor = $row39['valor2'];
//$vencimento = $row['vencimento2']; 
//}
//else{
//$valor = $row39['valor3'];
//$vencimento = $row['vencimento3']; 	
//}
//$sql5="UPDATE `tb_boleto` SET `vencimento` = '$vencimento', `valor`='$valor'  WHERE user_id=$user_id";
//$res5 = mysqlexecuta($id,$sql5);

//}
$data_bd = $row37['vencimento'];

$partes_da_data = explode('-',$data_bd);

$data_bol = $partes_da_data[2].'/'.$partes_da_data[1].'/'.$partes_da_data[0];


// DADOS DO BOLETO PARA O SEU CLIENTE
//$dias_de_prazo_para_pagamento = 5;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
//$data_venc ="22/06/2012"; 
$data_venc = $data_bol;
$valor_cobrado = $row37['valor']; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado,2, ',', '');

$dadosboleto["nosso_numero"] = $row37['id'];  // Nosso numero - REGRA: Máximo de 7 caracteres!
$dadosboleto["numero_documento"] = $row37['id'];	// Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $row38['razao_social'];
$dadosboleto["endereco1"] = $row38['nome_fantasia'];
$dadosboleto["endereco2"] = $row38['cnpj'];

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = $row37['referente'];
$dadosboleto["demonstrativo2"] = "";
$dadosboleto["demonstrativo3"] = "";
$dadosboleto["instrucoes1"] = "Não Receber após o vencimento";
$dadosboleto["instrucoes2"] = "";
$dadosboleto["instrucoes3"] = "";
$dadosboleto["instrucoes4"] = "";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS PERSONALIZADOS - Banespa
$dadosboleto["codigo_cedente"] = $row['cedente'];  //65819000508; // Código do cedente (Somente 11 digitos)
$dadosboleto["ponto_venda"] = 658; // Ponto de Venda = Agencia 
$dadosboleto["carteira"] = "COB";  // COB - SEM Registro
$dadosboleto["nome_da_agencia"] = "";  // Nome da agencia (Opcional)

// SEUS DADOS
$dadosboleto["identificacao"] = "FeSBE - Federação de Sociedades de Biologia Experimental";
$dadosboleto["cpf_cnpj"] = "55.805.501 / 0001-37";
$dadosboleto["endereco"] = "Av. Prof. Lineu Prestes, 2415";
$dadosboleto["cidade_uf"] = "São Paulo - SP";
$dadosboleto["cedente"] = "Federacao de Sociedades de Biologia Experimental";

// NÃO ALTERAR!
include("include/funcoes_banespa.php"); 
include("include/layout_banespa.php");
}
//session_destroy();
?>