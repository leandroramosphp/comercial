<?php
namespace library\controller;

use library\view\View;

abstract class PageController
{
	protected $view = null;
	protected $action = null;
	
	public function __construct()
	{
		$this->view = new View($this);		
	}
	
	public function indexAction()
	{
		
	}
	
	public function getView()
	{
		return $this->view;
	}
	
	public function preDispatch(){}	
	
	public function dispatch($action)
	{
		$this->action = $action;
		$this->preDispatch();
		$this->$action();
		$this->postDispatch();
	}
	
	public function postDispatch(){
		$this->view->render($this->action);	
	}	
	
	public function getName()
	{	
		$class = str_replace('application\controller\\', '', get_class($this));
		return lcfirst(str_replace('Controller', '',$class));
	}
	
	protected function redirect($action)
	{
		$this->action = $action;
		$action .= 'Action';
		$this->$action();
	}
	
	
	
	
	
}