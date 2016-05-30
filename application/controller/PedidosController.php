<?php
namespace application\controller;

use application\model\Pedido;

use library\controller\PageController;

class PedidosController extends PageController
{
	public function indexAction()
	{
		$url = '?controller=pedidos&action=editar';
		$this->view->url = $url;
	}
	
	public function editarAction()
	{
		$action = '?controller=pedidos&action=gravar';
		$this->view->action = $action;	
	}
	
	public function gravarAction()
	{
		$numero = $_POST['numero'];
		
		$pedido = new Pedido();
		$pedido->gravarPedido($numero);
		
		$this->redirect('index');		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}