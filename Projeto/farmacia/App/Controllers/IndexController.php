<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$produto = Container::getModel('Produto');

        $produtos = $produto->getAll();

        session_start();

        $this->view->produtos = $produtos;

		$this->render('index');
	}

	public function medicamentos() {
		$produto = Container::getModel('Produto');

        $produtos = $produto->getAllMedicamentos();
	
        session_start();

        $this->view->produtos = $produtos;

		$this->render('index');
	}

	public function infantil() {
		$produto = Container::getModel('Produto');

        $produtos = $produto->getAllInfantil();
		
        session_start();

        $this->view->produtos = $produtos;

		$this->render('index');
	}

	public function saude() {
		$produto = Container::getModel('Produto');

        $produtos = $produto->getAllSaude();
		
        session_start();

        $this->view->produtos = $produtos;

		$this->render('index');
	}

	public function higiene() {
		$produto = Container::getModel('Produto');

        $produtos = $produto->getAllHigiene();
		
        session_start();

        $this->view->produtos = $produtos;

		$this->render('index');
	}

	public function cosmeticos() {
		$produto = Container::getModel('Produto');

        $produtos = $produto->getAllCosmeticos();
		
        session_start();

        $this->view->produtos = $produtos;

		$this->render('index');
	}

	public function cadastrarProduto() {

		$this->view->produto = array(
			'descricao' => ''
		);

		$this->view->erroCadastro = false;
	
		$this->render('cadastrarProduto');
	}

	public function registrarProduto() {
	
		$foto = $_FILES["imagem"];

		$caminho_imagem = "assets/" . $foto['name'];
	
		$foto = $_FILES["imagem"];
		move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
		$produto = Container::getModel('Produto');

		$produto->__set('descricao', $_POST['descricao']);
		$produto->__set('preco', $_POST['preco']);
		$produto->__set('quantidade', $_POST['quantidade']);
		$produto->__set('categoria', $_POST['categoria']);
		$produto->__set('generico', $_POST['generico']);
		$produto->__set('promocao', $_POST['promocao']);
		$produto->__set('precoPromocional', $_POST['precoPromocional']);
		$produto->__set('imagem', $foto['name']);
		

		if($produto->validarCadastroProduto() && count($produto->getProdutoPorDescricao()) == 0){
			$produto->salvar();
			$this->render('cadastroFinProd');
		} else {
			$this->view->produto = array(
				'descricao' => $_POST['descricao']
			);

			$this->view->erroCadastro = true;
			$this->render('cadastrarProduto');
		}
	}

	public function produto() {

		$produto = Container::getModel('Produto');

		/*$produtos = $produto->getAll();*/

		$produtos = $produto->umProduto($_POST['id']);
		
		session_start();

		$this->view->produtos = $produtos;


		$this->render('produto');
	}

	public function cadastrarUsuario() {
		$this->view->usuario = array(
			'nome' => '',
			'email' => '',
			'senha' => '',
		);
		$this->view->erroCadastro = false;
		$this->render('cadastrarUsuario');
	}

	public function registrarUsuario() {	
		$usuario = Container::getModel('Usuario');

		$usuario->__set('nome',  $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0){
				$usuario->salvar();
				$this->render('cadastroFinUsu');
		}else {
			$this->view->usuario = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroCadastro = true;

			$this->render('cadastrarUsuario');

		}
	}
}

?>