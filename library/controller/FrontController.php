<?php
namespace library\controller;

class FrontController
{
	private static $instance = null;
	
	private $path = null;
	
	private function __construct(){}
	
	public function setPath($path)
	{
		$this->path = $path;
	}
	
	/**
	 * @return FrontController
	 */
	public static function getInstance()
	{
		if (self::$instance == null)
		{
			self::$instance = new FrontController();
		}
		return self::$instance;
	}
	
	public function dispatch()
	{
		$controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
		$action = isset($_GET['action']) ? $_GET['action'] : 'index';

		$controller = '\\application\\controller\\'. ucfirst($controller) . 'Controller';
		$action .= 'Action';
		
		$controller = new $controller();
		$controller->getView()->setPath($this->path);
		
		$controller->dispatch($action);
	}
	
	
	
	
	
	
	
	
	
	
	
	
}