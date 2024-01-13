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
        /*subtrai a quantidade desejada pelo cliente  da quantidade atual do produto, atualiza o estoque
        e mostra a quantidade após a venda*/
        $arrProdutoCadastrado["quantidade"] = $arrProdutoCadastrado["quantidade"] -$qtdDesejada; 
        $this->setProduto($arrProdutoCadastrado);
        
        //4 - Exibe os dados da venda com o estoque atualizado
        $this->getVenda();
    }

        public function getVenda() {
            $arrProdutoCadastrado = $this->getProduto();
            echo "Venda realizada com sucesso em: " . date("d/m/Y H:i:s");
            echo "<br />";
            echo "Estoque atual do produto: " . $arrProdutoCadastrado["quantidade"];

        /*Método getVenda para exibir informações sobre venda realizada, a data e hora da venda e o estoque atualizado do produto. São informações apresentadas na saida de dados para fornecer feedback ao usuário*/
        }
}
