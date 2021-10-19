<?php

namespace App\Models;

use MF\Model\Model;

class Administrador extends Model {
    private $nome;
    private $senha;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}

?>