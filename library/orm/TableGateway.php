<?php
namespace library\orm;

use library\util\iterator\Collection;
use library\db\factory\DbInterface;

class TableGateway extends Collection
{
	/**
	 * 
	 * @var string
	 */
	protected $table = null;
	/**
	 * 
	 * @var DbInterface
	 */
	protected $adapter = null;
	
	protected $rowClass = '\\library\\orm\\RowGateway';
	
	public function __construct($table, DbInterface $adapter)
	{
		$this->table = $table;
		$this->adapter = $adapter;		
	}
	
	
	
	public function select($cols = '*',$where = null)
	{
		$rowClass = $this->rowClass;
		$collection = $this->adapter->select($this->table, $cols, $where);
		foreach($collection->getElements() as $element)
		{
			$this->elements[] = new $rowClass($element, $this->adapter, $this);
		}	
		return $this;	
	}
	
	public function getAdapter()
	{
		return $this->adapter;
	}
	
}