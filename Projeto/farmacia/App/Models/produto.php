<?php

namespace App\Models;

use MF\Model\Model;

class Produto extends Model {

    private $id;
    private $descricao;
    private $preco;
    private $quantidade;
    private $categoria;
    private bool $generico;
    private bool $promocao;
    private $precoPromocional;
    private $imagem;


    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }


    public function salvar() {
        $query = "insert into produto(descricao, preco, quantidade, categoria, generico, promocao, preco_promocional, imagem)
        values(:descricao, :preco, :quantidade, :categoria, :generico, :promocao, :precoPromocional, :imagem)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':preco', $this->__get('preco'));
        $stmt->bindValue(':quantidade', $this->__get('quantidade'));
        $stmt->bindValue(':categoria', $this->__get('categoria'));
        $stmt->bindValue(':generico', $this->__get('generico'));
        $stmt->bindValue(':promocao', $this->__get('promocao'));
        $stmt->bindValue(':precoPromocional', $this->__get('precoPromocional'));
        $stmt->bindValue(':imagem', $this->__get('imagem'));

        $stmt->execute();

        return $this;
    }

    public function validarCadastroProduto() {
        $valido = true;

        if(strlen($this->__get('descricao')) <= 0){
            $valido = false;
        }

        if($this->__get('preco') == '') {
            $valido = false;
        }

        if($this->__get('quantidade') == 0) {
            $valido = false;
        }

        if($this->__get('promocao') == 1 &&  $this->__get('precoPromocional') == '') {
            $valido = false;
        }

        if($this->__get('imagem') == '') {
            $valido = false;
        }

        return $valido;
    }

    public function getProdutoPorDescricao() {
        $query = "select descricao from produto where descricao = :descricao";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //recuperar
    public function getAll() {
        $query = "select id, descricao, preco, preco_promocional, imagem from produto where promocao = 1";

        $stmt = $this->db->prepare($query);
        //$stmt->bindValue(':descricao', $this->__get('descricao'));
       
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllMedicamentos() {
        $query = "
            SELECT id, descricao, preco, categoria, preco_promocional, generico, imagem from produto where categoria = 'Medicamentos'
        ";

        $stmt = $this->db->prepare($query);
        //$stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllInfantil() {
        $query = "
            SELECT id, descricao, preco, categoria, preco_promocional, generico, imagem from produto where categoria = 'Infantil'
        ";

        $stmt = $this->db->prepare($query);
        //$stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllSaude() {
        $query = "
            SELECT id, descricao, preco, categoria, preco_promocional, generico, imagem from produto where categoria = 'Saude'
        ";

        $stmt = $this->db->prepare($query);
        //$stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllHigiene() {
        $query = "
            SELECT id, descricao, preco, categoria, preco_promocional, generico, imagem from produto where categoria = 'Higiene'
        ";

        $stmt = $this->db->prepare($query);
        //$stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllCosmeticos() {
        $query = "
            SELECT id, descricao, preco, categoria, preco_promocional, generico, imagem from produto where categoria = 'Cosmeticos'
        ";

        $stmt = $this->db->prepare($query);
        //$stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }



    public function umProduto($id) {
        $query = "
            SELECT id, descricao, preco, preco_promocional, generico, imagem from produto where id = $id
        ";

        $stmt = $this->db->prepare($query);
        //$stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>