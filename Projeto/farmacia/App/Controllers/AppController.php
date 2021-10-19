<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    public function carrinho() {

        $carrinho = Container::getModel('Carrinho');

        $itens = $carrinho->getAllCarrinho();

        $total = $carrinho->total();

        print_r($total);

        $this->view->total = $total;
   
        session_start();

        $this->view->itens = $itens;

        $this->render('carrinho');

    }

    public function addCarrinho() {
    
        $carrinho = Container::getModel('Carrinho');

        $carrinho->__set('id_produto', $_POST['id']);
        $carrinho->__set('quantidade', $_POST['quantidade']);

    
        $carrinho->salvarNoCarrinho();

        /*header("Location: /");*/


    }
}