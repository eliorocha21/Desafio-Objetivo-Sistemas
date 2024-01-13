<?php

/*Criação da classe venda que herda os atributos
da Classe Produto e as variáveis  quantidade e desconto*/

class Venda extends Produto {
    private $quantidade;
    private $desconto;

    public function setVenda($nomeProduto, $qtdDesejada) {
       
        $arrProdutoCadastrado = $this->getProduto();
        //1 - Verifica se o produto está cadastrado.
        if($nomeProduto != $arrProdutoCadastrado["nome"]) {
            echo "<span style=\"color: red;\">Produto não cadastrado.</span>";
            exit;
        }
    }
}