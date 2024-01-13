<?php

require_once("produto.class.php");

//Importa a classe Produto contida no arquivo produto.class.php


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

        //3 - Lançar venda com ou sem desconto.
        /*Se comprar apenas um item, nao ha desconto. Caso contrário, desconto de 10%*/
        
        $this->quantidade = $qtdDesejada;

        if ($this->quantidade > 1) {
            $this->desconto = 10; 
        } else {
            $this->desconto = 0; 
        }
        
        $arrProdutoCadastrado["quantidade"] -= $this->quantidade;
        $this->setProduto($arrProdutoCadastrado);
        
        //4 - Exibe os dados da venda com o estoque atualizado
        $this->getVenda();
    }

        public function getVenda() {
            $arrProdutoCadastrado = $this->getProduto();
            $precoOriginal = $arrProdutoCadastrado["preco"];
            $valorTotal = $precoOriginal * $this->quantidade;
            echo "Venda realizada com sucesso em: " . date("d/m/Y H:i:s");
            echo "<br />";
            echo "Estoque atual do produto: " . $arrProdutoCadastrado["quantidade"];
            echo "<br />";
            echo "Quantidade vendida: " . $this->quantidade;
            if ($this->desconto) {
                $valorDesconto = ($precoOriginal * $this->desconto / 100) * $this->quantidade;
                $valorFinal = $valorTotal - $valorDesconto;
    
                echo "<br />";
                echo "Desconto aplicado: " . $this->desconto . "%";
                echo "<br />";
                echo "Valor total sem desconto: R$ " . $valorTotal;
                echo "<br />";
                echo "Valor do desconto: R$ " . $valorDesconto;
                echo "<br />";
                echo "Valor final com desconto: R$ " . $valorFinal;
            } else {
                echo "<br />";
                echo "Valor total: R$" . $valorTotal;
            }
            echo "<hr>";
        }
    }
        /*Método getVenda para exibir informações sobre venda realizada, a data e hora da venda e o estoque atualizado do produto. São informações apresentadas na saida de dados para fornecer feedback ao usuário e estrutura condicional
        para exibir desconto SE aplicado*/
     
