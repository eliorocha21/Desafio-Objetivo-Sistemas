<?php
require_once("venda.class.php");
$venda = new Venda();

/*Simulação de processo de cadastro de produto e realização de venda
desse produto utilizando as classes Venda e Produto"*/

$venda->setProduto(array(
    "nome" => "Acarajé congelado",
    "preco" => 14.00,
    "quantidade" => 5
));

$venda->setVenda("Acarajé congelado", 2); // Venda de 1 unidade sem desconto