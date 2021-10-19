<?php

namespace App\Models;

use MF\Model\Model;

class Carrinho extends Model {
    private $id_produto;
    private $quantidade;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function getAllCarrinho() {
        $query = "
            SELECT id, descricao, carrinho.quantidade, preco, preco_promocional, generico, imagem
            FROM produto 
            INNER JOIN carrinho ON carrinho.fk_produto = produto.id
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function quantidadeItens() {
        $query = "
            SELECT count (*) as quantidade from carrinho 
        ";
        /*WHERE USUARIO = 'usuario'*/

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':quantidade', $this->__get('quantidade'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function total() {
        $query = "
            SELECT SUM(carrinho.quantidade * preco_promocional) as total
            FROM produto 
            INNER JOIN carrinho ON carrinho.fk_produto = produto.id
        ";

        $stmt = $this->db->prepare($query);
        /*$stmt->bindValue(':total', $this->__get('total'));*/
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function totalPorProduto() {
        $query = "
            SELECT carrinho.quantidade * preco_promocional as totalPorProduto
            FROM produto 
            INNER JOIN carrinho ON carrinho.fk_produto = produto.id
        ";
    }

    public function salvarNoCarrinho() {
        $query = "insert into carrinho(fk_produto, quantidade)
        values(:id, :quantidade)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id_produto'));
        $stmt->bindValue(':quantidade', $this->__get('quantidade'));

        $stmt->execute();

        return $this;
    }
}