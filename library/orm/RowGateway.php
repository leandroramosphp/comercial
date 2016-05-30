<?php
namespace library\orm;

use library\db\factory\DbInterface;

class RowGateway
{
	/**
	 * 
	 * @var array
	 */
	protected $element = array();
	/**
	 * 
	 * @var DbInterface
	 */
	protected $adapter = null;
	
	protected $mapper = null;
	
	public function __construct(array $element, DbInterface $adapter, Mapper $mapper, array $options = null)
	{
		$this->element = $element;
		$this->adapter = $adapter;
		$this->mapper = $mapper;
	}
	
	public function __get($name)
	{
		return $this->element[$name];
	}
	
	public function __set($name, $value)
	{
		$this->element[$name] = $value;
	}	
	
	public function __call($method, array $args)
	{
		$prefix = substr($method, 0, 3);

		if ($prefix == 'get')
		{
			$method = lcfirst(substr($method, 3));
			return $this->element[$method]; 
		}
		if ($prefix == 'set')
		{
			$method = lcfirst(substr($method, 3));
			$this->element[$method] = $args[0];
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}