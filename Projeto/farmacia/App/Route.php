<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['cadastrarProduto'] = array(
			'route' => '/cadastrarProduto',
			'controller' => 'indexController',
			'action' => 'cadastrarProduto'
		);

		$routes['registrarProduto'] = array(
			'route' => '/registrarProduto',
			'controller' => 'indexController',
			'action' => 'registrarProduto'
		);

		$routes['produto'] = array(
			'route' => '/produto',
			'controller' => 'indexController',
			'action' => 'produto'
		);

		$routes['carrinho'] = array(
			'route' => '/carrinho',
			'controller' => 'AppController',
			'action' => 'carrinho'
		);

		$routes['addCarrinho'] = array(
			'route' => '/addCarrinho',
			'controller' => 'AppController',
			'action' => 'addCarrinho'
		);

		$routes['medicamentos'] = array(
			'route' => '/medicamentos',
			'controller' => 'IndexController',
			'action' => 'medicamentos'
		);

		$routes['infantil'] = array(
			'route' => '/infantil',
			'controller' => 'IndexController',
			'action' => 'infantil'
		);

		$routes['saude'] = array(
			'route' => '/saude',
			'controller' => 'IndexController',
			'action' => 'saude'
		);

		$routes['higiene'] = array(
			'route' => '/higiene',
			'controller' => 'IndexController',
			'action' => 'higiene'
		);

		$routes['cosmeticos'] = array(
			'route' => '/cosmeticos',
			'controller' => 'IndexController',
			'action' => 'cosmeticos'
		);

		$routes['cadastrarUsuario'] = array(
			'route' => '/cadastrarUsuario',
			'controller' => 'indexController',
			'action' => 'cadastrarUsuario'
		);

		$routes['registrarUsuario'] = array(
			'route' => '/registrarUsuario',
			'controller' => 'IndexController',
			'action' => 'registrarUsuario'
		);

		$this->setRoutes($routes);
	}

}

?>