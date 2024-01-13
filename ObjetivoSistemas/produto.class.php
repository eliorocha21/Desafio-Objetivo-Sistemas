<?php
//PONTO DE VENDA PARA O MERCADINHO JWT
class Produto
{

    //criação da classe responsável pelo cadastro de produtos

    private $nome;
    private $preco;
    private $quantidade;

    /* Criação de método setProduto que configura os atributos do produto com base em um array de dados, enquanto getProduto retorna esses dados.*/

    public function setProduto($data)
    {
        $this->nome = $data["nome"];
        $this->preco = $data["preco"];
        $this->quantidade = $data["quantidade"];
    }
    public function getProduto()
    {
        return array(
            "nome" => $this->nome,
            "preco" => $this->preco,
            "quantidade" => $this->quantidade
        );
    }
}
