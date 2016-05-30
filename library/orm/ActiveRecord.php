<?php
namespace library\orm;

class ActiveRecord extends RowGateway
{
	protected $state = 'decoupled';
	
	public function __construct($element, $adapter, $mapper, array $options = null)
	{
		parent::__construct($element, $adapter, $mapper);
		$this->state = isset($options['state']) ? $options['state'] : 'persistent'; 
	}
	
	public function update()
	{
		$element = $this->element;
		unset($element[$this->mapper->getPrimaryKey()]);		
		
		$this->adapter->update($this->mapper->getTable(),
				$element,
				$this->mapper->getPrimaryKey() . ' = ' .
				$this->element[$this->mapper->getPrimaryKey()]
		);
	}
	
	public function insert()
	{	
		$this->adapter->insert($this->mapper->getTable(),
				$this->element
		);
		$this->state = 'persistent';
	}

	public function delete()
	{
		$this->adapter->delete($this->mapper->getTable(),
				$this->mapper->getPrimaryKey() . ' = ' .
				$this->element[$this->mapper->getPrimaryKey()]
		);		
	}
	
	public function save()
	{
		if ($this->state == 'new')
		{
			$this->insert();
		}
		if ($this->state == 'persistent')
		{
			$this->update();
		}
	}
	
	
	
	
}