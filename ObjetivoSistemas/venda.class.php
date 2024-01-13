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
        
        //2 - Valida o estoque
        if($qtdDesejada > $arrProdutoCadastrado["quantidade"]) {
            echo "<span style=\"color: red;\">Estoque insuficiente.</span>";
            exit;
        }

        //3 - Lançar venda
        $arrProdutoCadastrado["quantidade"] = $arrProdutoCadastrado["quantidade"] -$qtdDesejada; 
        $this->setProduto($arrProdutoCadastrado);
        /*subtrai a quantidade desejada pelo cliente
        da quantidade atual do produto, atualiza o estoque
        e mostra a quantidade após a venda*/
    }
}
