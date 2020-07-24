<?php 
 
// Transformando arquivo XML em Objeto
$link = "https://ws.pagseguro.uol.com.br/v3/transactions/48D5D1FF-9D7B-4A44-A5F3-BBB3D2BE8BBE?email=weber@fesbe.org.br&token=829227A3652543D09E88BE2FBE6B54B3"; //link do arquivo xml
$xml = simplexml_load_file($link);
 
// Exibe as informações do XML
echo 'Título: ' . $xml->titulo . '<br>';
echo 'Data de Atualização: ' . $xml->date . '<br>';
 
// Percorre todos os registros de vendas
foreach($xml->venda as $registro):
	echo 'Código da Venda: ' . $registro->cod_venda . '<br>';
	echo 'Cliente: ' . $registro->cliente . '<br>';
	echo 'Email: ' . $registro->email . '<br>';
 
        // Percorre todos os itens da venda
	foreach($registro->itens->item as $item):
		echo 'Código do Produto: ' . $item->cod_produto . '<br>';
		echo 'Quantidade: ' . $item->qtde . '<br>';
		echo 'Descrição do Produto: ' . $item->descricao . '<br>';
	endforeach;
 
	echo '<hr>';
endforeach;

//exit();
?>


<?php
    $link = "https://ws.pagseguro.uol.com.br/v3/transactions/285A8C63-8159-4FCC-A3EB-08E187F2F187?email=weber@fesbe.org.br&token=829227A3652543D09E88BE2FBE6B54B3"; //link do arquivo xml
    $xml = simplexml_load_file($link);
    print_r($xml);
    exit();
    $xml = simplexml_load_file($link) -> transaction; //carrega o arquivo XML e retornando um Array
     echo $xml;
     
    foreach($xml -> transaction as $item){ //faz o loop nas tag com o nome "item"
        //exibe o valor das tags que estão dentro da tag "item"
        //utilizamos a função "utf8_decode" para exibir os caracteres corretamente
        //echo "<strong>Título:</strong> ".utf8_decode($item -> title)."<br />";
        //echo "<strong>Link:</strong> ".utf8_decode($item -> link)."<br />";
        echo "<strong>Descrição:</strong> ".utf8_decode($item -> date)."<br />";
        //echo "<strong>Autor:</strong> ".utf8_decode($item -> author)."<br />";
        //echo "<strong>Data:</strong> ".utf8_decode($item -> pubDate)."<br />";
        echo "<br />";
    } //fim do foreach
?>
</body>
</html>